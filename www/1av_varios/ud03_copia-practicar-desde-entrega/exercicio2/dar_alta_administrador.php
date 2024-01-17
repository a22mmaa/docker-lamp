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

    $password = $name = '';

    function novo_admin($name, $password) {
        try {
            $conPDO = conexion_bbdd();
            $conPDO->exec("USE donacion");
            $stmt = $conPDO->prepare("INSERT INTO administradores (username, password) VALUES (:name, :password)");
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':password', $password);

            $stmt->execute();

            echo "Admin rexistrado";
        } catch (PDOException $e) {
            echo "Error al registrar el admin: " . $e->getMessage();
        }
    }
    
    include("lib/utilidades.php");
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = test_input($_POST["name"]);
        $password = test_input($_POST["password"]);


        

        novo_admin($name, $password);
    }

    ?>
    <br>
    <h1>Alta de administrador</h1>
    <div>
    <form method="post" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        Nombre: <input type="text" name="name">
        <br><br>
        Contraseña: <input type="password" name="password">
        <br><br>
        <input type="submit" name="enviar" value="Enviar"> 
    </form>
    </div>

    <footer>
        <p><a href='index.php'>Página de inicio</a></p>
    </footer>

</body>

</html>