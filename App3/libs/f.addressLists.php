<?php

session_start();

include("f.a.php");

///ini_set("display_errors",1);

///// funciones generales


$action = $_GET['action'];

switch ($action) {

	case 'LAddressLists':
		LAddressLists($_GET['param'], $_GET['list'], $_GET['idstaticserver']);
		break;

		
	case 'SaveAddressList':
		SaveAddressList($_GET['idAddress'], $_GET['nameAddress'], $_GET['addressAddress'], $_GET['listAddress'], $_GET['staticServer'], $_GET['addressDisabled']);
		break;

		
	case 'DeleteAddressList':
		DeleteAddressList($_GET['idAddress'], $_GET['staticServer']);
		break;


}


function LAddressLists($param, $list, $idstaticserver)
{


	$client = new nusoap_client(getUrl(), true, '', '', '', '', 60, 60);

	$err = $client->getError();
	if ($err) {

		echo $err;
	}

	$jstr = array("param" => $param, "list" => $list, "idstaticserver" => $idstaticserver);

	$res = $client->call('LAddressLists', array("str" => json_encode($jstr), ''));

	

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
				 <th scope="col">List</th>
                <th scope="col">Name</th>
                <th scope="col">Address</th>
                <th scope="col">Creation Time</th>
                <th scope="col">Last Update</th>
				<th scope="col"></th>
			
			
			</tr>
			</thead>
			<tbody>';



		foreach ($jres['data'] as $rr) {


			if ($rr['disabled']) {

				$disabled = ' <span class="badge rounded-pill bg-outline-warning">DISABLED</span>';

			} else {

				$disabled = '';
			}


			$rhtml .= '<tr>';

			$rhtml .= '<td>' . $rr['idAddrList'] . '</td>';
			$rhtml .= '<td>' . $rr['nameserver'] . ' </td>';
			$rhtml .= '<td>' . $rr['list'] . ' </td>';
			$rhtml .= '<td>' . $rr['name'] . '    ' . $disabled . '</td>';
			$rhtml .= '<td>' . $rr['address'] . '</td>';
			$rhtml .= '<td>' . $rr['creationtime'] . '</td>';
			$rhtml .= '<td>' . $rr['lastUpdate'] . '</td>';
			$rhtml .= '<td>
			
			

			<button  class="btn btn-icon btn-icon-only btn-outline-info" data-bs-toggle="modal" data-bs-target="#modal-aeAddress" onClick="GetData(\'' . $rr['idAddrList'] . '\',\'' . $rr['name'] . '\', \'' . $rr['address'] . '\',\'' . trim($rr['list']) . '\',\'' . trim($rr['idstaticserver']) . '\',\'' . trim($rr['disabled']) . '\')"> 
			<i class="bi-pencil-square icon-16""></i> </button>

			<button  class="btn btn-icon btn-icon-only btn-outline-danger"  onClick="DelAddress(\'' . $rr['idAddrList'] . '\',\'' . $rr['idstaticserver'] . '\')"> 
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



function SaveAddressList(
	$idAddress,
	$nameAddress,
	$addressAddress,
	$listAddress,
	$staticServer,
	$addressDisabled
) {


	//veriricar que todos los campos esten llenos

	if(trim($addressAddress)==""){

		$respu = array("code" => "10", "dcode" => "La direccion IP no puede estar vacia");

		echo json_encode($respu);

		return;
	}


	//// verificar direccio ip


	if(filter_var($addressAddress, FILTER_VALIDATE_IP)) {
		

	  }else {
		$respu = array("code" => "11", "dcode" => "Direccion IP, No Valida Verifique");

		echo json_encode($respu);

		return;

	  }

	

	$client = new nusoap_client(getUrl(), true, '', '', '', '', 60, 60);

	$err = $client->getError();
	if ($err) {

		echo $err;
	}


	$jstr = array("idAddress" => trim($idAddress), "nameAddress" => trim($nameAddress), "addressAddress" => trim($addressAddress), "listAddress" => trim($listAddress), "staticServer" => trim($staticServer), "addressDisabled" => trim($addressDisabled));


	$res = $client->call('SaveAddressList', array("str" => json_encode($jstr), ''));


	echo $res;


}



function DeleteAddressList(
	$idAddress,
	$staticServer
) {


	$client = new nusoap_client(getUrl(), true, '', '', '', '', 60, 60);

	$err = $client->getError();
	if ($err) {

		echo $err;
	}


	$jstr = array("idAddress" => trim($idAddress), "staticServer" => trim($staticServer));

	///echo  json_encode($jstr);

	$res = $client->call('DeleteAddressList', array("str" => json_encode($jstr), ''));


	echo $res;


}


?>