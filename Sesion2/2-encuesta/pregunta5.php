<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Pregunta 1</title>
    <link rel="stylesheet" href="./estilos.css">
</head>

<body>

    <?php

    // Comprobamos, si no está, vamos a la 1.
    if (!isset($_POST['pregunta4']) || !isset($_COOKIE['pregunta1']) || !isset($_COOKIE['pregunta2']) || !isset($_COOKIE['pregunta3'])) {
        header('Location: pregunta1.php');
        exit;
    }

    // Almacenamos cookie
    setcookie('pregunta4', $_POST['pregunta4']);

    ?>

    <form action="resultado.php" method="POST">

        <h2> El sistema de evaluación es: </h2>
        <label><input type="radio" name="pregunta5" value="Inadecuado">
            Inadecuado </label>
        <label><input type="radio" name="pregunta5" value="Adecuado">
            Adecuado </label>
        <label><input type="radio" name="pregunta5" value="NS/NC">
            NS / NC </label>

        <div class="botones">
            <input type="submit" value="Siguiente">
        </div>

    </form>

</body>

</html>