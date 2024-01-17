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
    <?php

    include("lib/utilidades.php");

    $codigo_postal = '';
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $codigo_postal = test_input($_POST["codigo_postal"]);

        procurar_cp($codigo_postal);

    } elseif (isset($_GET['id'])) {
        $id_donante = $_GET["id"];
    }
    ?>
    <br>
    <h1>Buscar donantes</h1>
    <div>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <p>CP: <input type="number" name="codigo_postal" /></p>
            <p><input type="submit" /></p>
        </form>
    </div>

    <footer>
        <p><a href='index.php'>Página de inicio</a></p>
    </footer>

</body>

</html>