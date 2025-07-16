<?php

session_start();

include ("f.a.php");

//require '../vendor/autoload.php';

///require_once('../nusoap/lib/nusoap.php');

///ini_set("display_errors",1);

///// funciones generales


$action=$_GET['action'];

switch($action){
		
	case 'LClosures':
		LClosures($_GET['param']);
	break;

	case 'LClosuresMarks':
		LClosuresMarks($_GET['param']);
	break;

	case 'SaveClosure':
		SaveClosure($_GET['idClosure'],$_GET['nameClosure'],$_GET['serialClosure'],$_GET['typeClosure'],$_GET['ptosClosure'],$_GET['estaClosure'],$_GET['mpioClosure'],$_GET['zoneClosure'],$_GET['latClosure'],$_GET['lonClosure'],$_GET['notesClosure']);
	break;
		
	
	

}


function LClosures($param){


$client = new nusoap_client(getUrl(),true,'','','','',60,60);

$err = $client->getError();
	if ($err) {
		
		echo $err;
   }
   
	$jstr=array("param"=>$param);
  
 	$res = $client->call('LClosures',array("str"=>json_encode($jstr),''));	
	
	
	
	$jres=objectToArray(json_decode($res));

	///var_dump($jres);

	if($jres['code']=="0"){
		
		
			$rhtml.=' 
			<div class="card mb-5">
			<div class="card-body">
			<table class="table table-hover">
			<thead>
			<tr>
			<th scope="col">Nombre</th>
			<th scope="col">Tipo</th>
			<th scope="col">Zona</th>
			<th scope="col"></th>
			
			
			</tr>
			</thead>
			<tbody>';
		
		
		
		foreach ($jres['data'] as $rr) {

			
			///nl2br(
			///str_replace("\n", "<br>",$rr['Notes']).

			$rhtml.='<tr>
			<td><a class="nav-link" href="#" onClick="FindClosure(\''.$rr['Name'].'\')">'.$rr['Name'].'</a></td>
			<td>'.$rr['Type'].'</td>
			<td>'.$rr['Zone'].'</td>
			<td><a class="nav-link" data-bs-toggle="modal" data-bs-target="#modal-aeClosure"" href="#"onClick="GetDataClos(\''.$rr['id'].'\',\''.$rr['Name'].'\',\''.$rr['Serial'].'\',\''.$rr['Type'].'\',\''.$rr['Ports'].'\',\''.$rr['State'].'\',\''.$rr['Muni'].'\',\''.$rr['Zone'].'\',\''.$rr['Lat'].'\',\''.$rr['Lon'].'\',\''.str_replace("\n", "==",$rr['Notes']).'\')">'.$rr['Type'].'</a></td>';

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




function SaveClosure($idClosure,$nameClosure,$serialClosure,$typeClosure,$ptosClosure,$estaClosure,$mpioClosure,$zoneClosure,$latClosure,$lonClosure,$notesClosure){
	
	
	$client = new nusoap_client(getUrl(),true,'','','','',60,60);
	
	$err = $client->getError();
	if ($err) {
		
		echo $err;
   }
   
	
	$jstr=array("idClosure"=>trim($idClosure),"nameClosure"=>trim($nameClosure),"serialClosure"=>trim($serialClosure),"typeClosure"=>trim($typeClosure),"ptosClosure"=>trim($ptosClosure),"estaClosure"=>trim($estaClosure),"mpioClosure"=>trim($mpioClosure),"zoneClosure"=>trim($zoneClosure), "latClosure"=>trim($latClosure), "lonClosure"=>trim($lonClosure), "notesClosure"=>trim($notesClosure));
	
  
 	$res = $client->call('SaveClosure',array("str"=>json_encode($jstr),''));
	
///var_dump($res);

	echo $res;
	
	
}


function LClosuresMarks($param){


	$client = new nusoap_client(getUrl(),true,'','','','',60,60);
	
	$err = $client->getError();
		if ($err) {
			
			echo $err;
	   }
	   
		$jstr=array("param"=>$param);
	  
		 $res = $client->call('LClosures',array("str"=>json_encode($jstr),''));	
		
		 $jres=objectToArray(json_decode($res));

		 foreach ($jres['data'] as $rr) {

			$Notes=str_replace ( "\n", "<br>", $rr['Notes']);


			$data[]=array("id"=>$rr['id'],"Name"=>$rr['Name'], "Lat"=>$rr['Lat'], "Lon"=>$rr['Lon'],"Notes"=>$Notes,"Type"=>$rr['Type']);


		 }

		 echo json_encode($data);

	///var_dump($jres);

		///echo $res;
		
		


	}

?>