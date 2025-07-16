<?php

session_start();

include ("f.a.php");


///ini_set("display_errors",1);

///// funciones generales


$action=$_GET['action'];

switch($action){
		
	case 'LStock':
		LStock($_GET['param']);
	break;

}


function LStock($param){


$client = new nusoap_client(getUrl(),true,'','','','',60,60);

$err = $client->getError();
	if ($err) {
		
		echo $err;
   }
   
	$jstr=array("param"=>$param);
  
 	$res = $client->call('LStock',array("str"=>json_encode($jstr),''));	
	
	$jres=objectToArray(json_decode($res));


	if($jres['code']=="0"){
		
		
			$rhtml.=' 
			<div class="card mb-5">
			<div class="card-body">
			<table class="table table-hover">
			<thead>
			<tr>

			<th scope="col">Serie</th>
			<th scope="col">Marca</th>
			<th scope="col">Modelo</th>
			<th scope="col">MAC</th>
			<th scope="col">Tipo</th>
			<th scope="col">Unidad</th>
			<th scope="col">Cantidad</th>
			<th scope="col">Estado</th>
			
			
			</tr>
			</thead>
			<tbody>';
		
		
		
		foreach ($jres['data'] as $rr) {


			$rhtml.='<tr>';

			$rhtml.='<td>'.$rr['SerialNumber'].'</td>';
			$rhtml.='<td>'.$rr['DeviceBrand'].' </td>';
			$rhtml.='<td>'.$rr['DeviceModel'].'</td>';
			$rhtml.='<td>'.$rr['MAC'].'</td>';
			$rhtml.='<td>'.$rr['Type'].'</td>';
			$rhtml.='<td>'.$rr['Unit'].'</td>';
			$rhtml.='<td>'.$rr['Qty'].'</td>';
			$rhtml.='<td>'.$rr['Status'].'</td>';
			

			
			$rhtml.='</tr>';
	
		}					
										                 
        	$rhtml.='</tbody></table></div></div>';
		
		
		
		
	}else{
		
		$rhtml.='<div class="alert alert-danger alert-dismissible fade show" role="alert">';
        $rhtml.=$jres['dcode'];
		$rhtml.='<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
		$rhtml.='</div>';
		
	
		
	}
	
	
	
	$Rsp=array("code"=>$jres['code'],"dcode"=>$jres['dcode'],"rhtml"=>$rhtml);
	
	echo json_encode($Rsp);
	
	
}

?>