<?php

session_start();

include("f.a.php");


///ini_set("display_errors",1);

///// funciones generales


$action = $_GET['action'];

switch ($action) {

	case 'LSecrets':
		LSecrets($_GET['param'], $_GET['idpppoeserver']);
		break;

	case 'LActive':
		LActive($_GET['param'], $_GET['idpppoeserver']);
		break;

	case 'SaveSecret':
		SaveSecret($_GET['idSecret'], $_GET['nameSecret'], $_GET['passwordSecret'], $_GET['profileSecret'], $_GET['calleridSecret'], $_GET['pppoeServer']);
		break;

	case 'DeleteSecret':
		DeleteSecret($_GET['idSecret'], $_GET['pppoeServer']);
		break;

	case 'RestartSecret':
		DeleteSecret($_GET['nameSecret'], $_GET['pppoeServer']);
		break;

	case 'CheckPPPoEActive':
		CheckPPPoEActive($_GET['nameSecret'], $_GET['pppoeServer']);
		break;

}


function LSecrets($param, $idpppoeserver)
{


	$client = new nusoap_client(getUrl(), true, '', '', '', '', 60, 60);

	$err = $client->getError();
	if ($err) {

		echo $err;
	}

	$jstr = array("param" => $param, "idpppoeserver" => $idpppoeserver);

	$res = $client->call('LSecrets', array("str" => json_encode($jstr), ''));

	$jres = objectToArray(json_decode($res));


	if ($jres['code'] == "0") {


		$rhtml = ' 
			<div class="card mb-5">
			<div class="card-body">
			<table class="table table-hover">
			<thead>
			<tr>

				<th scope="col">ID </th>
                <th scope="col">Server</th>
                <th scope="col">Name</th>
                <th scope="col">Password</th>
                <th scope="col">Perfil</th>
                <th scope="col">Caller ID</th>
				<th scope="col"></th>
			
			
			</tr>
			</thead>
			<tbody>';



		foreach ($jres['data'] as $rr) {


			if ($rr['disabled']) {

				$disabled = '  <span class="badge rounded-pill bg-outline-warning">DISABLED</span>';

			} else {

				$disabled = '';
			}


			$rhtml .= '<tr>';

			$rhtml .= '<td>' . $rr['idSecret'] . '</td>';
			$rhtml .= '<td>' . $rr['nameserver'] . ' </td>';
			$rhtml .= '<td>' . $rr['name'] . '    ' . $disabled . '</td>';
			$rhtml .= '<td>' . $rr['password'] . '</td>';
			$rhtml .= '<td>' . $rr['profile'] . '</td>';
			$rhtml .= '<td>' . $rr['callerid'] . '</td>';
			$rhtml .= '<td>
			
			

			<button  class="btn btn-icon btn-icon-only btn-outline-primary" onClick="goActive(\'' . $rr['name'] . '\',\'' . $rr['idpppoeserver'] . '\');"> 
			<i class="bi-globe icon-16""></i> </button>

			<button  class="btn btn-icon btn-icon-only btn-outline-info" data-bs-toggle="modal" data-bs-target="#modal-aeSecrets" onClick="GetData(\'' . $rr['idSecret'] . '\',\'' . $rr['name'] . '\', \'' . $rr['password'] . '\',\'' . $rr['profile'] . '\', \'' . $rr['callerid'] . '\',\'' . trim($rr['idpppoeserver']) . '\')"> 
			<i class="bi-pencil-square icon-16""></i> </button>

			<button  class="btn btn-icon btn-icon-only btn-outline-danger"  onClick="DelSecret(\'' . $rr['idSecret'] . '\',\'' . $rr['idpppoeserver'] . '\')"> 
			<i class="bi-trash icon-16""></i> </button>

			

			
			
			</td>';



			$rhtml .= '</tr>';

		}

		$rhtml .= '</tbody></table></div></div>';


		////<button  class="btn btn-icon btn-icon-only btn-outline-success"  data-bs-toggle="tooltip" data-bs-placement="top" title="Re-start Secret" onClick="RestartSecret1(\'' . $rr['name'] . '\',\'' . $rr['idpppoeserver'] . '\')"> 
		///<i class="bi-arrow-clockwise icon-16""></i> </button>

	} else {

		$rhtml = '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
		$rhtml .= $jres['dcode'];
		$rhtml .= '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
		$rhtml .= '</div>';



	}



	$Rsp = array("code" => $jres['code'], "dcode" => $jres['dcode'], "rhtml" => $rhtml);

	echo json_encode($Rsp);


}

function LActive($param, $idpppoeserver)
{


	$client = new nusoap_client(getUrl(), true, '', '', '', '', 60, 60);

	$err = $client->getError();
	if ($err) {

		echo $err;
	}

	$jstr = array("param" => $param, "idpppoeserver" => $idpppoeserver);

	$res = $client->call('LActive', array("str" => json_encode($jstr), ''));

	$jres = objectToArray(json_decode($res));


	if ($jres['code'] == "0") {


		$rhtml = ' 
				<div class="card mb-5">
				<div class="card-body">
				<table class="table table-hover">
				<thead>
				<tr>
	
													<th scope="col">Server</th>
                                                    <th scope="col">Name </th>
                                                    <th scope="col">Service</th>
                                                    <th scope="col">Caller ID</th>
                                                    <th scope="col">Address</th>
                                                    <th scope="col">Uptime</th>
													 <th scope="col">Last Update</th>
                                                    <th scope="col"></th>
				
				
				</tr>
				</thead>
				<tbody>';



		foreach ($jres['data'] as $rr) {



			$rhtml .= '<tr>';

			$rhtml .= '<td>' . $rr['nameserver'] . '</td>';
			$rhtml .= '<td>' . $rr['name'] . '</td>';
			$rhtml .= '<td>' . $rr['service'] . ' </td>';
			$rhtml .= '<td>' . $rr['callerid'] . '</td>';
			$rhtml .= '<td>' . $rr['address'] . '</td>';
			$rhtml .= '<td>' . $rr['uptime'] . '</td>';
			$rhtml .= '<td>' . $rr['lastUpdate'] . '</td>';
			$rhtml .= '<td></td>';



			$rhtml .= '</tr>';

		}

		$rhtml .= '</tbody></table></div></div>';




	} else {

		$rhtml = '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
		$rhtml .= $jres['dcode'];
		$rhtml .= '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
		$rhtml .= '</div>';



	}



	$Rsp = array("code" => $jres['code'], "dcode" => $jres['dcode'], "rhtml" => $rhtml);

	echo json_encode($Rsp);


}

function SaveSecret(
	$idSecret,
	$nameSecret,
	$passwordSecret,
	$profileSecret,
	$calleridSecret,
	$pppoeServer
) {


	$client = new nusoap_client(getUrl(), true, '', '', '', '', 60, 60);

	$err = $client->getError();
	if ($err) {

		echo $err;
	}


	$jstr = array("idSecret" => trim($idSecret), "nameSecret" => trim($nameSecret), "passwordSecret" => trim($passwordSecret), "profileSecret" => trim($profileSecret), "calleridSecret" => trim($calleridSecret), "pppoeServer" => trim($pppoeServer));

	///echo  json_encode($jstr);

	$res = $client->call('SaveSecret', array("str" => json_encode($jstr), ''));


	echo $res;


}


function DeleteSecret(
	$idSecret,
	$pppoeServer
) {


	$client = new nusoap_client(getUrl(), true, '', '', '', '', 60, 60);

	$err = $client->getError();
	if ($err) {

		echo $err;
	}


	$jstr = array("idSecret" => trim($idSecret), "pppoeServer" => trim($pppoeServer));

	///echo  json_encode($jstr);

	$res = $client->call('DeleteSecret', array("str" => json_encode($jstr), ''));


	echo $res;


}


function RestartSecret(
	$nameSecret,
	$pppoeServer
) {


	$client = new nusoap_client(getUrl(), true, '', '', '', '', 60, 60);

	$err = $client->getError();
	if ($err) {

		echo $err;
	}


	$jstr = array("nameSecret" => trim($nameSecret), "pppoeServer" => trim($pppoeServer));

	///echo  json_encode($jstr);

	$res = $client->call('RestartSecret', array("str" => json_encode($jstr), ''));


	echo $res;


}


function CheckPPPoEActive(
	$nameSecret,
	$pppoeServer
) {


	$client = new nusoap_client(getUrl(), true, '', '', '', '', 60, 60);

	$err = $client->getError();
	if ($err) {

		echo $err;
	}


	$jstr = array("nameSecret" => trim($nameSecret), "pppoeServer" => trim($pppoeServer));

	///echo  json_encode($jstr);

	$res = $client->call('CheckPPPoEActive', array("str" => json_encode($jstr), ''));


	echo $res;


}

?>