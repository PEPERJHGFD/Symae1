<?php

//ini_set("display_errors",1);


session_start(); 
$_SESSION["userlog"]=false;
$ses=session_destroy();
if($ses){
unset($_SESSION);
$_SESSION["userlog"]=false;
header("Location:index.php"); 
}else{
echo "No es posible!! ".$ses;
} 
?>
