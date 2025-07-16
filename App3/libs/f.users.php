<?php

///ini_set("display_errors",1);

session_start();

include ("f.a.php");

///require_once('../nusoap/lib/nusoap.php');

///// funciones generales


$action=$_GET['action'];

switch($action){
		
	case 'LUsers':
	LUsers($_GET['param']);
	break;
		
	case 'SaveUsu':
	SaveUsu($_GET['nom'],$_GET['ape'],$_GET['correo'],$_GET['tel'],$_GET['nivel'],$_GET['login'],$_GET['pass']);
	break;
		
	case 'GetUsu':
	GetUsu($_GET['id']);
	break;
		
	case 'SaveUsuEdit':
	SaveUsuEdit($_GET['id'],$_GET['nom'],$_GET['ape'],$_GET['correo'],$_GET['tel'],$_GET['nivel']);
	break;
		
	case 'SaveUsuPass':
	SaveUsuPass($_GET['id'],$_GET['pass']);
	break;

}


function SaveUsuPass($id,$pass){
	
	$id=decrypt($id,GetKey());
	
	$client = new nusoap_client(getUrl(),true,'','','','',60,60);

$err = $client->getError();
	if ($err) {
		
		echo $err;
   }
   
	$jstr=array("id"=>$id,"pass"=>$pass);
  
 	$res = $client->call('SaveUsuPass',array("str"=>json_encode($jstr),''));	
	
	
	echo $res;
	
	
}



function SaveUsuEdit($id,$nom,$ape,$correo,$tel,$nivel){
	
	$id=decrypt($id,GetKey());
	
	$client = new nusoap_client(getUrl(),true,'','','','',60,60);

$err = $client->getError();
	if ($err) {
		
		echo $err;
   }
   
	$jstr=array("id"=>$id,"nom"=>$nom,"ape"=>$ape,"correo"=>$correo,"tel"=>$tel,"nivel"=>$nivel);
  
 	$res = $client->call('SaveUsuEdit',array("str"=>json_encode($jstr),''));	
	
	
	echo $res;
	
	
}


function GetUsu($id){
	
	$id=decrypt($id,GetKey());
	
	$client = new nusoap_client(getUrl(),true,'','','','',60,60);

$err = $client->getError();
	if ($err) {
		
		echo $err;
   }
   
	$jstr=array("id"=>$id);
  
	
 	$res = $client->call('GetUsu',array("str"=>json_encode($jstr),''));	
	
	
	$jres=objectToArray(json_decode($res));
	
	if($jres['code']=="0"){
		
		foreach ($jres['data'] as $rr) {
			
$Rsp=array("id"=>encrypt($rr['id'],GetKey()),"nom"=>$rr['nom'],"ape"=>$rr['ape'],"correo"=>$rr['correo'],"tel"=>$rr['tel'],"nivel"=>$rr['nivel'],"login"=>$rr['login']);
			
		}
		
	}else{
		
		$Rsp=array("id"=>"0","nom"=>"0","ape"=>"0","correo"=>"0","tel"=>"0");
	}
	
	
	
	echo json_encode($Rsp);
}

function LUsers($param){


$client = new nusoap_client(getUrl(),true,'','','','',60,60);

$err = $client->getError();
	if ($err) {
		
		echo $err;
   }
   
	$jstr=array("param"=>$param);
  
 	$res = $client->call('LUsers',array("str"=>json_encode($jstr),''));	
	
	
	$jres=objectToArray(json_decode($res));

	if($jres['code']=="0"){
		
		
			$rhtml.='<table class="table table-bordered table-striped table-vcenter js-dataTable-simple table-hover thead-light">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="width: 80px;">ID</th>
                                        <th>Nombre</th>
                                        <th class="d-none d-sm-table-cell" style="width: 30%;"></th>
                                        <th class="d-none d-sm-table-cell" style="width: 15%;">Nivel</th>
                                        <th style="width: 15%;"></th>
                                    </tr>
                                </thead>
                                <tbody>';
								
		foreach ($jres['data'] as $rr) {
			
			
			switch($rr['nivel']){
										
										
									case 1:
									$tipo="Administrador";
									break;
									
									case 2:
									$tipo="Supervisor";
									break;
									
									case 3:
									$tipo="Oficina";
									break;
					
									case 4:
									$tipo="Ventas";
									break;
									
			}
                                    $rhtml.='<tr>
                                        <td class="text-center font-size-sm">'.$rr['id'].'</td>
                                        <td class="font-w600 font-size-sm">'.$rr['nom'].' '.$rr['ape'].'</td>
                                        <td class="d-none d-sm-table-cell font-size-sm">
                                            '.$rr['login'].'
                                        </td>
                                        <td class="d-none d-sm-table-cell">
                                            '.$tipo.'
                                        </td>
                                        <td>
										
	<a data-fancybox data-type="iframe" href="users_Edit.php?id='.encrypt($rr['id'],GetKey()).'" class="btn btn-default fancybox">
										<i class="fa fa-edit"></i>
										</a>
                                            
								<a data-fancybox data-type="iframe" href="users_CmbPass.php?idusu='.encrypt($rr['id'],GetKey()).'&login='.($rr['login']).'" class="btn btn-default fancybox">
										<i class="fa fa-key"></i>
										</a>	   
									   
		
                                        </td>
                                    </tr>';
					
			
	}
	
	$rhtml.='</tbody></table>';
		
		
	}else{
		
		$rhtml.='<div class="alert alert-danger alert-dismissable" role="alert">'.
                                                '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'.
                                                    '<span aria-hidden="true">&times;</span>'.
                                                '</button>'.
                                                '<h3 class="alert-heading font-w300 my-2">Error</h3>'+
                                                '<p class="mb-0">'.$jres['dcode'].'</p>'+
                                            '</div>';
		
	}
	
	
	
	$Rsp=array("code"=>$jres['code'],"dcode"=>$jres['dcode'],"rhtml"=>$rhtml);
	
	echo json_encode($Rsp);
	
	
}


function SaveUsu($nom,$ape,$correo,$tel,$nivel,$login,$pass){
	
	$client = new nusoap_client(getUrl(),true,'','','','',60,60);

$err = $client->getError();
	if ($err) {
		
		echo $err;
   }
   
	$jstr=array("nom"=>$nom,"ape"=>$ape,"correo"=>$correo,"tel"=>$tel,"nivel"=>$nivel,"login"=>$login,"pass"=>$pass);
  
 	$res = $client->call('SaveUsu',array("str"=>json_encode($jstr),''));	
	
	
	echo $res;
	
	
}


?>