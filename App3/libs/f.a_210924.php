<?php

session_start();


///ini_set("display_errors",1);
//ini_set("default_socket_timeout", "300");

//ini_get('allow_url_fopen');
	
///require_once('../nusoap/lib/nusoap.php');

///require_once('../nusoap/nusoap.php');

require '../../vendor/autoload.php';

///// funciones generales


$action=$_GET['action'];

switch($action){
		
	case 'DoLogin':
	DoLogin($_GET['login'],$_GET['pass']);
	break;

	case 'GetStats':
	GetStats();
	break;


	case 'LProfileSpeed':
		LProfileSpeed();
		break;

}



function LProfileSpeed(){


	$client = new nusoap_client(getUrl(),true,'','','','',60,60);
	
	$err = $client->getError();
		if ($err) {
			
			echo $err;
	   }
	   
		$jstr=array("param"=>"");
	  
		 $res = $client->call('LProfileSpeed',array("str"=>json_encode($jstr),''));	
	
		 echo $res;

		 
	}


function GetStats(){


	$client = new nusoap_client(getUrl(),true,'','','','',60,60);
	
	
$err = $client->getError();
	if ($err) {
		
		echo "getError ".$err."<br>";
   }
	
	
 	$res = $client->call('GetStats',array("str"=>""));	

	 echo $res;

}



function DoLogin($login,$pass){

	
	$client = new nusoap_client(getUrl(),true,'','','','',60,60);
	
	
$err = $client->getError();
	if ($err) {
		
		//echo "getError ".$err."<br>";
   }
	
	
	$jstr=array("login"=>$login,"pass"=>$pass);
	
	
 	$res = $client->call('L1',array("str"=>json_encode($jstr)));	
	
	///var_dump($res);
/*
	
	if ($client->fault) {
	echo 'Fallo';
	print_r($res);
} else {	// Chequea errores
	$err = $client->getError();
	if ($err) {		// Muestra el error
		echo 'Error ' . $err ."<br>";
	} else {		// Muestra el resultado
		echo 'Resultado';
		print_r ($res);
	}
}
	*/
	
	$jres=objectToArray(json_decode($res));

	
	
if($jres['code']=="0"){
		
$_SESSION['userlog']=true;

$_SESSION['idusu']=$jres['id'];
$_SESSION['nom']=$jres['nom'];
$_SESSION['idses']=$jres['pass'];
$_SESSION['nivel']=$jres['nivel'];
$_SESSION['login']=$jres['login'];
$_SESSION['idsuc']=$jres['idsuc'];
$_SESSION['idusucrm']=$jres['idusucrm'];
		
	}else{
		
$_SESSION['userlog']=false;	
	
$_SESSION['id']="";
$_SESSION['nom']="";
$_SESSION['idses']="";
$_SESSION['nivel']="";
$_SESSION['login']="";
$_SESSION['idsuc']="";
$_SESSION['idusucrm']="";
	
	}
	
	
	
	$Rsp=array("code"=>$jres['code'],"dcode"=>$jres['dcode']);
	
	echo json_encode($Rsp);
	
	
}



/////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////


function getUrl(){

	
$url='http://systech.mx:8081/API/WS/TeleMas/WSapi/WSapi.php?wsdl';
///$url='http://189.203.198.114:8081/API/WS/TeleMas/WSapi/WSapi.php?wsdl';	

//189.203.198.114


return $url;
	
}


function clog($trans,$strxml){
	
$sustituye = array("\r\n", "\n\r", "\n", "\r");
$content = str_replace($sustituye, " ", $strxml);
	
	
		
$file="/home/papelesymas/llog/log".date("Y_m_d").".log";
$ddf = fopen($file,'a');
fwrite($ddf,"[".date("r")."]  $trans: $content\n\n");
fclose($ddf);
}

function sinace2($str){

$ace = array("á", "é", "í", "ó" , "ú", "Á", "É", "Í", "Ó", "Ú", "ñ", "Ñ");
$nor = array("a", "e", "i", "o" , "u", "A", "E", "I", "O", "U", "n", "N");

return str_replace($ace,$nor,$str);

	
}




function fecn($fecha){
	
	$ff=explode("-",$fecha);
	
	return $ff[2]."/".$ff[1]."/".$ff[0];
	
}

function fechorn($fecha){
	
	$aa=explode(" ",trim($fecha));
	
	
	$ff=explode("-",$aa[0]);
	
	
	return $ff[2]."/".$ff[1]."/".$ff[0]." ".$aa[1];
	
}

function objectToArray($d) {
		if (is_object($d)) {
			// Gets the properties of the given object
			// with get_object_vars function
			$d = get_object_vars($d);
		}
 
		if (is_array($d)) {
			/*
			* Return array converted to object
			* Using __FUNCTION__ (Magic constant)
			* for recursive call
			*/
			return array_map(__FUNCTION__, $d);
		}
		else {
			// Return array
			return $d;
		}
	}

function GetKey(){
	
	return 'telemassergio'.date("Ymd",time());
	
}

function encrypt($string, $key) {
   $result = '';
   for($i=0; $i<strlen($string); $i++) {
      $char = substr($string, $i, 1);
      $keychar = substr($key, ($i % strlen($key))-1, 1);
      $char = chr(ord($char)+ord($keychar));
      $result.=$char;
   }
   return base64_encode($result);
}

function decrypt($string, $key) {
   $result = '';
   $string = base64_decode($string);
   for($i=0; $i<strlen($string); $i++) {
      $char = substr($string, $i, 1);
      $keychar = substr($key, ($i % strlen($key))-1, 1);
      $char = chr(ord($char)-ord($keychar));
      $result.=$char;
   }
   return $result;
}

function limpiasql($str){
	
	
$str=mysql_escape_string($str);

$str=addslashes($str);
$str=stripslashes($str);

$str=str_replace("SELECT","",$str);
$str=str_replace("select","",$str);

$str=str_replace("DELETE","",$str);
$str=str_replace("delete","",$str);

$str=str_replace("UPDATE","",$str);
$str=str_replace("update","",$str);

$str=str_replace("DROP","",$str);
$str=str_replace("drop","",$str);

$str=str_replace("TRUNCATE","",$str);
$str=str_replace("truncate","",$str);

$str=str_replace("INNER","",$str);
$str=str_replace("inner","",$str);



$str=str_replace("INSERT","",$str);
$str=str_replace("insert","",$str);

$str=str_replace("WHERE","",$str);
$str=str_replace("where","",$str);

$str=str_replace("FROM","",$str);
$str=str_replace("from","",$str);


$str=str_replace("ALTER","",$str);
$str=str_replace("alter","",$str);

$str=str_replace("LIMIT","",($str));
$str=str_replace("limit","",$str);

$str=str_replace("ORDER","",$str);
$str=str_replace("order","",$str);

$str=str_replace(" AND ","",$str);
$str=str_replace(" and ","",$str);

$str=str_replace("CREATE","",$str);
$str=str_replace("create","",$str);

$str=str_replace("ADD","",$str);
$str=str_replace("add","",$str);

$str=str_replace("CHANGE","",$str);
$str=str_replace("change","",$str);

$str=str_replace("MODIFY","",$str);
$str=str_replace("modify","",$str);

$str=str_replace("RENAME","",$str);
$str=str_replace("rename","",$str);

$str=str_replace("REMPLACE","",$str);
$str=str_replace("remplace","",$str);

$str=str_replace("TABLE","",$str);
$str=str_replace("table","",$str);

$str=str_replace("DATABASE","",$str);
$str=str_replace("database","",$str);

$str=str_replace("OPTIMIZE","",$str);
$str=str_replace("optimize","",$str);

$str=str_replace("SHOW","",$str);
$str=str_replace("show","",$str);

$str=str_replace("USERS","",$str);
$str=str_replace("users","",$str);


$str=str_replace("NULL","",$str);
$str=str_replace("null","",$str);

$str=str_replace("SLEEP","",$str);
$str=str_replace("sleep","",$str);

$str=str_replace("COLUMN","",$str);
$str=str_replace("column","",$str);

$str=str_replace("SCHEMA","",$str);
$str=str_replace("schema","",$str);


$str=str_replace("ASCII","",$str);
$str=str_replace("ascii","",$str);

$str=str_replace("OUTFILE","",$str);
$str=str_replace("outfile","",$str);

$str=str_replace("ROOT","",$str);
$str=str_replace("root","",$str);


$str=str_replace("LIKE","",$str);
$str=str_replace("like","",$str);


$str=str_replace("/","",$str);
$str=str_replace("\\","",$str);


$str=str_replace("\n","",$str);

$str=str_replace("\r","",$str);

$str=str_replace("`","",$str);

$str=str_replace(";","",$str);

$str=str_replace("#","",$str);

$str=str_replace("<","",$str);

$str=str_replace(">","",$str);


return $str;
	
}



////
?>