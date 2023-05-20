<?php
// Iniciamos la sesión
session_start();

// - - - - - FUNCIONES - - - - -  -

// Funcion para asignar turno inicial.
function turnoInicial()
{
    if (rand(0, 1) == 0) {
        return 'O';
    } else {
        return 'X';
    }
}

// Funcion para inicializar el juego
function inicializar()
{
    $_SESSION['tablero'] = array(
        array('', '', ''),
        array('', '', ''),
        array('', '', '')
    );

    $_SESSION['turno'] = turnoInicial();
    $_SESSION['ganadora'] = null;
}

// Funcion para comprobar si la casilla esta libre
function casillaLibre($fila, $columna)
{
    return ($_SESSION['tablero'][$fila][$columna] == '');
}

// Función para comprobar si hay un ganador.
function comprobarGanador($tablero)
{
    $combinacionGanadora = array();

    // Filas
    for ($i = 0; $i < 3; $i++) {
        if ($tablero[$i][0] !== '' && $tablero[$i][0] == $tablero[$i][1] && $tablero[$i][1] == $tablero[$i][2]) {
            $combinacionGanadora = array([$i, 0], [$i, 1], [$i, 2]);
            $_SESSION['ganadora'] = $combinacionGanadora;
            return true;
        }
    }

    // Columnas
    for ($j = 0; $j < 3; $j++) {
        if ($tablero[0][$j] !== '' && $tablero[0][$j] == $tablero[1][$j] && $tablero[1][$j] == $tablero[2][$j]) {
            $combinacionGanadora = array([0, $j], [1, $j], [2, $j]);
            $_SESSION['ganadora'] = $combinacionGanadora;
            return true;
        }
    }

    // Diagonales
    if ($tablero[0][0] !== '' && $tablero[0][0] == $tablero[1][1] && $tablero[1][1] == $tablero[2][2]) {
        $combinacionGanadora = array([0, 0], [1, 1], [2, 2]);
        $_SESSION['ganadora'] = $combinacionGanadora;
        return true;
    }
    if ($tablero[0][2] !== '' && $tablero[0][2] == $tablero[1][1] && $tablero[1][1] == $tablero[2][0]) {
        $combinacionGanadora = array([0, 2], [1, 1], [2, 0]);
        $_SESSION['ganadora'] = $combinacionGanadora;
        return true;
    }

    // No hay ganador
    return false;
}

// Funcion para comprobar si hay empate
function comprobarEmpate()
{
    for ($fila = 0; $fila < 3; $fila++) {
        for ($columna = 0; $columna < 3; $columna++) {
            if (casillaLibre($fila, $columna)) {
                return false; // Todavía hay celdas vacías, así que no es empate
            }
        }
    }
    return true; // No hay celdas vacías, por tanto, es empate
}

// Funcion para comprobar si el juego ha terminado
function finJuego($tablero)
{
    return (comprobarEmpate() || (comprobarGanador($tablero)));
}

// Funcion para imagenes
function imagen($fila, $columna)
{
    if (casillaLibre($fila, $columna))
        echo "bamarillo.png";
    else {
        if ($_SESSION['tablero'][$fila][$columna] == 'X')
            echo "bazul.png";
        else
            echo "brojo.png";
    }
}

// Funcion turnos.
function turno()
{
    if ($_SESSION['turno'] == 'X')
        echo "bazul.png";
    else
        echo "brojo.png";
}

//Funcion para clases
function clase($fila, $columna)
{
    if (isset($_SESSION['ganadora']) && is_array($_SESSION['ganadora']) && in_array([$fila, $columna], $_SESSION['ganadora'])) {
        echo "ganador";
    } elseif (casillaLibre($fila, $columna)) {
        echo "libre";
    } else {
        echo "ocupada";
    }
}




// Borrar sesión
function borrarSesion()
{
    if (isset($_SESSION['tablero'])) {
        session_destroy();
        session_unset();
    }
}



// - - - - - CÓDIGO PRINCIPAL - - - - -

// Iniciamos el juego: inicializamos tablero y turno.
if (!isset($_SESSION['tablero']) || isset($_POST['limpiar']) || isset($_POST['reiniciar'])) {
    inicializar();
} else {
    // Coordenadas
    $coordenadas = str_replace('poner', '', array_keys($_POST)[0]); // Eliminamos la cadena "poner" con str_replace.
    $fila = intval($coordenadas[0]); // Guardamos la primera coordenada como int.
    $columna = intval($coordenadas[1]); // Guardamos la segunda coordenada como int.

    // Comprobamos si la casilla está libre
    if (casillaLibre($fila, $columna)) {
        // Ponemos la ficha del jugador actual en la casilla
        $_SESSION['tablero'][$fila][$columna] = $_SESSION['turno'];

        // Cambiamos el turno
        if ($_SESSION['turno'] == 'X')
            $_SESSION['turno'] = 'O';
        else
            $_SESSION['turno'] = 'X';

        // Verificamos si ha terminado la partida después de realizar la pulsación y cambiar el turno
        if (finJuego($_SESSION['tablero'])) {
            if (isset($_POST['limpiar']) || isset($_POST['reiniciar'])) {
                borrarSesion();
            }
        }
    }
}

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>3 en raya</title>
    <style>
        body {
            font-family: helvetica;
        }

        .juego {
            width: 200px;
            margin: auto;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .juego>h1 {
            width: 100%;
            background-color: lightgreen;
            text-align: center;
        }

        .juego>.informacion {
            width: 100%;
            background-color: lightgreen;
        }

        .informacion {
            margin: 5px 0;
            padding: 5px;
        }

        .informacion img {
            vertical-align: middle;
        }

        .informacion p {
            text-align: center;
            margin: auto;
        }

        .libre {
            transition: transform .5s ease-in-out;
        }

        .libre:hover {
            transform: scale(1.5);
            cursor: pointer;
        }

        .ganador {
            animation: anim 0.5s infinite linear alternate;
        }

        @keyframes anim {
            from {
                transform: scale(1);
            }

            to {
                transform: scale(1.5);
            }
        }
    </style>
</head>

<body>
    <section class="juego">
        <h1>3 en raya</h1>

        <section class="tablero">
            <form method="post" action="">
                <table>
                    <tr>
                        <td><input type="image" class="<?php clase(0, 0); ?>" src="<?php imagen(0, 0); ?>" width="50px"
                                formmethod="post" name="poner00" <?php if (finJuego($_SESSION['tablero']))
                                    echo "disabled"; ?> /></td>
                        <td><input type="image" class="<?php clase(0, 1); ?>" src="<?php imagen(0, 1); ?>" width="50px"
                                formmethod="post" name="poner01" <?php if (finJuego($_SESSION['tablero']))
                                    echo "disabled"; ?> /></td>
                        <td><input type="image" class="<?php clase(0, 2); ?>" src="<?php imagen(0, 2); ?>" width="50px"
                                formmethod="post" name="poner02" <?php if (finJuego($_SESSION['tablero']))
                                    echo "disabled"; ?> /></td>
                    </tr>
                    <tr>
                        <td><input type="image" class="<?php clase(1, 0); ?>" src="<?php imagen(1, 0) ?>" width="50px"
                                formmethod="post" name="poner10" <?php if (finJuego($_SESSION['tablero']))
                                    echo "disabled"; ?> /></td>
                        <td><input type="image" class="<?php clase(1, 1); ?>" src="<?php imagen(1, 1) ?>" width="50px"
                                formmethod="post" name="poner11" <?php if (finJuego($_SESSION['tablero']))
                                    echo "disabled"; ?> /></td>
                        <td><input type="image" class="<?php clase(1, 2); ?>" src="<?php imagen(1, 2) ?>" width="50px"
                                formmethod="post" name="poner12" <?php if (finJuego($_SESSION['tablero']))
                                    echo "disabled"; ?> /></td>
                    </tr>
                    <tr>
                        <td><input type="image" class="<?php clase(2, 0); ?>" src="<?php imagen(2, 0) ?>" width="50px"
                                formmethod="post" name="poner20" <?php if (finJuego($_SESSION['tablero']))
                                    echo "disabled"; ?> /></td>
                        <td><input type="image" class="<?php clase(2, 1); ?>" src="<?php imagen(2, 1) ?>" width="50px"
                                formmethod="post" name="poner21" <?php if (finJuego($_SESSION['tablero']))
                                    echo "disabled"; ?> /></td>
                        <td><input type="image" class="<?php clase(2, 2); ?>" src="<?php imagen(2, 2) ?>" width="50px"
                                formmethod="post" name="poner22" <?php if (finJuego($_SESSION['tablero']))
                                    echo "disabled"; ?> /></td>
                    </tr>
                </table>
            </form>
        </section>

        <section class="informacion">
            <p>Turno: <img src="<?php turno() ?>" width="25px" /></p>
        </section>

        <section class="botones">
            <form method="post" action="">
                <input type="submit" name="limpiar" value="Limpiar" />
                <?php if (finJuego($_SESSION['tablero']))
                    echo "<input type='submit' name='reiniciar' value='Reiniciar' />"; ?>
            </form>
        </section>
    </section>
</body>

</html>