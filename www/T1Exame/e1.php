<?php

function isPar($arrayProba) {
    $arrayPares = [];
    for ($i = 0; $i <= count($arrayProba)-1; $i++) {
        if(is_int($arrayProba[$i]) === true) {
            if($arrayProba[$i]%2 === 0) {
                $arrayPares[$i] = true;
            } else {
                $arrayPares[$i] = false;
            }
        } else {
            $arrayPares[$i] = false;
        }
    }
    return $arrayPares;
}

function isImpar($arrayProba) {
    $arrayImpares = [];
    for ($i = 0; $i <= count($arrayProba)-1; $i++) {
        if(is_int($arrayProba[$i]) === true) {
            if($arrayProba[$i]%2 !== 0) {
                $arrayImpares[$i] = true;
            } else {
                $arrayImpares[$i] = false;
            }
        } else {
            $arrayImpares[$i] = false;
        }
    }
    return $arrayImpares;
}