<?php

require 'ExcepcionPropia.php';

try {
    ExcepcionPropiaClase::testNumber(10);
} catch (ExcepcionPropia $e) {
    echo 'Excepción capturada: ' . $e->getMessage(), '<br/>';
}

try {
    ExcepcionPropiaClase::testNumber(-150);
} catch (ExcepcionPropia $e) {
    echo 'Excepción capturada: ' . $e->getMessage(), '<br/>';
}

try {
    ExcepcionPropiaClase::testNumber(0);
} catch (ExcepcionPropia $e) {
    echo 'Excepción capturada: ' . $e->getMessage(), '<br/>';
}

try {
    ExcepcionPropiaClase::testNumber(5.5);
} catch (ExcepcionPropia $e) {
    echo 'Excepción capturada: ' . $e->getMessage(), '<br/>';
}
