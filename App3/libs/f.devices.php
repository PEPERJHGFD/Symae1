<?php

session_start();

include("f.a.php");

//require '../vendor/autoload.php';

//require_once('../nusoap/lib/nusoap.php');

///ini_set("display_errors",1);

///// funciones generales


$action = $_GET['action'];

switch ($action) {

	case 'LDevices':
		LDevices($_GET['param'], $_GET['idsite']);
		break;

	case 'SaveDevice':
		SaveDevice($_GET['idDev'], $_GET['nameDev'], $_GET['marcaDev'], $_GET['modeloDev'], $_GET['typeDev'], $_GET['siteDev'], $_GET['isactiveDev'], $_GET['useradminDev'], $_GET['passadminDev'], $_GET['noteDev'], $_GET['ipadminDev'], $_GET['portadminDev'], $_GET['adminDev'], $_GET['apirestDev'], $_GET['ipapiDev'], $_GET['portapiDev'], $_GET['userapiDev'], $_GET['passapiDev'], $_GET['staticserverDev'], $_GET['pppoeserverDev'], $_GET['ipospfDev'], $_GET['networkospfDev'], $_GET['idrouterospfDev'], $_GET['loopbackospfDev'], $_GET['isCriticalDev'], $_GET['ssidDev'], $_GET['frequencyDev'], $_GET['ssidKeyDev']);
		break;


	case 'GetDevice':
		GetDevice($_GET['id']);
		break;

	case 'LDevices2':
		LDevices2($_GET['param'], $_GET['idsite']);
		break;


	case 'LDevices3':
		LDevices3($_GET['param'], $_GET['idsite']);
		break;


	case 'LPPPoEServer':
		LPPPoEServer($_GET['idpppoeserver']);
		break;

	case 'LStaticServer':
		LStaticServer($_GET['idstaticserver']);
		break;




}


function GetDevice($id)
{



	$client = new nusoap_client(getUrl(), true, '', '', '', '', 60, 60);

	$err = $client->getError();
	if ($err) {

		echo $err;
	}

	$jstr = array("id" => $id);

	$res = $client->call('GetDevice', array("str" => json_encode($jstr), ''));

	echo $res;



}


function LDevices($param, $idsite)
{


	$client = new nusoap_client(getUrl(), true, '', '', '', '', 60, 60);

	$err = $client->getError();
	if ($err) {

		echo $err;
	}

	$jstr = array("param" => $param, "idsite" => $idsite);

	$res = $client->call('LDevices', array("str" => json_encode($jstr), ''));



	$jres = objectToArray(json_decode($res));

	///var_dump($jres);

	if ($jres['code'] == "0") {


		$rhtml .= ' 
			<div class="card mb-5">
			<div class="card-body">
			<table class="table table-hover">
			<thead>
			<tr>
			<th scope="col"></th>
			<th scope="col">ID </th>
			<th scope="col">Nombre</th>
			<th scope="col">Marca</th>
			<th scope="col">Modelo</th>
			<th scope="col">Tipo</th>
			<th scope="col">Frequency</th>
			<th scope="col">Admin IP</th>
			<th scope="col">Admin Port</th>
			<th scope="col">Sitio</th>
			<th scope="col"></th>
			</tr>
			</thead>
			<tbody>';



		foreach ($jres['data'] as $rr) {

			if ($rr['Online']) {

				$online = ' ';

			} else {

				$online = '  <span class="badge rounded-pill bg-danger">Offline</span>';

			}


			if ($rr['isCritical']) {

				$iscritical = ' <i class="text-success bi-star-fill icon-14"></i>';

			} else {

				$iscritical = '  ';

			}





			$rhtml .= '<tr><td>' . $iscritical . '</td><td><a class="nav-link" data-bs-toggle="modal" data-bs-target="#modal-aeDevice"" href="#" 
			onClick="GetDevice(\'' . $rr['iddev'] . '\')">' . $rr['iddev'] . '</a></td>
			<td><a class="nav-link" data-bs-toggle="modal" data-bs-target="#modal-aeDevice"" href="#" 
			onClick="GetDevice(\'' . $rr['iddev'] . '\')">' . $rr['NameDev'] . ' </a></td>
			<td><a class="nav-link" data-bs-toggle="modal" data-bs-target="#modal-aeDevice"" href="#" 
			onClick="GetDevice(\'' . $rr['iddev'] . '\')">' . $rr['Marca'] . ' </a></td>
			<td>' . $rr['Modelo'] . '</td>
			<td><a class="nav-link" href="Stations.php?param=&iddevice=' . $rr['iddev'] . '">' . $rr['TipoEqui'] . '</a></td>
			<td>' . $rr['Frequency'] . '</td>
			<td>' . $rr['IPAdmin'] . '<br>' . $online . '</td>
			<td>' . $rr['PuertoAdmin'] . '</td>
			<td>' . $rr['NameSite'] . '</td>
			<td></td>';

			$rhtml .= '</tr>';

		}

		$rhtml .= '</tbody></table></div></div>';




	} else {


		$rhtml .= '<div class="alert alert-danger" role="alert">' .
			'<p class="mb-0">' . $jres['dcode'] . '</p>' .

			'</div>';

		/*$rhtml.='<div class="alert alert-danger alert-dismissable" role="alert">'.
															'<button type="button" class="close" data-dismiss="alert" aria-label="Close">'.
																'<span aria-hidden="true">&times;</span>'.
															'</button>'.
															'<h3 class="alert-heading font-w300 my-2">Error</h3>'.
															'<p class="mb-0">'.$jres['dcode'].'</p>'.
														'</div>';*/

	}



	$Rsp = array("code" => $jres['code'], "dcode" => $jres['dcode'], "rhtml" => $rhtml);

	echo json_encode($Rsp);


}




function SaveDevice($idDev, $nameDev, $marcaDev, $modeloDev, $typeDev, $siteDev, $isactiveDev, $useradminDev, $passadminDev, $noteDev, $ipadminDev, $portadminDev, $adminDev, $apirestDev, $ipapiDev, $portapiDev, $userapiDev, $passapiDev, $staticserverDev, $pppoeserverDev, $ipospfDev, $networkospfDev, $idrouterospfDev, $loopbackospfDev, $isCriticalDev, $ssidDev, $frequencyDev, $ssidKeyDev)
{


	$client = new nusoap_client(getUrl(), true, '', '', '', '', 60, 60);

	$err = $client->getError();
	if ($err) {

		echo $err;
	}


	$jstr = array("idDev" => trim($idDev), "nameDev" => trim($nameDev), "marcaDev" => trim($marcaDev), "modeloDev" => trim($modeloDev), "typeDev" => trim($typeDev), "siteDev" => trim($siteDev), "isactiveDev" => trim($isactiveDev), "useradminDev" => trim($useradminDev), "passadminDev" => trim($passadminDev), "noteDev" => trim($noteDev), "ipadminDev" => trim($ipadminDev), "portadminDev" => trim($portadminDev), "adminDev" => trim($adminDev), "apirestDev" => trim($apirestDev), "ipapiDev" => trim($ipapiDev), "portapiDev" => trim($portapiDev), "userapiDev" => trim($userapiDev), "passapiDev" => trim($passapiDev), "staticserverDev" => trim($staticserverDev), "pppoeserverDev" => trim($pppoeserverDev), "ipospfDev" => trim($ipospfDev), "networkospfDev" => trim($networkospfDev), "idrouterospfDev" => trim($idrouterospfDev), "loopbackospfDev" => trim($loopbackospfDev), "isCriticalDev" => trim($isCriticalDev), "ssidDev" => trim($ssidDev), "frequencyDev" => trim($frequencyDev), "ssidKeyDev" => trim($ssidKeyDev));


	$res = $client->call('SaveDevice', array("str" => json_encode($jstr), ''));


	echo $res;


}



function LDevices2($param, $idsite)
{



	$client = new nusoap_client(getUrl(), true, '', '', '', '', 60, 60);

	$err = $client->getError();
	if ($err) {

		echo $err;
	}

	$jstr = array("param" => $param, "idsite" => $idsite);

	$res = $client->call('LDevices', array("str" => json_encode($jstr), ''));

	echo $res;


}


function LPPPoEServer($idpppoeserver)
{


	$client = new nusoap_client(getUrl(), true, '', '', '', '', 60, 60);

	$err = $client->getError();
	if ($err) {

		echo $err;
	}

	$jstr = array("param" => "");

	$res = $client->call('LPPPoEServer', array("str" => json_encode($jstr), ''));

	echo $res;


}


function LStaticServer($idstaticserver)
{
	$client = new nusoap_client(getUrl(), true, '', '', '', '', 60, 60);

	$err = $client->getError();
	if ($err) {

		echo $err;
	}

	$jstr = array("param" => "");

	$res = $client->call('LStaticServer', array("str" => json_encode($jstr), ''));

	echo $res;


}





?>