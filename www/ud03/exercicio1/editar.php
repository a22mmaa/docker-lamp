<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tienda IES San Clemente </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <h1>Editar usuario </h1>
    <?php

        //Obter id de $_GET
        $id_editar = isset($_GET['id']) ? $_GET['id'] : null;

        if($id_editar === null) {
            die("<p><a href='index.php'>Página de inicio</a></p>");
        }

        //Conexión
        include("lib/base_datos.php");
        $conexion = get_conexion();

        //Seleccionar bd
        seleccionar_bd_tienda($conexion);

        //Obter os datos de $_POST
        $nome = $apelido = $idade = $provincia = "";

        
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nome = test_input($_POST["nome"]);
            $apelido = test_input($_POST["apelido"]);
            $idade = test_input($_POST["idade"]);
            $provincia = test_input($_POST["provincia"]);


            if($nome==false || $apelido==false || $idade==false || $provincia==false) {
                echo "Todos os campos son obrigatorios";
            } else {
                editar($conexion, $id_editar, $nome, $apelido, $idade, $provincia);
            }
        }

        //Executar UPDATE


        


    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>

    <p>Datos para editar</p>
    <?php
        //Consultar datos de ese id
        include("lib/utilidades.php");
        consultar_usuarios($conexion, $id_editar);
    ?>
    
    <p>Formulario de edición</p>
    <!-- o "action" chama a editar.php de xeito reflexivo-->

    <div class="form">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <p>Nome: <input type="text" name="nome" /></p>
            <p>Apelido: <input type="text" name="apelido" /></p>
            <p>Idade: <input type="number" name="idade" /></p>
            <p>Provincia: <input type="text" name="provincia" /></p>
            <p><input type="submit" /></p>
        </form>
    </div>
    
    <footer>
        <p>
            <a href='index.php'>Página de inicio</a>
        </p>
    </footer>
</body>

</html>