<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Pregunta 1</title>
    <link rel="stylesheet" href="./estilos.css">
</head>

<body>
    <?php 

    // En la primera página solo tenemos que comprobar si existen cookies de las demás respuestas.
    if (isset($_COOKIE['pregunta1']) || isset($_COOKIE['pregunta2']) || isset($_COOKIE['pregunta3']) || isset($_COOKIE['pregunta4']) || isset($_COOKIE['pregunta5'])) {
        setcookie('pregunta1', '', time() - 3600);
        setcookie('pregunta2', '', time() - 3600);
        setcookie('pregunta3', '', time() - 3600);
        setcookie('pregunta4', '', time() - 3600);
        setcookie('pregunta5', '', time() - 3600);
    }

    ?>

    <form action="pregunta2.php" method="POST">

        <h2> ¿Tenía conocimientos previos de la materia explicada? </h2>
        <label><input type="radio" name="pregunta1" value="Si">
            Sí  </label>
        <label><input type="radio" name="pregunta1" value="No">
            No </label>
        <label><input type="radio" name="pregunta1" value="NS/NC">
            NS / NC </label>

        <div class="botones">
            <input type="submit" value="Siguiente" name="siguiente">
        </div>

    </form>

</body>

</html>