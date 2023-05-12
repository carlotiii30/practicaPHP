<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Pregunta 2</title>
    <link rel="stylesheet" href="./estilos.css">
</head>

<body>

    <?php
    // A partir de esta, comprobamos la respuesta anterior, y redirigimos.
    
    // Comprobamos, si no está, vamos a la 1.
    if (!isset($_POST['pregunta1'])) {
        header('Location: pregunta1.php');
        exit;
    }

    // Almacenamos cookie
    setcookie('pregunta1', $_POST['pregunta1']);

    ?>

    <form action="pregunta3.php" method="POST">

        <h2> Considera que la profundidad del temario en estos temas es: </h2>
        <label><input type="radio" name="pregunta2" value="Deficiente">
            Deficiente </label>
        <label><input type="radio" name="pregunta2" value="Adecuada">
            Adecuada </label>
        <label><input type="radio" name="pregunta2" value="Excesiva">
            Excesiva </label>
        <label><input type="radio" name="pregunta2" value="NS/NC">
            NS / NC </label>

        <div class="botones">
            <input type="submit" value="Siguiente">
        </div>

    </form>

</body>

</html>