<?php 

$servidor="localhost";
$db="proyecto-s";
$username="root";
$password="";

try {
$conexion=new PDO("mysql:host=$servidor;dbname=$db",$username,$password);
$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} 
catch (Exception $e) {
echo $e->getMessage();
}


?>