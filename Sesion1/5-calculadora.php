<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Calculadora</title>
    <style>
        main {
            font-family: Arial;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        form {
            border: 2px solid lightgray;
            padding: 5px;
            display: inline-flex;
            align-items: center;
            background-color: lightblue;
        }

        fieldset {
            display: flex;
            flex-direction: column;
        }

        label {
            margin: 10px;
            display: flex;
            flex-direction: column;
        }

        .error {
            color: red;
        }
    </style>
</head>

<body>
    <?php

    $errores = array();

    // - - - Comprobamos si el formulario se ha enviado - - -
    if (isset($_GET) and !empty($_GET)) {

        // - - - -  Comprobamos que los números han sido introducidos. - - - -
        if (isset($_GET['numero1'])) {
            $x = $_GET['numero1'];
        } else {
            $errores[] = "ERROR: El primer dato no es válido";
        }

        if (isset($_GET['numero2'])) {
            $y = $_GET['numero2'];
        } else {
            $errores[] = "ERROR: El segundo dato no es válido";
        }

        // - - - -  Si ambos están... - - - -
        if (isset($_GET['numero1']) and isset($_GET['numero2'])) {

            // - - - - Comprobamos que la operación ha sido introducida - - - -
            if (isset($_GET['suma']))
                $operacion = $_GET['suma'];
            elseif (isset($_GET['resta']))
                $operacion = $_GET['resta'];
            elseif (isset($_GET['producto']))
                $operacion = $_GET['producto'];
            elseif (isset($_GET['division']))
                $operacion = $_GET['division'];

            // - - - - Comprobamos si son números - - - -
            if (is_numeric($x) and is_numeric($y)) {

                // - - - - Miramos cual es la operación a realizar.
                if ($operacion == '+') {
                    $operacionS = 'Suma';
                    $solucion = $x + $y;
                }

                if ($operacion == '-') {
                    $operacionS = 'Resta';
                    $solucion = $x - $y;
                }

                if ($operacion == '*') {
                    $operacionS = 'Producto';
                    $solucion = $x * $y;
                }

                if ($operacion == '/') {
                    // - - - - Comprobamos la división por 0.
                    if ($y != 0) {
                        $operacionS = 'División';
                        $solucion = $x / $y;
                    } else {
                        $errores[] = "ERROR: División por cero";
                    }
                }

            } else {
                if (!is_numeric($x)) {
                    $errores[] = "ERROR: El primer dato no es válido";
                }

                if (!is_numeric($y)) {
                    $errores[] = "ERROR: El segundo dato no es válido";
                }
            }
        }
    }

    ?>

    <main>
        <h1>Calculadora</h1>
        <form action="" method="GET">
            <label><span>Dato 1</span> <input type="text" name="numero1" placeholder="Introduce un número" <?php if (isset($_GET['numero1']) and is_numeric($_GET['numero1']))
                echo 'value="' . $_GET['numero1'] . '"' ?> /> </label>
                <fieldset>
                    <legend>Operación</legend>
                    <input type="submit" name="suma" value="+">
                    <input type="submit" name="resta" value="-">
                    <input type="submit" name="producto" value="*">
                    <input type="submit" name="division" value="/">
                </fieldset>
                <label><span>Dato 2</span><input type="text" name="numero2" placeholder="Introduce un número" <?php if (isset($_GET['numero2']) and is_numeric($_GET['numero2']))
                echo 'value="' . $_GET['numero2'] . '"' ?> /> </label>
            </form>

            <section>
                <p><span>
                    <?php if (isset($_GET) and !empty($_GET)) {
                if (empty($errores))
                    echo 'Operación: ' . $operacionS;
            } ?>
                </span> </p>
            <span>
                <?php
                if (isset($_GET) and !empty($_GET)) {
                    if (!empty($errores))
                        foreach ($errores as $error)
                            echo '<p class="error">' . $error . "</p>";
                    else
                        echo '<p> Resultado: ' . $solucion . '</p>';
                }
                ?>
            </span>
        </section>

    </main>
</body>

</html>