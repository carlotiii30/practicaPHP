<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Formulario</title>

    <style>
        .correcto {
            font-family: Arial;
            display: flex;
            flex-direction: column;
        }

        .formulario {
            font-family: Arial;
            display: flex;
            flex-direction: column;
            background-color: moccasin;
        }

        .formulario h1 {
            padding: 5px;
        }

        .entrada {
            padding: 20px;
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

        // - - - Comprobamos los datos recibidos - - - 
        if (isset($_GET['nombre'])) {
            $nombre = strip_tags($_GET['nombre']);
            htmlentities($nombre, ENT_QUOTES);
        }

        if (isset($_GET['email']))
            $email = $_GET['email'];

        if (isset($_GET['telefono']))
            $telefono = $_GET['telefono'];

        if (isset($_GET['edad']))
            $edad = $_GET['edad'];


        // - - - Validamos los datos - - - 
        if (empty($nombre))
            $errores['nombre'] = "El nombre no puede estar vacío";

        if (!filter_var($email, FILTER_VALIDATE_EMAIL))
            $errores['email'] = "El email no es correcto";

        if (!preg_match("/^[0-9]{9}$/", $telefono))
            $errores['telefono'] = "El teléfono no es correcto";

        if (empty($edad))
            $errores['edad'] = "Debe marcar algún item";
    }

    // - - - Funciones - - - 
    function valor($n)
    {
        if (isset($_GET[$n]))
            echo 'value="' . $_GET[$n] . '"';
    }

    function marcarRadio($n, $v)
    {
        if (isset($_GET[$n]) and ($_GET[$n] == $v))
            echo ' checked';
    }

    function marcarCheckbox($n, $v)
    {
        if (isset($_GET[$v]) and in_array($n, $_GET[$v]))
            echo ' checked';
    }

    function deshabilitar($errores)
    {
        if ((empty($errores) and !empty($_GET)))
            echo ' disabled';
    }

    function mostrarErrores($errores, $i)
    {
        if (!empty($errores[$i]))
            echo '<p class="error">' . $errores[$i] . '</p>';
    }

    ?>

    <div class="correcto">
        <?php if (empty($errores) and !empty($_GET)) {
            echo "<h1> Los datos se han recibido correctamente </h1>";
            echo '<p>';
            echo 'Hola ' . $nombre . ', a continuación se muestra el formulario con los datos recibidos. 
            Se ha desabilitado la entrada de datos porque se trata únicamente de mostrar información 
            aprovechando el formulario. El botón de envío también se ha deshabilitado.';
            echo '</p>';
        }
        ?>
    </div>

    <div class="formulario">
        <h1> Formulario: </h1>

        <form method="get" action="">

            <div class="entrada">
                <label for="nombre">Nombre: </label>
                <input name="nombre" placeholder="Escriba su nombre" <?php valor('nombre');
                deshabilitar($errores); ?> />
                <?php mostrarErrores($errores, 'nombre'); ?>
            </div>

            <div class="entrada">
                <label for="email">Email: </label>
                <input name="email" type="email" placeholder="Escriba su email" <?php valor('email');
                deshabilitar($errores); ?> />
                <?php mostrarErrores($errores, 'email'); ?>
            </div>

            <div class="entrada">
                <label for="telefono">Teléfono: </label>
                <input name="telefono" placeholder="Escriba su teléfono" <?php valor('telefono');
                deshabilitar($errores); ?> />
                <?php mostrarErrores($errores, 'telefono'); ?>
            </div>

            <fieldset>
                <legend>Edad</legend>
                <label><input type="radio" name="edad" value="<12" <?php marcarRadio('edad', '<12');
                deshabilitar($errores); ?>>
                    Menor de 12 años </label>
                <label><input type="radio" name="edad" value="12-18" <?php marcarRadio('edad', '12-18');
                deshabilitar($errores); ?>>
                    Entre 12 y 18 años </label>
                <label><input type="radio" name="edad" value=">18" <?php marcarRadio('edad', '>18');
                deshabilitar($errores); ?>>
                    Mayor de 18 años </label>
                <?php mostrarErrores($errores, 'edad'); ?>
            </fieldset>

            <fieldset>
                <legend>Aficiones</legend>
                <label> <input type="checkbox" name="aficiones[]" value="pajaros" <?php marcarCheckbox('pajaros', 'aficiones');
                deshabilitar($errores); ?>> Los pájaros
                </label>
                <label> <input type="checkbox" name="aficiones[]" value="videojuegos" <?php marcarCheckbox('videojuegos', 'aficiones');
                deshabilitar($errores); ?>> Los videojuegos </label>
                <label> <input type="checkbox" name="aficiones[]" value="botones" <?php marcarCheckbox('botones', 'aficiones');
                deshabilitar($errores); ?>> Coleccionar
                    botones de camisas </label>
                <label> <input type="checkbox" name="aficiones[]" value="techo" <?php marcarCheckbox('techo', 'aficiones');
                deshabilitar($errores); ?>> Mirar el techo
                </label>
                <label> <input type="checkbox" name="aficiones[]" value="ensamblador" <?php marcarCheckbox('ensamblador', 'aficiones');
                deshabilitar($errores); ?>> Programar en ensamblador
                </label>
            </fieldset>

            <div class="botones">
                <input type="submit" value="Enviar datos" <?php deshabilitar($errores); ?>>
            </div>
        </form>

    </div>

</body>

</html>