<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Pregunta 3</title>
    <link rel="stylesheet" href="./estilos.css">
</head>

<body>

    <?php

    // Comprobamos, si no está, vamos a la 1.
    if (!isset($_POST['pregunta2']) || !isset($_COOKIE['pregunta1'])) {
        header('Location: pregunta1.php');
        exit;
    }

    // Almacenamos cookie
    setcookie('pregunta2', $_POST['pregunta2']);

    ?>

    <form action="pregunta4.php" method="POST">

        <h2> Las explicaciones de teoría son: </h2>
        <label><input type="radio" name="pregunta3" value="Malas">
            Malas </label>
        <label><input type="radio" name="pregunta3" value="Normales">
            Normales </label>
        <label><input type="radio" name="pregunta3" value="Buenas">
            Buenas </label>
        <label><input type="radio" name="pregunta3" value="NS/NC">
            NS / NC </label>

        <div class="botones">
            <input type="submit" value="Siguiente">
        </div>

    </form>

</body>

</html>