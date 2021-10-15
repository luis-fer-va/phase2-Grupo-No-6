<?php

DEFINE("USER","root");
DEFINE("PASS","");

try{
$conexion = new PDO("mysql:host=localhost;dbname=tarea 2",USER,PASS);
$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$conexion->exec("SET CHARACTER SET UTF8");
}
catch(Exception $e){
echo "Linea del error: " . $e->getMessage();
}
?>
