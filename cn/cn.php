<?php
$Servidor = "testserver.local";
$Puerto = 3306; // Puerto del servidor de base de datos
$Base_Datos = "facturacion_js";
$Usuario = "root "; // Usuario de la base de datos
$Clave = "home.1705"; // Clave del usuario de la base de datos


$conexion = new mysqli($Servidor, $Usuario, $Clave, $Base_Datos, $Puerto);


if ($conexion->connect_error) {
  die("Error de conexión: " . $conexion->connect_error);
}


$conexion->set_charset("utf8");


$conexion->close();
