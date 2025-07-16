<?php

session_start();

include ("f.a.php");


///ini_set("display_errors",1);

///// funciones generales


$action=$_GET['action'];

switch($action){
		
	case 'LBrands':
		LBrands($_GET['param']);
	break;

	//// para utilizarlo en otros modulos en algunos objetos por ejemplo en los "select"
	case 'LBrands2':
		LBrands2($_GET['param']);
	break;

	case 'SaveBrand':
		SaveBrand($_GET['idBrand'],$_GET['nameBrand'],$_GET['notesBrand']);
	break;
		
	
	

}


function LBrands($param){


$client = new nusoap_client(getUrl(),true,'','','','',60,60);

$err = $client->getError();
	if ($err) {
		
		echo $err;
   }
   
	$jstr=array("param"=>$param);
  
 	$res = $client->call('LBrands',array("str"=>json_encode($jstr),''));	
	
	
	
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
			<th scope="col">Name</th>
			<th scope="col">Notes</th>
			
			
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




function SaveBrand($idBrand,$nameBrand,$notesBrand){
	
	
	$client = new nusoap_client(getUrl(),true,'','','','',60,60);
	
	$err = $client->getError();
	if ($err) {
		
		echo $err;
   }
   
	
	$jstr=array("idBrand"=>trim($idBrand),"nameBrand"=>trim($nameBrand),"notesBrand"=>trim($notesBrand));
	
  
 	$res = $client->call('SaveBrand',array("str"=>json_encode($jstr),''));
	
	
	echo $res;
	
	
}



function LBrands2($param){


	$client = new nusoap_client(getUrl(),true,'','','','',60,60);
	
	$err = $client->getError();
		if ($err) {
			
			echo $err;
	   }
	   
		$jstr=array("param"=>$param);
	  
		 $res = $client->call('LBrands',array("str"=>json_encode($jstr),''));	
	
		 echo $res;

		 
	}
?>