<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tienda IES San Clemente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <h1>Lista de usuarios</h1>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
    <p>Lista de usuarios con enlaces para borrar y editar</p>
    <?php
        //Obter conexión
        include("lib/base_datos.php");
        $conexion = get_conexion();
        //Seleccionar bd
        seleccionar_bd_tienda($conexion);
        //Consulta obtención dos usuarios (array)
        include("lib/utilidades.php");
        //Crear lista de usuarios
        //  - cada usuario mostra dous enlaces (editar e borrar)
        //  - editar.php?id=4
        //  - borrar.php?id=7

        $sql = "SELECT id, nombre, apellidos, edad, provincia FROM usuarios";
        $resultados = $conexion->query($sql);
        if($resultados->num_rows > 0){
            echo "<table>";
            echo "<tr style='border: 1px solid black'><th>Nome</th><th>Apelidos</th><th>Idade</th><th>Provincia</th></tr>";
            while($row = $resultados->fetch_assoc()){
                echo "<tr style='border: 1px solid black'>";
                echo "<td>".$row["nombre"]."</td>";
                echo "<td>".$row["apellidos"]."</td>";
                echo "<td>".$row["edad"]."</td>";
                echo "<td>".$row["provincia"]."</td>";
                echo "<td> <a class='btn btn-primary' href=editar.php?id=".$row['id'].">Editar</a> </td>";
                echo "<td> <a class='btn btn-primary' href=borrar.php?id=".$row['id'].">Borrar</a> </td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "No hay resultados";
        }


    ?>
    <footer>
        <p>
            <a href='index.php'>Página de inicio</a>
        </p>
    </footer>
</body>

</html>