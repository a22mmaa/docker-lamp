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
    <h1>Alta de usuario</h1>

    <?php
        //Comprobar se veñen datos polo $_POST
        //Conexión
        //Seleccionar bd
        //Executar o INSERT

        // Manuel: Definimos variábeis e verificamos 

        $nome = $apelido = $idade = $provincia = "";

        
        include("lib/utilidades.php");
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome = test_input($_POST["nome"]);
        $apelido = test_input($_POST["apelido"]);
        $idade = test_input($_POST["idade"]);
        $provincia = test_input($_POST["provincia"]);
        }


        // Manuel: Conexión coa BBDD e selección 

        include("lib/base_datos.php");
        $conexion = get_conexion();
        seleccionar_bd_tienda($conexion);

        

        
        
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>

    <p>Formulario de alta</p>

    <div class="form">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <p>Nome: <input type="text" name="nome" /></p>
            <p>Apelido: <input type="text" name="apelido" /></p>
            <p>Idade: <input type="number" name="idade" /></p>
            <p>Provincia: <input type="text" name="provincia" /></p>
            <p><input type="submit" /></p>
        </form>
    </div>
    <!-- o "action" chama a dar_de_alta.php de xeito reflexivo-->
    <?php


        if($nome==false || $apelido==false || $idade==false || $provincia==false) {
            echo "Todos os campos son obrigatorios";
        } else {
            if (editar($conexion, $nombre, $apellido, $edad, $provincia)) {
                echo "Editado";
            } else {
                echo "Problema ao editar: " . mysqli_error($conexion);
            }
        }

        
    ?>
    
    <footer>
        <p>
            <a href='index.php'>Página de inicio</a>
        </p>
    </footer>
</body>

</html>