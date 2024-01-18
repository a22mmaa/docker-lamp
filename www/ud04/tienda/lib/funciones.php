<?php

function compruebaExtension($extension_file) {
    $extensions_permitidas = ['png', 'jpg', 'jpeg', 'gif'];

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