<?php

function crear_tabla_usuario($conexion) {
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
    if($conexion->query($sql)){
        echo "Tabla creada correctamente";
    }else{
        echo "Error creando la tabla".$conexion->error;
    }
}


function consulta_preparada($conexion, $nome, $apelido, $idade, $provincia) {
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


function consultar_usuarios($conexion) {
    if ($conexion->connect_error) {
        die("Erro de conexión: " . $conexion->connect_error);
    }

    $sql = "SELECT nombre, apellidos, edad, provincia FROM usuarios";
    $resultados = $conexion->query($sql);
    if($resultados->num_rows > 0){
          while($row = $resultados->fetch_assoc()){
              echo $row["nombre"]." - ". $row["apellidos"].$row["edad"].$row["provincia"];
        }
      } else {
          echo "No hay resultados";
      }

}
?>