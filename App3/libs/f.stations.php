<?php

session_start();

include ("f.a.php");

//require_once('../nusoap/lib/nusoap.php');

///ini_set("display_errors",1);

///// funciones generales


$action=$_GET['action'];

switch($action){
		
	case 'LStations':
		LStations($_GET['param'], $_GET['iddevice']);
	break;
	
	

}



function LStations($param,$iddevice){


$client = new nusoap_client(getUrl(),true,'','','','',60,60);

$err = $client->getError();
	if ($err) {
		
		echo $err;
   }
   
	$jstr=array("param"=>$param, "iddevice"=>$iddevice);
  
 	$res = $client->call('LStations',array("str"=>json_encode($jstr),''));	
	
	
	$jres=objectToArray(json_decode($res));

	///var_dump($jres);

	if($jres['code']=="0"){
		
		
			$rhtml.=' 
			<div class="card mb-5">
                    <div class="card-body">
                     
                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th scope="col">ACCESS POINT </th>
													<th scope="col">NET ROLE</th>
                                                    <th scope="col">STATION MAC </th>
                                                    <th scope="col">DEVICE MODEL</th>
                                                    <th scope="col">DEVICE NAME</th>
                                                    <th scope="col">LOCAL SIGNAL</th>
                                                    <th scope="col">REMOTE SIGNAL</th>
                                                    <th scope="col">DISTANCE</th>
                                                    <th scope="col">DOWNLINK <br> CAPACITY</th>
                                                    <th scope="col">UPLINK <br> CAPACITY</th>
                                                    <th scope="col">CONNECTION <br> TIME</th>
                                                    <th scope="col">LAST IP</th>
                                                    <th scope="col">SSID</th>
                                                    <th scope="col">TYPE</th>
                                                    <th scope="col">LAST UPDATE</th>

                                                    
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
			<td>'.$rr['NetRole'].'</td>
			<td>'.$rr['MAC'].'<br>' .$online.'</td>
			<td>'.$rr['DeviceModel'].' </td>
			<td>'.$rr['DeviceName'].'</td>
			<td>'.$rr['LocalSignal'].' dBm</td>
			<td>'.$rr['RemoteSignal'].' dBm</td>
			<td>'.$rr['Distance'].' Km</td>
			<td>'.$rr['DownCapacity'].' Mbps</td>
			<td>'.$rr['UpCapacity'].' Mbps</td>
			<td>'.seg_a_dhms($rr['Uptime']).'</td>
			<td>'.$rr['LastIP'].'</td>
			<td>'.$rr['SSID'].'</td>
			<td>'.$rr['Type'].'</td>
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

        $dda=  $d." Dias ";

    }

    
    return  $dda." ".str_pad($h, 2, "0", STR_PAD_LEFT).":".str_pad($m, 2, "0", STR_PAD_LEFT).":".str_pad($s, 2, "0", STR_PAD_LEFT);
    }


?>