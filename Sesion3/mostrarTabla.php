<?php
// Datos de la conexión
$host = "localhost";
$usuario = "carlotadlavega2223";
$clave = "nQ69ZPy3";
$bbdd = "carlotadlavega2223";

// Conexión
$db = new mysqli($host, $usuario, $clave, $bbdd);

if ($db) {
    echo "<p>Conexión exitosa</p>";

    // Consulta para mostrar los registros de la tabla
    $sql = "SELECT * FROM usuarios";

    // Ejecutar la consulta
    $resultados = $db->query($sql);

    // Comprobar si hay registros
    if ($resultados->num_rows > 0) {
        // Mostrar los registros en una tabla
        echo "<table>";
        echo "<tr><th>ID</th><th>Nombre</th><th>Email</th><th>Teléfono</th><th>Edad</th></tr>";
        while ($fila = $resultados->fetch_assoc()) {
            echo "<tr><td>".$fila["id"]."</td><td>".$fila["nombre"]."</td><td>".$fila["email"]."</td><td>".$fila["telefono"]."</td><td>".$fila["edad"]."</td></tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No hay registros en la tabla</p>";
    }

    mysqli_close($db);
} else {
    echo "<p>Error de conexión</p>";
    echo "<p>Código: ".mysqli_connect_errno()."</p>";
    echo "<p>Mensaje: ".mysqli_connect_error()."</p>";
    die("Adiós");
}
?>
