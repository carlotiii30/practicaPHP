<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <title>Ejemplo</title>
</head>

<body>
    <?php
    echo '<p>Si has llegado aquí es porque la URL que has puesto es incorrecta</p>';
    echo '<pre>' . var_export($_SERVER, true) . '</pre>';
    ?>
</body>

</html>