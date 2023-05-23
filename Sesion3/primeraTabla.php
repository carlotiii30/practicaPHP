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
	
	// Crear la tabla
	$sql = "CREATE TABLE usuarios (
			id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			nombre VARCHAR(30),
			email VARCHAR(50),
			password VARCHAR(255),
			telefono VARCHAR(9),
			edad CHAR(1) CHECK (edad IN ('a', 'b', 'c'))
			)";
			
	// Ejecutar la consulta
	$db->query($sql);
	
	echo "Tabla creada correctamente";
	mysqli_close($db);
	
} else {
	echo "<p>Error de conexión</p>";
	echo "<p>Código: ".mysqli_connect_errno()."</p>";
	echo "<p>Mensaje: ".mysqli_connect_error()."</p>";
	die("Adiós");
}

?>
