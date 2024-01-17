<?php
    include("lib/utilidades.php");
    include("lib/base_datos.php");

    $conPDO = estabelecer_conexion();
    $conPDO->exec("USE donacion231210");

    $mensaxes = array();

    $data = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (!empty($_POST['data'])) {
            $data = test_input($_POST['data']);
        } else {
            $mensaxes[] = array("erro", "Introduce unha data");
        }

        if (!empty($_POST['id_donante'])) {
            $id_donante = test_input($_POST['id_donante']);
        } else {
            $mensaxes[] = array("erro", "Erro en id donante");
        }
    
        if (count($mensaxes) ==  0) {
            donar($data, $id_donante);
            $mensaxes[] = array("success", "Donación realizada");
        }
    } elseif (isset($_GET['id'])) {
        $id_donante = $_GET["id"];
    }
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
    <h1>Alta de donación</h1>
    <div>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

    <input type="hidden" name="id_donante" value="<?php echo $id_donante;?>">

    <label for="data">Data donacion:</label>
    <input type="date" id="data" name="data" required>

    <button type="submit">Enviar</button>
</form>

    </div>

    <footer>
        <p><a href='index.php'>Página de inicio</a></p>
    </footer>

</body>

</html>