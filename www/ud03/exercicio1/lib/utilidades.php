<?php

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function crear_tabla_usuario($conexion)
{
    if ($conexion->connect_error) {
        die("Erro de conexión: " . $conexion->connect_error);
    }

    $sql = "CREATE TABLE IF NOT EXISTS usuarios(
        id INT(6) AUTO_INCREMENT PRIMARY KEY,
        nombre VARCHAR(50),
        apellidos VARCHAR(100),
        edad INT,
        provincia VARCHAR(50)
        )";
    if ($conexion->query($sql)) {
        echo "Tabla creada correctamente";
    } else {
        echo "Error creando la tabla" . $conexion->error;
    }
}


function consulta_preparada($conexion, $nome, $apelido, $idade, $provincia)
{
    if ($conexion->connect_error) {
        die("Erro de conexión: " . $conexion->connect_error);
    }

    $stmt = $conexion->prepare("INSERT INTO usuarios (nombre, apellidos, edad, provincia)
        VALUE (?,?,?,?)");

    if (!$stmt) {
        die("Erro na preparación da consulta: " . $conexion->error);
    }

    $stmt->bind_param("ssis", $nombre, $apellido, $edad, $provincia_es);

    $nombre = $nome;
    $apellido = $apelido;
    $edad = $idade;
    $provincia_es = $provincia;

    $stmt->execute();


    $stmt->close();
}


function consultar_usuarios($conexion, $id_editar)
{
    if ($conexion->connect_error) {
        die("Erro de conexión: " . $conexion->connect_error);
    }
    $sql = "SELECT id, nombre, apellidos, edad, provincia FROM usuarios WHERE id=$id_editar";

    $resultados = $conexion->query($sql);

    if ($resultados->num_rows > 0) {
        echo "<table>";
        echo "<tr style='border: 1px solid black'><th>Nome</th><th>Apelidos</th><th>Idade</th><th>Provincia</th></tr>";
        while ($row = $resultados->fetch_assoc()) {
            echo "<tr style='border: 1px solid black'>";
            echo "<td>" . $row["nombre"] . "</td>";
            echo "<td>" . $row["apellidos"] . "</td>";
            echo "<td>" . $row["edad"] . "</td>";
            echo "<td>" . $row["provincia"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    }
}


function editar($conexion, $nome, $apelido, $idade, $provincia, $id)
{
    if ($conexion->connect_error) {
        die("Erro de conexión: " . $conexion->connect_error);
    }

    $stmt = $conexion->prepare("UPDATE usuarios SET nombre = ?, apellidos = ?, edad = ?, provincia = ? WHERE id = ?");

    if (!$stmt) {
        die("Erro na preparación da consulta: " . $conexion->error);
    }

    $stmt->bind_param("ssisi", $nombre, $apellido, $edad, $provincia_es, $id);

    $nombre = $nome;
    $apellido = $apelido;
    $edad = $idade;
    $provincia_es = $provincia;
    $id = $id;

    if ($stmt->execute()) {
        echo "Actualizado correctamente";
    } else {
        echo "Error actualizando : " . $stmt->error;
    }
    $stmt->close();
}
