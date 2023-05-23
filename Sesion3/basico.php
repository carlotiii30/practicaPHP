<?php

// Datos de la conexión
$host = "localhost";
$usuario = "carlotadlavega2223";
$clave = "nQ69ZPy3";
$bbdd = "carlotadlavega2223";

// Conexión
$db = new mysqli($host, $usuario, $clave, $bbdd);
//$db = new PDO("mysql:dbname=$bbdd;host=$host", $usuario, $clave);

if ($db) {
	echo "<p> Conexión con éxito </p>";
	mysqli_close($db);
} else {
	echo "<p>Error de conexión</p>";
	echo "<p>Código: " . mysqli_connect_errno() . "</p>";
	echo "<p>Mensaje: " . mysqli_connect_error() . "</p>";
	die("Adiós");
}

?>