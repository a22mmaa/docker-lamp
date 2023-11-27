<?php
include("lib/base_datos.php");

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
    }

function novo_donante($nombre, $apellido, $edad, $grupo_sanguineo, $cp, $telefono) {

    try {
        $conPDO = conexion_bbdd();
        $stmt = $conPDO->prepare("INSERT INTO donantes (nombre, apellidos, edad, grupo_sanguineo, codigo_postal, telefono_movil) VALUES (:nombre, :apellidos, :edad, :grupo_sanguineo, :cp, :telefono)");
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':apellidos', $apellido);
        $stmt->bindParam(':edad', $edad);
        $stmt->bindParam(':grupo_sanguineo', $grupo_sanguineo);
        $stmt->bindParam(':cp', $cp);
        $stmt->bindParam(':telefono', $telefono);

        $stmt->execute();

        echo "Donante rexistrado";
    } catch (PDOException $e) {
        echo "Error al registrar el donante: " . $e->getMessage();
    }

}

?>