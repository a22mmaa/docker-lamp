<?php

require_once('ExcepcionPropia.php');
class ExcepcionPropiaClase {
     public static function testNumber($numero) {
        if($numero===0) {
            throw new ExcepcionPropia("Núermo = 0");
        }
    }
}