<?php

session_start();

include ("f.a.php");

//require '../vendor/autoload.php';

//require_once('../nusoap/lib/nusoap.php');

///ini_set("display_errors",1);

///// funciones generales


$action=$_GET['action'];

switch($action){
		
	case 'LSites':
		LSites($_GET['param']);
	break;

	case 'LSites2':
		LSites2($_GET['param']);
	break;

	case 'SaveSite':
		SaveSite($_GET['idSite'],$_GET['nameSite'],$_GET['typeSite'],$_GET['locaSite'],$_GET['mpioSite'],$_GET['edoSite'],$_GET['latSite'],$_GET['lonSite']);
	break;
		
	
	

}


function LSites($param){


$client = new nusoap_client(getUrl(),true,'','','','',60,60);

$err = $client->getError();
	if ($err) {
		
		echo $err;
   }
   
	$jstr=array("param"=>$param);
  
 	$res = $client->call('LSites',array("str"=>json_encode($jstr),''));	
	
	
	
	$jres=objectToArray(json_decode($res));

	///var_dump($jres);

	if($jres['code']=="0"){
		
		
			$rhtml.=' 
			<div class="card mb-5">
			<div class="card-body">
			<table class="table table-hover">
			<thead>
			<tr>
			<th scope="col">ID</th>
			<th scope="col">Sitio</th>
			<th scope="col">Localidad</th>
			<th scope="col">Coordenadas</th>
			<th scope="col">Tipo</th>
			
			</tr>
			</thead>
			<tbody>';
		
		
		
		foreach ($jres['data'] as $rr) {


			if($rr['Online']){
				
				$online=' ';
				
			}else{
				
				$online=' <span class="badge rounded-pill bg-danger">Offline</span>';
			}



			$rhtml.='<tr><td>'.$rr['id'].'</td><td><a class="nav-link" data-bs-toggle="modal" data-bs-target="#modal-aeSite"" href="#"onClick="GetData(\''.$rr['id'].'\',\''.$rr['Name'].'\',\''.$rr['Type'].'\',\''.$rr['Loca'].'\',\''.$rr['Mpio'].'\',\''.$rr['Edo'].'\',\''.$rr['Lat'].'\',\''.$rr['Lon'].'\')">'.$rr['Name'].'</a> '.$online.' </td><td>'.$rr['Loca'].', '.$rr['Mpio'].', '.$rr['Edo'].'</td><td>'.$rr['Lat'].', '.$rr['Lon'].'</td><td>'.$rr['Type'].'</td>';

			
			

			



		   										$rhtml.='</tr>';
		
			
									
                                       
			
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




function SaveSite($idSite,$nameSite,$typeSite,$locaSite,$mpioSite,$edoSite,$latSite,$lonSite){
	
	
	$client = new nusoap_client(getUrl(),true,'','','','',60,60);
	
	$err = $client->getError();
	if ($err) {
		
		echo $err;
   }
   
	
	$jstr=array("idSite"=>trim($idSite),"nameSite"=>trim($nameSite),"typeSite"=>trim($typeSite),"locaSite"=>trim($locaSite),"mpioSite"=>trim($mpioSite),"edoSite"=>trim($edoSite),"latSite"=>trim($latSite),"lonSite"=>trim($lonSite));
	
  
 	$res = $client->call('SaveSite',array("str"=>json_encode($jstr),''));
	
	
	echo $res;
	
	
}



function LSites2($param){


	$client = new nusoap_client(getUrl(),true,'','','','',60,60);
	
	$err = $client->getError();
		if ($err) {
			
			echo $err;
	   }
	   
		$jstr=array("param"=>$param);
	  
		 $res = $client->call('LSites',array("str"=>json_encode($jstr),''));	
	
		 echo $res;

		 
	}
?>