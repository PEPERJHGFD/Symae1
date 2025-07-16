<?php

session_start();

include ("f.a.php");

//require '../vendor/autoload.php';

//require_once('../nusoap/lib/nusoap.php');

///ini_set("display_errors",1);

///// funciones generales


$action=$_GET['action'];

switch($action){
		
	case 'LONTs':
		LONTs($_GET['param'], $_GET['iddevice']);
	break;
	
	

}



function LONTs($param,$iddevice){


$client = new nusoap_client(getUrl(),true,'','','','',60,60);

$err = $client->getError();
	if ($err) {
		
		echo $err;
   }
   
	$jstr=array("param"=>$param, "iddevice"=>$iddevice);
  
 	$res = $client->call('LONTs',array("str"=>json_encode($jstr),''));	
	
	
	$jres=objectToArray(json_decode($res));

	///var_dump($jres);

	if($jres['code']=="0"){
		
		
			$rhtml.=' 
			<div class="card mb-5">
                    <div class="card-body">
                     
                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th scope="col">OLT </th>
													<th scope="col">SLOT</th>
													<th scope="col">PORT</th>
													<th scope="col">ID</th>
													<th scope="col">DEVICE<br>MODEL</th>
                                                    <th scope="col">DEVICE<br>NAME</th>
													<th scope="col">SN</th>
													<th scope="col">SN2</th>
													<th scope="col">STATION<br>MAC </th>
                                                    <th scope="col">LOCAL<br>SIGNAL</th>
                                                    <th scope="col">DISTANCE</th>
                                                    <th scope="col">CONNECTION<br>TIME</th>
                                                    <th scope="col">LAST<br>IP</th>
                                                    <th scope="col">LAST<br>UPDATE</th>

                                                    
                                                </tr>
                                            </thead>
                                            <tbody>';
		
		
		
		foreach ($jres['data'] as $rr) {

			if($rr['Online']){
				
				$online=' ';
				
			}else{
				
				$online='  <span class="badge rounded-pill bg-danger">Offline</span>';
				
			}



			


			$rhtml.='<tr>
			<td>'.$rr['idDevice'].'</td>
			<td>'.$rr['SlotID'].'</td>
			<td>'.$rr['PortID'].'</td>
			<td>'.$rr['ONTID'].'</td>
			<td>'.$rr['DeviceModel'].' </td>
			<td>'.$rr['DeviceName'].'</td>
			<td>'.$rr['SerialNumber'].'</td>
			<td>'.$rr['SerialNumber2'].'</td>
			<td>'.$rr['MAC'].'<br>' .$online.'</td>
			<td>'.$rr['LocalSignal'].' dBm</td>
			<td>'.$rr['Distance'].' m</td>
			<td>'.seg_a_dhms($rr['Uptime']).'</td>
			<td>'.$rr['LastIP'].'</td>
			<td>'.$rr['LastUpdate'].'</td>
			<td></td>';

		   	$rhtml.='</tr>';
                       
		}					
                           
            $rhtml.='</tbody></table></div></div>';
		
		
		
		
	}else{
		

		$rhtml.='<div class="alert alert-danger" role="alert">'.
        '<p class="mb-0">'.$jres['dcode'].'</p>'.
		
		'</div>';

		/*$rhtml.='<div class="alert alert-danger alert-dismissable" role="alert">'.
                                                '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'.
                                                    '<span aria-hidden="true">&times;</span>'.
                                                '</button>'.
                                                '<h3 class="alert-heading font-w300 my-2">Error</h3>'.
                                                '<p class="mb-0">'.$jres['dcode'].'</p>'.
                                            '</div>';*/
		
	}
	
	
	
	$Rsp=array("code"=>$jres['code'],"dcode"=>$jres['dcode'],"rhtml"=>$rhtml);
	
	echo json_encode($Rsp);
	
	
}


function seg_a_dhms($seg) {
    $d = floor($seg / 86400);
    $h = floor(($seg - ($d * 86400)) / 3600);
    $m = floor(($seg - ($d * 86400) - ($h * 3600)) / 60);
    $s = $seg % 60;

    $dda="";

    if($d>0){

        $dda=  $d." Dia(s) ";

    }

    
    return  $dda." ".str_pad($h, 2, "0", STR_PAD_LEFT).":".str_pad($m, 2, "0", STR_PAD_LEFT).":".str_pad($s, 2, "0", STR_PAD_LEFT);
    }


?>