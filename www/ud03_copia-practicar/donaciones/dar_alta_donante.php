<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Donación Sangre</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <?php
    include("lib/utilidades.php");
    include("lib/base_datos.php");

    $conPDO = estabelecer_conexion();
    $conPDO->exec("USE donacion231210");

    $mensaxes = array();

    $nome = $apelidos = $idade = $sangue = $cp = $tlfn = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (!empty($_POST['nome'])) {
            $nome = test_input($_POST['nome']);
        } else {
            $mensaxes[] = array("erro", "Introduce un nome");
        }
    
        if (!empty($_POST['apelidos'])) {
            $apelidos = test_input($_POST['apelidos']);
        } else {
            $mensaxes[] = array("erro", "Introduce un apelido");
        }

        if (!empty($_POST['sangue'])) {
            $sangue = test_input($_POST['sangue']);
        } else {
            $mensaxes[] = array("erro", "Introduce un grupo sanguíneo");
        }

        if (!empty($_POST['idade']) && is_numeric($_POST['idade']) && $_POST['idade'] >= 18) {
            $idade = test_input($_POST['idade']);
        } elseif (!empty($_POST['idade']) && $_POST['idade'] < 18) {
            $mensaxes[] = array("erro", "Debes ter máis de 18 anos para poder donar");
        } else {
            $mensaxes[] = array("erro", "Introduce un valor numérico para a idade");
        }
    
        if (!empty($_POST['cp']) && is_numeric($_POST['cp']) && strlen($_POST['cp']) == 5) {
            $cp = test_input($_POST['cp']);
        } else {
            $mensaxes[] = array("erro", "Introduce un código postal de 5 dígitos");
        }
    
        if (!empty($_POST['tlfn']) && is_numeric($_POST['tlfn']) && strlen($_POST['tlfn']) == 9) {
            $tlfn = test_input($_POST['tlfn']);
        } else {
            $mensaxes[] = array("erro", "Introduce un teléfono de 9 díxitos");
        }
    
        if (count($mensaxes) ==  0) {
            alta_donante($nome, $apelidos, $idade, $sangue, $cp, $tlfn);
            $mensaxes[] = array("success", "Alta realizada");
        }
    }
    ?>
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
    <br>
    <h1>Alta de donante</h1>
    <div>


    <?= get_mensaxes_html_format($mensaxes); ?>


    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    
    <label for="nome">Nome:</label>
    <input type="text" id="nome" name="nome" required>

    <label for="apelidos">Apelidos:</label>
    <input type="text" id="apelidos" name="apelidos" required>

    <label for="idade">Idade:</label>
    <input type="number" id="idade" name="idade" min="0" required>

    <label for="sangue">Grupo sanguíneo:</label>
    <select id="sangue" name="sangue">
        <option value="o-">O-</option>
        <option value="o+">O+</option>
        <option value="AB-">AB-</option>
        <option value="AB+">AB+</option>
    </select>

    <label for="cp">Código postal:</label>
    <input type="number" id="cp" name="cp" min="0" required>

    <label for="tlfn">Teléfono:</label>
    <input type="number" id="tlfn" name="tlfn" min="0" required>

    <button type="submit">Enviar</button>
</form>

    </div>

    <footer>
        <p><a href='index.php'>Página de inicio</a></p>
    </footer>

</body>

</html>