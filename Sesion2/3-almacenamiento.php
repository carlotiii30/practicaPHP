<?php
session_start();

// Si se pulsa el botón de borrar.
if (isset($_POST['borrar'])) {
    session_unset();
    session_destroy();
}

// Si se introduce el nombre.
if (isset($_POST['nombre'])) {
    $_SESSION['nombre'] = $_POST['nombre'];
    $_SESSION['numeros'] = array();
}

// Si es la primera vez que visitamos, mostramos el formulario
if (!isset($_SESSION['nombre'])) {
    echo <<<HTML
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <title> Almacenamiento de datos </title>
        </head>
        <body>
            <form action="" method="post">
                <label for="name">Dígame su nombre para comenzar:</label>
                <input type="text" name="nombre">

                <div class="botones">
                    <p><input type="submit" name="enviar" value="Enviar">
                        <input type="submit" name="borrar" value="Borrar sesión">
                    </p>
                </div>
            </form>
            <a href="">Cargar de nuevo</a>
        </body>
        </html>
    HTML;
}
// Y si ya tenemos el nombre
else {
    // Mensaje de bienvenida
    echo "<p> Bienvenido, {$_SESSION['nombre']} </p>";

    if (isset($_SESSION['numeros'])) {

        // Lista de números generados
        echo "<ol>";
        foreach ($_SESSION['numeros'] as $num)
            echo "<li> $num </li>";
        echo "</ol>";

        if (isset($_POST['enviar'])) {
            // Generar un nuevo número aleatorio y mostrarlo
            $nuevo_numero = rand();
            echo "<p> El nuevo número es: $nuevo_numero </p>";
            $_SESSION['numeros'][] = $nuevo_numero;
        }
    }

    // Formulario.
    echo <<<HTML
            <form action="" method="post">
                <label for="name">Dígame su nombre para comenzar:</label>
                <input type="text" name="nombre">
                <div class="botones">
                    <p><input type="submit" name="enviar" value="Enviar">
                        <input type="submit" name="borrar" value="Borrar sesión">
                    </p>
                </div>
            </form>
            <a href="">Cargar de nuevo</a>
        </body>
        </html>
    HTML;
}
?>