<?php

require_once('ExcepcionPropiaClase.php');

try {
    ExcepcionPropiaClase::testNumber(5);
    echo "Número valido";
} catch (ExcepcionPropia $e) {
    echo "Erro".$e->getMessage();
}

try {
    ExcepcionPropiaClase::testNumber(0);
    echo "Número válido";
} catch (ExcepcionPropia $e) {
    echo "Erro".$e->getMessage();
}