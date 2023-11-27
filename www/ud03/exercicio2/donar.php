<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Donación Sangre</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
    <?php

    // QUEDEI AQUI!


    $id = $donante = $fecha_donacion = $fecha_proxima_donacion = "";
    $id_donante = $_GET["id"];

        
    include("lib/utilidades.php");
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = test_input($_POST["id"]);
        $donante = test_input($_POST["donante"]);
        $fecha_donacion = test_input($_POST["fecha_donacion"]);
        $fecha_proxima_donacion = test_input($_POST["fecha_proxima_donacion"]);

        donar($id, $donante, $fecha_donacion, $fecha_proxima_donacion);
    }

    ?>
    <br>
    <h1>Alta de donación</h1>
    <div>
        Formulario para dar de alta una donación
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="hidden" name="donante" value="<?php echo $id_donante; ?>">
            <p>Data donación: <input type="date" name="fecha_donacion" /></p>
            <input type="hidden" name="fecha_proxima_donacion" value="<?php echo calcular_proxima_donacion($fecha_donacion); ?>">
            <p><input type="submit" /></p>
        </form>
    </div>

    <footer>
        <p><a href='index.php'>Página de inicio</a></p>
    </footer>

</body>

</html>