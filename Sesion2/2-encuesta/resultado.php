<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Pregunta 3</title>
    <link rel="stylesheet" href="./estilos.css">
</head>

<body>
    <?php

    // Comprobamos.
    if (!isset($_POST['pregunta5']) || !isset($_COOKIE['pregunta1']) || !isset($_COOKIE['pregunta2']) || !isset($_COOKIE['pregunta3']) || !isset($_COOKIE['pregunta4'])) {
        header('Location: pregunta1.php');
        exit;
    }

    // Almacenamos cookie
    setcookie('pregunta5', $_POST['pregunta5']);

    ?>

    <p>Las respuestas proporcionadas son:</p>
    <ul>
        <li>Pregunta 1:
            <?php echo $_COOKIE['pregunta1']; ?>
        </li>
        <li>Pregunta 2:
            <?php echo $_COOKIE['pregunta2']; ?>
        </li>
        <li>Pregunta 3:
            <?php echo $_COOKIE['pregunta3']; ?>
        </li>
        <li>Pregunta 4:
            <?php echo $_COOKIE['pregunta4']; ?>
        </li>
        <li>Pregunta 5:
            <?php echo $_POST['pregunta5']; ?>
        </li>
    </ul>

</body>