<?php

function test_input($datos)
{
    $datos = trim($datos);
    $datos = stripslashes($datos);
    $datos = htmlspecialchars($datos);
    return $datos;
}

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

function subir_archivo($archivo)
{

    $targetDir = "uploads/";

    $targetFile = $targetDir . basename($archivo["name"]);

    $resultado = move_uploaded_file($archivo['tmp_name'], $targetFile);

    return $resultado;
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
