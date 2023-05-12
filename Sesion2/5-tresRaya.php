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
                        <td><input type="image" class="libre" src="bamarillo.png" width="50px" formmethod="post"
                                name="poner00" /></td>
                        <td><input type="image" class="libre" src="bamarillo.png" width="50px" formmethod="post"
                                name="poner01" /></td>
                        <td><input type="image" src="bazul.png" width="50px" formmethod="post" name="poner02" /></td>
                    </tr>
                    <tr>
                        <td><input type="image" src="brojo.png" width="50px" formmethod="post" name="poner10" /></td>
                        <td><input type="image" src="brojo.png" width="50px" formmethod="post" name="poner11" /></td>
                        <td><input type="image" class="libre" src="bamarillo.png" width="50px" formmethod="post"
                                name="poner12" /></td>
                    </tr>
                    <tr>
                        <td><input type="image" class="libre" src="bamarillo.png" width="50px" formmethod="post"
                                name="poner20" /></td>
                        <td><input type="image" src="bazul.png" width="50px" formmethod="post" name="poner21" /></td>
                        <td><input type="image" class="libre" src="bamarillo.png" width="50px" formmethod="post"
                                name="poner22" /></td>
                    </tr>
                </table>
            </form>
        </section>
        <section class="informacion">
            <p>Turno: <img src="brojo.png" width="25px" /></p>
        </section>
        <section class="botones">
            <form method="post" action="">
                <input type="submit" name="limpiar" value="Limpiar" />
            </form>
        </section>
    </section>
</body>

</html>