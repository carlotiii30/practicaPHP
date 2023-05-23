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
	
	// Crear usuario
	$pass = password_hash("tw1234", PASSWORD_DEFAULT);
	
	$sql = "INSERT INTO usuarios (nombre, email, password, telefono, edad)
			VALUES ('Carlota', 'carlotadlavega@correo.ugr.es', '$pass', 
					'123456789', 'c')";
			
	// Ejecutar la consulta
	if ($db->query($sql) == TRUE)
		echo "Usuario añadido correctamente";
	else
		echo "Error";
		
	mysqli_close($db);
	
} else {
	echo "<p>Error de conexión</p>";
	echo "<p>Código: ".mysqli_connect_errno()."</p>";
	echo "<p>Mensaje: ".mysqli_connect_error()."</p>";
	die("Adiós");
}

?>
