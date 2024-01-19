<?php

function compruebaExtension($extension_file) {

    // Creamos un array coas extensións permitidas
    $extensions_permitidas = ['png', 'jpg', 'jpeg', 'gif'];

    // Procuramos se o valor recibido por parámetro se encontra dentro de array
    if (in_array($extension_file, $extensions_permitidas)) {
        return true;
    } else {
        return false;
    }
}

function comprobaTamanho($tamanho_file) {
    
    if ($tamanho_file > 500000) {
        return false;
    } else {
        return true;
    }
}

function comprobar_usuario($conexion, $usuario, $pass) {

    // Preparamos e securizamos a consulta do contrasinal
    $sql = $conexion->prepare("SELECT password FROM usuarios WHERE nombre = ?");
    $sql->bind_param("s", $usuario);
    $resultado = $sql->execute();

    // Se a consulta vai mal, xa salta un erro
    if (!$resultado) { 
        die($sql->error);
    }

    // Vinculamos o resultado
    $sql->bind_result($resultado);

    // Para obter os resultados usamos fetch(), igual que facíamos noutros exercicios para imprimir resultados en táboas
    if ($sql->fetch()) {
        // Se sql (que tiña o contrasinal) encontra un equivalente, comparanse e devolvese o usuario
        if (password_verify($pass, $resultado)) {
            return $usuario;
        }
    } else {
        // Se non encontra nada, devolve false
        return false;
    }
}