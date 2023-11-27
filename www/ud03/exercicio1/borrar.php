



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
<?php

    //Obter conexión
    include("lib/base_datos.php");
    $conexion = get_conexion();

    //Seleccionar bd
    seleccionar_bd_tienda($conexion);

    //Ler o id de $_GET
    $id_borrar = $_GET['id'];

    //Executar consulta de borrado (delete)
    $sql = "DELETE FROM usuarios WHERE id=?";

    $stmt = $conexion->prepare($sql);
    if (!$stmt) {
        die("Erro na preparación da consulta: " . $conexion->error);
    }
    $stmt-> bind_param("i", $id_borrar);

    if ($stmt->execute()) {
        echo "Usuario eliminado correctamente.";
    } else {
        echo "Error al intentar eliminar el usuario: " . $stmt->error;
    }
    $stmt->close();
    $conexion->close();
    ?>
    <footer>
        <p>
            <a href='index.php'>Página de inicio</a>
        </p>
    </footer>
</body>

</html>