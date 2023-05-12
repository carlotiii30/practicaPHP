<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title> Diferencias entre SCRIPT_NAME y PHP_SELF </title>
</head>

<body>
    <pre>
    <?php
    preg_match('#([^/]*php)/(.*)$#', $_SERVER['PHP_SELF'], $coincidencias);
    $chunks = (count($coincidencias) > 0) ? explode('/', $coincidencias[2]) : [];
    if (count($chunks) > 0)
        echo '<pre>' . var_export($chunks, true) . '</pre>';
    else
        echo '<p>No hay trailing path</p>';

    // Comprobamos si se han introducidos valores en a y b.
    if (isset($_GET['a'])) {
        echo '<p>';
        echo 'Valor de a: ';
        $a = $_GET['a'];
        echo $a;
        echo '</p>';
    } else {
        echo '<p>';
        echo '¿Donde está la a?';
        echo '</p>';
    }

    if (isset($_GET['b'])) {
        echo '<p>';
        echo 'Valor de b: ';
        $b = $_GET['b'];
        echo $b;
        echo '</p>';
    } else {
        echo '<p>';
        echo '¿Donde está la b?';
        echo '</p>';
    }

    if (isset($_GET['a']) and isset($_GET['b'])) {
        // Comprobamos si los valores introducidos son números
        if (is_numeric($a) and is_numeric($b)) {
            if ($coincidencias[2] == 'multiplica') {
                echo '<p>';
                echo 'Resultado: ';
                echo ($a * $b);
                echo '</p>';
            } else if ($coincidencias[2] == 'suma') {
                echo '<p>';
                echo 'Resultado: ';
                echo ($a + $b);
                echo '</p>';
            } else if ($coincidencias[2] == 'divide') {
                echo '<p>';
                echo 'Resultado: ';
                echo ($a / $b);
                echo '</p>';
            }
        } else
            echo 'Los valores introducidos no son números.';
    }
    ?>
    </pre>;
</body>

</html>