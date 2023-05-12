<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title> Establecer preferencias en un sitio web </title>
</head>

<body>

    <?php

    // - - - Cargamos los mensajes - - -
    $mensajes = json_decode(file_get_contents('mensajes.json'), true);

    // - - - Comprobamos si el formulario se ha enviado - - -
    if (isset($_GET) and !empty($_GET)) {

        if (isset($_GET["idioma"]) and isset($_GET["aplicar"])) {
            $idioma = $_GET["idioma"];
            setcookie("idioma", $idioma);
        } else {
            $idioma = $_COOKIE["idioma"];
        }

    } else {
        // Inicializamos la variable idioma
        $idioma = "es";
    }

    // - - - Funcion - - - -
    function seleccionado($n, $v)
    {
        if (isset($_GET[$n]) and ($_GET[$n] == $v))
            echo 'selected';
    }

    ?>

    <div class="formulario">
        <p>
            <?php echo $mensajes[$idioma]["Bienvenida"]; ?>
        </p>
        <p>
            <?php echo $mensajes[$idioma]["Cambio"]; ?>
        </p>
        <form method="get" action="">
            <fieldset>
                <legend>
                    <?php echo $mensajes[$idioma]["ElegirIdioma"]; ?>
                </legend>
                <div class="entrada">
                    <select name="idioma">
                        <option value="es" <?php seleccionado("idioma", "es") ?>>
                            <?php echo $mensajes[$idioma]["Espanol"]; ?>
                        </option>
                        <option value="en" <?php seleccionado("idioma", "en") ?>>
                            <?php echo $mensajes[$idioma]["Ingles"]; ?>
                        </option>
                        <option value="fr" <?php seleccionado("idioma", "fr") ?>>
                            <?php echo $mensajes[$idioma]["Frances"]; ?>
                        </option>
                    </select>
                    <div class="botones">
                        <input type="submit" name="aplicar" <?php echo 'value="' . $mensajes[$idioma]["Aplicar"] . '"'; ?>>
                    </div>
                </div>
            </fieldset>
            <div class="botones">
                <input type="submit" <?php echo 'value="' . $mensajes[$idioma]["Enlace"] . '"'; ?>>
            </div>
        </form>
    </div>


</body>

</html>