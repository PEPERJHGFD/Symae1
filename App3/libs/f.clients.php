<?php

session_start();

include("f.a.php");

///require_once('../nusoap/lib/nusoap.php');

///ini_set("display_errors",1);

//require '../vendor/autoload.php';

///// funciones generales


$action = $_GET['action'];

switch ($action) {

	case 'LClients':
		LClients($_GET['param']);
		break;

	case 'SaveCli':
		SaveCli($_GET['nom'], $_GET['ape'], $_GET['dire1'], $_GET['dire2'], $_GET['ciu'], $_GET['est'], $_GET['cp'], $_GET['tel'], $_GET['movil'], $_GET['correo'], $_GET['Frfc'], $_GET['Fnom'], $_GET['Fdire'], $_GET['Fciu'], $_GET['Fest'], $_GET['Fcp']);

		break;

	case 'GetCli':
		GetCli($_GET['id']);
		break;

	case 'SaveCliEdit':
		SaveCliEdit($_GET['id'], $_GET['nom'], $_GET['ape'], $_GET['dire1'], $_GET['dire2'], $_GET['ciu'], $_GET['est'], $_GET['cp'], $_GET['tel'], $_GET['movil'], $_GET['correo'], $_GET['Frfc'], $_GET['Fnom'], $_GET['Fdire'], $_GET['Fciu'], $_GET['Fest'], $_GET['Fcp']);
		break;

	case 'GetStatusFiber':
		GetStatusFiber($_GET['idUCRM'], $_GET['id']);
		break;

	case 'GetStatusStatic':
		GetStatusStatic($_GET['idUCRM'], $_GET['id']);
		break;

}


function GetStatusFiber($idUCRM, $id)
{

	$active = "";
	$archived = "";
	$suspended = "";
	$modeip = "";
	$modestat = "";
	$ontmodel = "";
	$ontserial = "";
	$ontstat = "";
	$ontsignal = "";
	$oltrxsignal = "";
	$ontsignalstat = "";
	$oltname = "";
	$sitename = "";


	$client = new nusoap_client(getUrl(), true, '', '', '', '', 60, 60);

	$err = $client->getError();
	if ($err) {

		echo $err;
	}

	$jstr = array("idUCRM" => $idUCRM, "id" => $id);

	$res = $client->call('GetStatusFiber', array("str" => json_encode($jstr), ''));

	$jres = json_decode($res, true);

	if ($jres['code'] == "0") {

		///valida si esta archivado y pone marca de archivado ademas de poner las otras variables en blanco
		if ($jres['Archived'] == "1") {

			$archived = '<span class="badge rounded-pill bg-outline-danger">Archivado</span>';
			$suspended = '<span class="badge rounded-pill bg-outline-warning">Suspendido</span>';
			$active = "";
			$modeip = '<i class="text-danger bi-globe icon-20"></i>';
			$ontmodel = "";
			$ontserial = "";
			$ontstat = '<i class="text-danger bi-x-circle-fill icon-20"></i>';
			$ontsignal = "";
			$oltrxsignal = "";
			$ontsignalstat = '<i class="text-danger bi-reception-0 icon-20"></i>';
			$oltname = "";
			$sitename = "";


			////valida si esta activo y pone marca de activo, ademas de poner las otras variables con sus valores
		} else if ($jres['Active'] == "1") {

			$active = '<span class="badge rounded-pill bg-outline-success">Activo</span>';
			$archived = "";

			//valida si esta suspendido y pone marca de suspendido
			if ($jres['Suspended'] == "1") {

				$suspended = '<span class="badge rounded-pill bg-outline-warning">Suspendido</span>';

			} else {

				$suspended = "";
			}

			/// valida si tiene ip en el pppoe server, si no tiene ip es que no esta conectado y pone icono rojo
			if (trim($jres['IP']) != '') {

				$modeip = $jres['IP'] . ' <i class="text-success bi-globe icon-20"></i>';

			} else {

				$modeip = '<i class="text-danger bi-globe icon-20"></i>';

			}

			///valida si la ont esta conectada y pone icono verde, si no esta conectada pone icono rojo

			if (trim($jres['ONTOnline']) == "1") {

				$ontstat = '<i class="text-success bi-check-circle-fill icon-20"></i>';
				$ontmodel = $jres['ONTModel'];
				$ontserial = $jres['ONTSerial'];
				$ontsignal = $jres['ONTSignal'];
				$oltrxsignal = $jres['ONTOLTSignal'];
				$ontsignalstat = '<i class="text-danger bi-reception-4 icon-20"></i>';

			} else {

				$ontstat = '<i class="text-danger bi-x-circle-fill icon-20"></i>';
				$ontmodel = $jres['ONTModel'];
				$ontserial = $jres['ONTSerial'];
				$ontsignal = "-";
				$oltrxsignal = "-";
				$ontsignalstat = '<i class="text-danger bi-reception-0 icon-20"></i>';

			}


		}

		$oltname = $jres['OLTName'];
		$sitename = $jres['SiteName'];

		$rhtml = ' 
						 <table style="font-size: 15px; padding: 10px;">
                          <tr>
                            <th>STATUS</th>
                            <td>' . $active . $archived . $suspended . '</td>
                          </tr>
                          <tr>
                            <th>MODE</th>
                            <td>PPPoE - ' . $modeip . '</td>
                          </tr>
                          <tr>
                            <th>ONT </th>
                            <td>' . $ontmodel . ' - ' . $ontserial . $ontstat . '</td>
                          </tr>
                          <tr>
                            <th>ONT/OLT Rx signal </th>
                            <td>' . $ontsignal . ' / ' . $oltrxsignal . $ontsignalstat . '</td>
                          </tr>

                          <tr>
                            <th>OLT </th>
                            <td> ' . $oltname . ' </td>
                          </tr>

                          <tr>
                            <th>SITE </th>
                            <td> ' . $sitename . ' </td>
                          </tr>

                        </table>';


	}

	$Rsp = array("code" => $jres['code'], "dcode" => $jres['dcode'], "rhtml" => $rhtml);

	echo json_encode($Rsp);

}

function GetStatusStatic($idUCRM, $id)
{

	$active = "";
	$archived = "";
	$suspended = "";
	$modeip = "";
	$cpemodel = "";
	$cpemac = "";
	$cpestat = "";
	$cpesignal = "";
	$aprxsignal = "";
	$cpesignalstat = "";
	$apname = "";
	$sitename = "";


	$client = new nusoap_client(getUrl(), true, '', '', '', '', 60, 60);

	$err = $client->getError();
	if ($err) {

		echo $err;
	}

	$jstr = array("idUCRM" => $idUCRM, "id" => $id);

	$res = $client->call('GetStatusStatic', array("str" => json_encode($jstr), ''));

	$jres = json_decode($res, true);

	if ($jres['code'] == "0") {

		///valida si esta archivado y pone marca de archivado ademas de poner las otras variables en blanco
		if ($jres['Archived'] == "1") {

			$archived = '<span class="badge rounded-pill bg-outline-danger">Archivado</span>';
			$suspended = '<span class="badge rounded-pill bg-outline-warning">Suspendido</span>';
			$active = "";
			$modeip = '<i class="text-danger bi-globe icon-20"></i>';
			$cpemodel = "";
			$cpemac = "";
			$cpestat = '<i class="text-danger bi-x-circle-fill icon-20"></i>';
			$cpesignal = "";
			$aprxsignal = "";
			$cpesignalstat = '<i class="text-danger bi-reception-0 icon-20"></i>';
			$apname = "";
			$sitename = "";


			////valida si esta activo y pone marca de activo, ademas de poner las otras variables con sus valores
		} else if ($jres['Active'] == "1") {

			$active = '<span class="badge rounded-pill bg-outline-success">Activo</span>';
			$archived = "";

			//valida si esta suspendido y pone marca de suspendido
			if ($jres['Suspended'] == "1") {

				$suspended = '<span class="badge rounded-pill bg-outline-warning">Suspendido</span>';

			} else {

				$suspended = "";
			}

			/// valida si tiene ip en el pppoe server, si no tiene ip es que no esta conectado y pone icono rojo
			if (trim($jres['IP']) != '') {

				$modeip = $jres['IP'] . ' <i class="text-success bi-globe icon-20"></i>';

			} else {

				$modeip = '<i class="text-danger bi-globe icon-20"></i>';

			}

			///valida si la ont esta conectada y pone icono verde, si no esta conectada pone icono rojo

			if (trim($jres['CPEOnline']) == "1") {

				$cpestat = '<i class="text-success bi-check-circle-fill icon-20"></i>';
				$cpemodel = $jres['CPEModel'];
				$cpemac = $jres['CPEMAC'];
				$cpesignal = $jres['CPESignal'];
				$aprxsignal = $jres['APRXSignal'];
				$cpesignalstat = '<i class="text-danger bi-reception-4 icon-20"></i>';

			} else {

				$cpestat = '<i class="text-danger bi-x-circle-fill icon-20"></i>';
				$cpemodel = $jres['CPEModel'];
				$cpeserial = $jres['CPEMAC'];
				$cpesignal = "-";
				$aprxsignal = "-";
				$cpesignalstat = '<i class="text-danger bi-reception-0 icon-20"></i>';

			}


		}

		$apname = $jres['APName'];
		$sitename = $jres['SiteName'];

		$rhtml = ' 
						 <table style="font-size: 15px; padding: 10px;">
                          <tr>
                            <th>STATUS</th>
                            <td>' . $active . $archived . $suspended . '</td>
                          </tr>
                          <tr>
                            <th>MODE</th>
                            <td>PPPoE - ' . $modeip . '</td>
                          </tr>
                          <tr>
                            <th>ONT </th>
                            <td>' . $cpemodel . ' - ' . $cpeserial . $cpestat . '</td>
                          </tr>
                          <tr>
                            <th>ONT/OLT Rx signal </th>
                            <td>' . $cpesignal . ' / ' . $aprxsignal . $cpesignalstat . '</td>
                          </tr>

                          <tr>
                            <th>OLT </th>
                            <td> ' . $apname . ' </td>
                          </tr>

                          <tr>
                            <th>SITE </th>
                            <td> ' . $sitename . ' </td>
                          </tr>

                        </table>';


	}

	$Rsp = array("code" => $jres['code'], "dcode" => $jres['dcode'], "rhtml" => $rhtml);

	echo json_encode($Rsp);

}



function SaveCliEdit($id, $nom, $ape, $dire1, $dire2, $ciu, $est, $cp, $tel, $movil, $correo, $Frfc, $Fnom, $Fdire, $Fciu, $Fest, $Fcp)
{

	$client = new nusoap_client(getUrl(), true, '', '', '', '', 60, 60);

	$err = $client->getError();
	if ($err) {

		echo $err;
	}

	$jstr = array("id" => decrypt($id, GetKey()), "nom" => $nom, "ape" => $ape, "dire1" => $dire1, "dire2" => $dire2, "ciu" => $ciu, "est" => $est, "cp" => $cp, "tel" => $tel, "movil" => $movil, "correo" => $correo, "Frfc" => $Frfc, "Fnom" => $Fnom, "Fdire" => $Fdire, "Fciu" => $Fciu, "Fest" => $Fest, "Fcp" => $Fcp);


	$res = $client->call('SaveCliEdit', array("str" => json_encode($jstr), ''));


	echo $res;


}


function GetCli($id)
{

	$id = decrypt($id, GetKey());

	$client = new nusoap_client(getUrl(), true, '', '', '', '', 60, 60);

	$err = $client->getError();
	if ($err) {

		echo $err;
	}

	$jstr = array("id" => $id);

	$res = $client->call('GetCli', array("str" => json_encode($jstr), ''));


	$jres = objectToArray(json_decode($res));

	if ($jres['code'] == "0") {

		foreach ($jres['data'] as $rr) {

			$Rsp = array("id" => encrypt($rr['id'], GetKey()), "nom" => $rr['nom'], "ape" => $rr['ape'], "dire1" => $rr['dire1'], "dire2" => $rr['dire2'], "ciu" => $rr['ciu'], "est" => $rr['est'], "cp" => $rr['cp'], "tel" => $rr['tel'], "movil" => $rr['movil'], "correo" => $rr['correo'], "Frfc" => $rr['Frfc'], "Fnom" => $rr['Fnom'], "Fdire" => $rr['Fdire'], "Fciu" => $rr['Fciu'], "Fest" => $rr['Fest'], "Fcp" => $rr['Fcp']);

		}

	} else {

		$Rsp = array("id" => "0", "nom" => "0", "ape" => "0");
	}



	echo json_encode($Rsp);
}

function LClients($param)
{


	$client = new nusoap_client(getUrl(), true, '', '', '', '', 60, 60);

	$err = $client->getError();
	if ($err) {

		echo $err;
	}

	$jstr = array("param" => $param);

	$res = $client->call('LClients', array("str" => json_encode($jstr), ''));



	$jres = objectToArray(json_decode($res));

	if ($jres['code'] == "0") {


		$rhtml = ' 
			<div class="card mb-5">
			<div class="card-body">
			<table class="table table-hover">
			<thead>
			<tr>
			<th scope="col">ID</th>
			<th scope="col">Nombre</th>
			<th scope="col">Saldo</th>
			<th scope="col">Planes de Servicio</th>
			<th scope="col">Pagos</th>
			<th scope="col">Status</th>
			</tr>
			</thead>
			<tbody>';


		$clientName = "";
		$balance = 0;
		$balan = 0;
		$suspen = "";

		foreach ($jres['data'] as $rr) {


			if ($rr['clientType'] == 1) {

				$clientName = $rr['firstName'] . ' ' . $rr['lastName'];

			} else {

				$clientName = $rr['companyName'];

			}


			if ($rr['accountBalance'] == 0) {

				$balance = '$' . number_format($rr['accountBalance'], 2);

			} else {


				if ($rr['accountBalance'] > 0) {

					$balance = '-$' . number_format($rr['accountBalance'], 2);

				} else {


					if ($rr['accountBalance'] < 0) {


						$balan = abs($rr['accountBalance']);

						if ($rr['hasOverdueInvoice']) {

							$balance = '<span style="color:red">$ ' . number_format($balan, 2) . '</span>';


						} else {

							$balance = '$ ' . number_format($balan, 2);

						}




					}

				}

			}


			if ($rr['hasSuspendedService']) {

				$suspen = '  <span class="badge rounded-pill bg-outline-warning">SUSPENDIDO</span>';

			} else {

				$suspen = '';
			}


			if ($rr['tipoCliente'] == '2') {

				$tipocliente = '  <span class="badge rounded-pill bg-outline-info">Fibra</span>';

			} else {

				$tipocliente = '';
			}

			if ($rr['isArchived']) {

				$archivado = '  <span class="badge rounded-pill bg-outline-danger">ARCHIVADO</span>';

			} else {

				$archivado = '';
			}


			$rhtml .= '<tr><td>' . $rr['userIdent'] . '</td>
			<td>' . $clientName . '  ' . $suspen . ' ' . $tipocliente . ' ' . $archivado . '</td>
			<td>' . $balance . '</td>
			<td>' . $rr['servicePlan'] . '</td>';


			$rhtml .= '<td>

							<button type="button" class="btn btn-icon btn-icon-only btn-outline-success" data-bs-toggle="modal" data-bs-target="#modal-checkout" onClick="GetData(\'' . $rr['idUCRM'] . '\',\'' . $rr['userIdent'] . ' - ' . $clientName . '\',\'' . $rr['id'] . '\')">
							<i class="bi-file-earmark-plus icon-16"></i></i>
							</button>

							<a href="Payments.php?idcli=' . $rr['id'] . '" class="btn btn-icon btn-icon-only btn-outline-primary">
							<i class="bi-eye icon-16"></i> </a>


                        </td>';



			$rhtml .= '<td>

							<button type="button" class="btn btn-icon btn-icon-only btn-outline-info" data-bs-toggle="modal" data-bs-target="#modal-status" onClick="GetStatus(\'' . $rr['idUCRM'] . '\',\'' . $rr['userIdent'] . ' - ' . $clientName . '\',\'' . $rr['id'] . '\',\'' . $rr['tipoCliente'] . '\')">
							<i class="bi-info icon-16"></i>
							</button>

						

						</td>';

			$rhtml .= '</tr>';





		}



		$rhtml .= '</tbody></table></div></div>';




	} else {

		$rhtml = '<div class="alert alert-danger alert-dismissable" role="alert">' .
			'<button type="button" class="close" data-dismiss="alert" aria-label="Close">' .
			'<span aria-hidden="true">&times;</span>' .
			'</button>' .
			'<h3 class="alert-heading font-w300 my-2">Error</h3>' .
			'<p class="mb-0">' . $jres['dcode'] . '</p>' .
			'</div>';

	}



	$Rsp = array("code" => $jres['code'], "dcode" => $jres['dcode'], "rhtml" => $rhtml);

	echo json_encode($Rsp);


}


function SaveCli($nom, $ape, $dire1, $dire2, $ciu, $est, $cp, $tel, $movil, $correo, $Frfc, $Fnom, $Fdire, $Fciu, $Fest, $Fcp)
{

	$client = new nusoap_client(getUrl(), true, '', '', '', '', 60, 60);

	$err = $client->getError();
	if ($err) {

		echo $err;
	}

	$jstr = array("nom" => $nom, "ape" => $ape, "dire1" => $dire1, "dire2" => $dire2, "ciu" => $ciu, "est" => $est, "cp" => $cp, "tel" => $tel, "movil" => $movil, "correo" => $correo, "Frfc" => $Frfc, "Fnom" => $Fnom, "Fdire" => $Fdire, "Fciu" => $Fciu, "Fest" => $Fest, "Fcp" => $Fcp);

	$res = $client->call('SaveCli', array("str" => json_encode($jstr), ''));


	echo $res;


}

?>