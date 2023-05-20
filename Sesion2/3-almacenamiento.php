<?php

// Iniciamos la sesión
session_start();

// Si se pulsa el botón de borrar.
if (isset($_POST['borrar'])) {
    session_unset();
    session_destroy();
}

// Si se introduce el nombre, lo guardamos en la variable de sesión.
if (isset($_POST['nombre'])) {
    $nombre = strip_tags($_POST['nombre']);
    htmlentities($nombre, ENT_QUOTES);
    $_SESSION['nombre'] = $nombre;
    $_SESSION['numeros'] = array();
}

// Si es la primera vez que visitamos o hemos borrado sesión, mostramos el formulario
if (!isset($_SESSION['nombre']) || isset($_POST['borrar'])) {
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
        // Generar un nuevo número aleatorio.
        $nuevo_numero = rand();
        $_SESSION['numeros'][] = $nuevo_numero;

        // Lista de números generados menos el último, es decir, el que acabamos de generar.
        echo "<ol>";
        for ($i = 0; $i < count($_SESSION['numeros']) - 1; $i++)
            echo "<li>" . $_SESSION['numeros'][$i] . "</li>";
        echo "</ol>";

        // El numero que acabo de generar.
        echo "<p> El nuevo número es: $nuevo_numero </p>";
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