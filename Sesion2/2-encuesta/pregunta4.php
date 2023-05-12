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
    if (!isset($_POST['pregunta3']) || !isset($_COOKIE['pregunta1']) || !isset($_COOKIE['pregunta2'])) {
        header('Location: pregunta1.php');
        exit;
    }

    // Almacenamos cookie
    setcookie('pregunta3', $_POST['pregunta3']);

    ?>
    <form action="pregunta5.php" method="POST">

        <h2> La coordinación entre teoría y prácticas es: </h2>
        <label><input type="radio" name="pregunta4" value="Mala">
            Mala </label>
        <label><input type="radio" name="pregunta4" value="Buena">
            Buena </label>
        <label><input type="radio" name="pregunta4" value="NS/NC">
            NS / NC </label>

        <div class="botones">
            <input type="submit" value="Siguiente">
        </div>

    </form>

</body>

</html>