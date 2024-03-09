<?php

function test_input($datos)
{
    $datos = trim($datos);
    $datos = stripslashes($datos);
    $datos = htmlspecialchars($datos);
    return $datos;
}

// NOVIDAD€S 

function imprimir_mensajes($mensajes)
{

    $mensaje_impreso = "";

    if (count($mensajes) > 0) {
        foreach ($mensajes as $mensaje) {
            if ($mensaje[0] == "error") {
                $mensaje_impreso .= '<div class="alert alert-danger" role="alert">' . $mensaje[1] . '</div>';
            } elseif ($mensaje[0] == "exito") {
                $mensaje_impreso .= '<div class="alert alert-success" role="alert">' . $mensaje[1] . '</div>';
            }
        }
    }

    return $mensaje_impreso;
}

function validar_archivo($archivo)
{

    $targetDir = "uploads/";

    $targetFile = $targetDir . basename($archivo['name']);

    $fileExtension = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    $fileNombre = $archivo['name'];

    $fileTamanho = $archivo['size'];

    $fileTemporal = $archivo['tmp_name'];


    if (!file_exists($targetFile)) {
        if (compruebaExtension($fileExtension)) {
            if (comprobaTamanho($fileTamanho)) {
                return true;
            } else {
                $mensajes[] = array("error", "El fichero es demasiado grande");
            }
        } else {
            $mensajes[] = array("error", "Introduce un archivo en formato jpg, png o gif");
        }
    } else {
        $mensajes[] = array("error", "El fichero ya existe");
    }
    return $mensajes;
}


function validar_archivo_multiple($archivos, $index)
{

    $targetDir = "uploads/";

    $mensajes = array();

    $targetFile = $targetDir . basename($archivos['name'][$index]);

    $fileExtension = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    $fileNombre = $archivos['name'][$index];

    $fileTamanho = $archivos['size'][$index];

    $fileTemporal = $archivos['tmp_name'][$index];


    if (!file_exists($targetFile)) {
        if (compruebaExtension($fileExtension)) {
            if (comprobaTamanho($fileTamanho)) {
                return true;
            } else {
                $mensajes[] = array("error", "El fichero es demasiado grande");
            }
        } else {
            $mensajes[] = array("error", "Introduce un archivo en formato jpg, png o gif");
        }
    } else {
        $mensajes[] = array("error", "El fichero ya existe");
    }
    return $mensajes;
}

// DIFER€NZA
function validar_archivo_multiple_carpeta($archivos, $index)
{

    $mensajes = array();

    $targetDir = get_target_dir($archivos["name"][$index]);

    $targetFile = $targetDir . basename($archivos['name'][$index]);

    $fileExtension = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    $fileNombre = $archivos['name'][$index];

    $fileTamanho = $archivos['size'][$index];

    $fileTemporal = $archivos['tmp_name'][$index];


    // Quitamos a comprobación de extensión
    if (!file_exists($targetFile)) {
        
            if (comprobaTamanho($fileTamanho)) {
                return true;
            } else {
                $mensajes[] = array("error", "El fichero es demasiado grande");
            }
       
    } else {
        $mensajes[] = array("error", "El fichero ya existe");
    }
    return $mensajes;
}



function subir_archivo($archivo)
{

    $targetDir = "uploads/";

    $targetFile = $targetDir . basename($archivo["name"]);

    $resultado = move_uploaded_file($archivo['tmp_name'], $targetFile);

    return $resultado;
}

// DIFER€NZA
/*Uso $targetDir = "uploads/",
que inclúe esta ruta por defecto,
para variar da función anterior*/

function subir_archivo_multiple($archivos, $index, $targetDir = "uploads/")
{
    $targetFile = $targetDir . basename($archivos["name"][$index]);

    // Abrevio con respecto á anterior
    return $resultado = move_uploaded_file($archivos['tmp_name'][$index], $targetFile);
}

// DIFER€NZA
function subir_archivo_multiple_carpeta($archivos, $index)
{
    $targetDir = get_target_dir($archivos["name"][$index]);

    $targetFile = $targetDir . basename($archivos["name"][$index]);

    return $resultado = move_uploaded_file($archivos['tmp_name'][$index], $targetFile);
}


function compruebaExtension($extension)
{
    $extensiones_validas = array('jpg', 'png', 'jpeg', 'gif');

    foreach ($extensiones_validas as $ext) {
        if ($ext === $extension) {
            return true;
        }
    }
    return false;
}

function comprobaTamanho($tamanho)
{
    $tamanho_valido = 50000;
    if ($tamanho <= $tamanho_valido) {
        return true;
    }
    return false;
}


// UTILIDAD€S PARA A SUBIR POR CARPETA

function get_target_dir($name)
{
    $extension = file_extension($name);

    if (isImage($extension)) {
        return "uploads/img/";
    } elseif (isPdf($extension)) {
        return "uploads/pdf/";
    } else {
        return "uploads/other/";
    }
}

function file_extension($name)
{
    $n = strrpos($name, '.');
    return ($n === false) ? '' : substr($name, $n + 1);
}

function isImage($extension)
{
    switch ($extension) {
        case 'jpg':
        case 'png':
        case 'jpeg':
        case 'gif':
            return true;
            break;
        
        default:
            return false;
            break;
    }
}

function isPdf($extension)
{
    switch ($extension) {
        case 'pdf':
            return true;
            break;
        
        default:
            return false;
            break;
    }
}

// LOGIN E INICIO DE SESION

function login($nombre, $password)
{
    if (!isset($_SESSION)) {
        session_start();
    }

    $conexion = get_conexion();
    seleccionar_bd_tienda($conexion);

    $sql = "SELECT nombre, password FROM usuarios WHERE nombre='$nombre'";

    $resultados = $conexion->query($sql) or die($conexion->error);

    if ($resultados->num_rows) {
        while ($fila = $resultados->fetch_assoc()) {
            if (@password_verify($password, $fila['password'])) {
                $_SESSION['nombre'] = $fila['nombre'];
            }
        }
    }
    cerrar_conexion($conexion);
}



function is_logged()
{
    if (!isset($_SESSION)) {
        session_start();
    }

    if (isset($_SESSION['nombre'])) {
        return true;
    } else {
        return false;
    }
}

function get_logged_name()
{
    if (!isset($_SESSION)) {
        session_start();
    }

    if (isset($_SESSION['nombre'])) {
        return $_SESSION['nombre'];
    } else {
        return "Anónimo";
    }
}