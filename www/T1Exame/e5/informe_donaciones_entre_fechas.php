<?php

include "lib/base_datos.php";
include "lib/utilidades.php";
include "lib/donaciones.php";

$conexion = get_conexion();
seleccionar_bd_donacion($conexion);

cerrar_conexion($conexion);

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Donación Sangre</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
    <br>
    <h1>Donaciones entre fechas</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

    <p>
        <label for="data1">Data de inicio:</label>
        <input type="date" id="data1" name="data1" required>
    </p>

    <p>
        <label for="data2">Data de fin:</label>
        <input type="date" id="data2" name="data2" min="0" required>
    </p>

    <p>
        <button type="submit">Enviar</button>
    </p>
</form>



    <footer>
        <p><a href='index.php'>Página de inicio</a></p>
    </footer>

    <?php cerrar_conexion($conexion);?>

</body>

</html>