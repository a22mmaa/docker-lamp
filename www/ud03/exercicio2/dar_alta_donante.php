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
    <h1>Alta de donante</h1>
    <div>
        <?php
        $nombre = $apellido = $edad = $grupo_sanguineo = $cp = $telefono = "";

        
        include("lib/utilidades.php");
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombre = test_input($_POST["nombre"]);
            $apellido = test_input($_POST["apellido"]);
            $edad = test_input($_POST["edad"]);
            $grupo_sanguineo = test_input($_POST["grupo_sanguineo"]);
            $cp = test_input($_POST["cp"]);
            $telefono = test_input($_POST["telefono"]);
            
            novo_donante($nombre, $apellido, $edad, $grupo_sanguineo, $cp, $telefono);
        }

        ?>

        Formulario para dar de alta un donante
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <p>Nome: <input type="text" name="nombre" /></p>
            <p>Apelido: <input type="text" name="apellido" /></p>
            <p>Idade: <input type="number" name="edad" /></p>
            <p>Grupo sanguíneo: <select name="grupo_sanguineo">
                <option value="O-">O-</option>
                <option value="O+">O+</option>
                <option value="A-">A-</option>
                <option value="A+">A+</option>
                <option value="B-">B-</option>
                <option value="B+">B+</option>
                <option value="AB-">AB-</option>
                <option value="AB+">AB+</option>
            </select></p>
            <p>Código postal: <input type="number" name="cp" /></p>
            <p>Teléfono: <input type="number" name="telefono" /></p>
            <p><input type="submit" /></p>
        </form>
    </div>

    <footer>
        <p><a href='index.php'>Página de inicio</a></p>
    </footer>

</body>

</html>