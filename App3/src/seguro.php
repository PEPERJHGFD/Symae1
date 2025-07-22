<?php


//Inicio la sesi�n 
session_start(); 

//COMPRUEBA QUE EL USUARIO ESTA AUTENTIFICADO 
if (!$_SESSION["userlog"]) { 
    //si no existe, envio a la p�gina de autentificacion 
   header("Location:Login.php"); 
    //ademas salgo de este script 
    exit(); 
}


?> 
