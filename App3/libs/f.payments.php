<?php

//ini_set("display_errors",1);

session_start();

include ("f.a.php");

//require '../vendor/autoload.php';

//require_once('../nusoap/lib/nusoap.php');


///// funciones generales


$action=$_GET['action'];

switch($action){
		
	case 'LMethod':
	LMethod($_GET['param']);
	break;
		
	case 'SavePay':
SavePay($_GET['iducrm'],$_GET['idcli'],$_GET['methodid'],$_GET['fecha'],$_GET['hora'],$_GET['aut'],$_GET['monto'],$_GET['notas']);
	break;
		
		case 'LPayments':
	LPayments($_GET['param'],$_GET['idcli']);
	break;
	
    
    case 'DeletePay':
DeletePay($_GET['idpay'],$_GET['comen']);
	break;

}

function DeletePay($idpay,$comen){
	
	
	$client = new nusoap_client(getUrl(),true,'','','','',60,60);
	
	$err = $client->getError();
	if ($err) {
		
		echo $err;
   }
   
	$idusu=$_SESSION['idusu'];
	$idsuc=$_SESSION['idsuc'];
	$idusucrm=$_SESSION['idusucrm'];
	
	$jstr=array("idpay"=>$idpay,"comen"=>$comen,"idusu"=>$idusu,"idsuc"=>$idsuc,"idusucrm"=>$idusucrm);
	
	
  
 	$res = $client->call('DeletePay',array("str"=>json_encode($jstr),''));
	
	
	echo $res;
	
	
}


function SavePay($iducrm,$idcli,$methodid,$fecha,$hora,$aut,$monto,$notas){
	
	
	$client = new nusoap_client(getUrl(),true,'','','','',60,60);
	
	$err = $client->getError();
	if ($err) {
		
		echo $err;
   }
   
	$idusu=$_SESSION['idusu'];
	$idsuc=$_SESSION['idsuc'];
	$idusucrm=$_SESSION['idusucrm'];
	
	$jstr=array("iducrm"=>$iducrm,"idcli"=>$idcli,"methodid"=>$methodid,"fecha"=>$fecha,"hora"=>$hora,"aut"=>$aut,"monto"=>$monto,"notas"=>$notas,"idusu"=>$idusu,"idsuc"=>$idsuc,"idusucrm"=>$idusucrm);
	
	
  
 	$res = $client->call('SavePay',array("str"=>json_encode($jstr),''));
	
	
	echo $res;
	
	
}

function LMethod($param){


$client = new nusoap_client(getUrl(),true,'','','','',60,60);

$err = $client->getError();
	if ($err) {
		
		echo $err;
   }
   
	$jstr=array("param"=>$param);
  
 	$res = $client->call('LMethod',array("str"=>json_encode($jstr),''));	
	
	
	echo $res;
	
	
	
}

function LPayments($param,$idcli){


$client = new nusoap_client(getUrl(),true,'','','','',60,60);

$err = $client->getError();
	if ($err) {
		
		echo $err;
   }
   
	$jstr=array("param"=>$param,"idcli"=>$idcli);
  
 	$res = $client->call('LPayments',array("str"=>json_encode($jstr),''));	
	
	
	
	$jres=objectToArray(json_decode($res));

	if($jres['code']=="0"){
		
		
			$rhtml.='<div class="card mb-5">
			<div class="card-body">
			<table class="table table-hover">
			<thead>
			<tr>
			<th scope="col">Metodo</th>
			<th scope="col">Aut</th>
			<th scope="col">Cliente</th>
			<th scope="col">Monto</th>
			<th scope="col">Fecha</th>
			<th scope="col">Fecha</th>
			<th scope="col">Usuario</th>
			<th scope="col"><i data-acorn-icon="flash"></i>Acciones</th>
			</tr>
			</thead>
			<tbody>';
		
		
		
		
		foreach ($jres['data'] as $rr) {
		
									
                                       $rhtml.=' <tr>
                                            <td class="text-center">
											'.$rr['method'].'
											</td>
											<td >'.$rr['aut'].'</td>
                                            <td >'.$rr['userIdent']."  - ".$rr['client'].'</td>
                                            <td style="text-align:right">$ '.number_format($rr['amount'],2).'</td>
                                            <td>
                                              '.$rr['fecha'].'  '.$rr['hora'].'
                                            </td>
                                            <td>
                                              '.$rr['fechor'].' 
                                            </td>
                                            <td class="text-center">
                                                 '.$rr['user'].' 
                                                
                                            </td>
                                            
                                              <td class="text-center">
                                                
                                                
                                            <button  class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#modal-checkout" onClick="GetData(\''.$rr['idp'].'\',\''.$rr['idUCRM'].'\',\''.$rr['userIdent'].' - '.$rr['client'].'\',\''.$rr['id'].'\',\''.$rr['fecha'].'\',\''.$rr['hora'].'\',\''.$rr['note'].'\',\''.$rr['aut'].'\',\''.number_format($rr['amount'],2).'\',\''.$rr['method'].'\')"> 
											<i class="bi-trash icon-16""></i> </button>

											<button  class="btn btn-outline-primary" onClick="PrintTicket(\''.$rr['idUCRM'].'\',\''.$rr['userIdent'].'\',\''.$rr['method'].'\',\''.$rr['fecha'].'\',\''.$rr['hora'].'\',\''.$rr['aut'].'\',\''.number_format($rr['amount'],2).'\',\''.$rr['note'].'\',\''.$rr['userIdent'].' - '.$rr['client'].'\')"> 
											<i class="bi-printer icon-16""></i> </button>

											
                                            


                                            </td>

                                        </tr>';
			
					}					
										
                                        
                                        
					$rhtml.='</tbody></table></div></div>';
		
		
		
		
	}else{
		
		$rhtml.='<div class="alert alert-danger alert-dismissable" role="alert">'.
                                                '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'.
                                                    '<span aria-hidden="true">&times;</span>'.
                                                '</button>'.
                                                '<h3 class="alert-heading font-w300 my-2">Error</h3>'.
                                                '<p class="mb-0">'.$jres['dcode'].'</p>'.
                                            '</div>';
		
	}
	
	
	
	$Rsp=array("code"=>$jres['code'],"dcode"=>$jres['dcode'],"rhtml"=>$rhtml);
	
	echo json_encode($Rsp);
	
	
}




?>