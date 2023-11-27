<?php

include("lib/base_datos.php");
$conPDO = conexion_bbdd();
$conPDO->exec("USE donacion");

$id_borrar = $_GET["id"];


$stmt = $conPDO->prepare("DELETE FROM MyGuests WHERE id=:id_borrar");
$stmt->bindParam(':id_borrar', $id_borrar);

$stmt->execute();

// use exec() because no results are returned






$conPDO = conexion_bbdd();
$conPDO->exec("USE donacion");