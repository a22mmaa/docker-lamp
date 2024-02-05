<?php

function get_conexion()
{
    $conexion = new mysqli('db', 'root', 'test');
  
    if ($conexion->connect_errno != null) {
        die("Fallo en la conexión: " . $conexion->connect_error . "Con numero" . $conexion->connect_errno);
    }
    
    return $conexion;
}

function seleccionar_bd_tienda($conexion)
{
    return $conexion->select_db("tienda");
}

function ejecutar_consulta($conexion, $sql)
{
    $resultado = $conexion->query($sql);

    if ($resultado == false) {
        die($conexion->error);
    }

    return $resultado;
}

function crear_bd_tienda($conexion)
{
    $sql = "CREATE DATABASE IF NOT EXISTS tienda";
    ejecutar_consulta($conexion, $sql);
}

function crear_tabla_usuarios($conexion)
{

    $sql = "CREATE TABLE IF NOT EXISTS usuarios(
        id INT(6) AUTO_INCREMENT PRIMARY KEY , 
        nombre VARCHAR(50) NOT NULL , 
        pass VARCHAR(100) NOT NULL , 
        apellidos VARCHAR(100) NOT NULL ,
        edad INT (3) NOT NULL ,
        provincia VARCHAR(50) NOT NULL)";

    ejecutar_consulta($conexion, $sql);
}

function crear_tabla_productos($conexion)
{

    $sql = "CREATE TABLE IF NOT EXISTS productos (
      id INT(6) AUTO_INCREMENT PRIMARY KEY,
      nombre VARCHAR(50) NOT NULL,
      descipcion VARCHAR(100) NOT NULL,
      precio FLOAT(8) NOT NULL,
      unidades FLOAT(8) NOT NULL,
      foto LONGBLOB 
    )";

    ejecutar_consulta($conexion, $sql);
}

function listar_usuarios($conexion)
{
    $sql = "SELECT id, nombre, apellidos,edad, provincia
            FROM usuarios";

    $resultado = ejecutar_consulta($conexion, $sql);
    return $resultado;
}
 
function get_usuario($conexion, $id)
{
    $sql = "SELECT id, nombre, apellidos,edad, provincia
            FROM usuarios
            WHERE id=$id";

    $resultado = ejecutar_consulta($conexion, $sql);
    return $resultado;
}

function editar_usuario($conexion, $id, $nombre, $apellidos, $edad, $provincia)
{
    $sql = "UPDATE usuarios
            SET nombre='$nombre' ,apellidos='$apellidos' ,edad='$edad',provincia='$provincia'
            WHERE id=$id;";

    $resultado = ejecutar_consulta($conexion, $sql);
    return $resultado;
}


function dar_alta_usuario($conexion, $nombre, $apellidos, $password, $edad, $provincia)
{
    $hasheado = password_hash($password, PASSWORD_DEFAULT);
    $sql = $conexion->prepare("INSERT INTO usuarios (nombre,apellidos,pass,edad,provincia) VALUES (?,?,?,?,?)");
    $sql->bind_param("sssss", $nombre, $apellidos, $hasheado, $edad, $provincia);
    return $sql->execute() or die($conexion->error);
}

function dar_alta_producto($conexion, $nombre, $descripcion, $precio, $unidades, $foto)
{
    $sql = $conexion->prepare("INSERT INTO productos (nombre,descipcion,precio,unidades, foto) VALUES (?,?,?,?,?)") or die($conexion->error);
    $sql->bind_param("ssiis", $nombre, $descripcion, $precio, $unidades, $foto) or die($conexion->error);
    return $sql->execute() or die($conexion->error);
}

function borrar_usuario($conexion, $id)
{
    $sql = "DELETE FROM usuarios
            WHERE id=$id";

    $resultado = ejecutar_consulta($conexion, $sql);
    return $resultado;
}

function cerrar_conexion($conexion)
{
    $conexion->close();
}

function subir_fichero_producto_bbdd($nombre, $descripcion, $unidades, $precio, $nombre_archivo, $targetDir = "uploads/")
{
    $conexion = get_conexion();
    seleccionar_bd_tienda($conexion);
    $targetFile = $targetDir . basename($nombre_archivo);
    $imgContenido = addslashes(file_get_contents($targetFile));
    if (dar_alta_producto($conexion, $nombre, $descripcion, $unidades, $precio, $imgContenido)) {
        $mensaje = array("success", "Producto dado de alta correctamente");
    } else {
        $mensaje = array("error", "Producto no dado de alta correctamente");
    }
    cerrar_conexion($conexion);
    return $mensaje;
}

function login($nombre, $password)
{
    if (!isset($_SESSION)) {
        session_start();
    }

    $conexion = get_conexion();
    seleccionar_bd_tienda($conexion);

    $sql = "SELECT nombre, pass FROM usuarios WHERE nombre='$nombre'";

    $resultados = $conexion->query($sql) or die($conexion->error);

    if ($resultados->num_rows) {
        while ($fila = $resultados->fetch_assoc()) {
            if (@password_verify($password, $fila['pass'])) {
                $_SESSION['nombre'] = $fila['nombre'];
            }
        }
    }
    cerrar_conexion($conexion);
}


