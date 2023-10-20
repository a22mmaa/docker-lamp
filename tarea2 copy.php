<?php 
/**
 * Crea unha función chamada `comprobar_nif()` que reciba un NIF e devolva:
 *  `true` se o NIF é correcto.
 *  false` se o NIF non é correcto.
 * A letra do DNI é unha letra para comprobar que o número introducido anteriormente é correcto. 
 * Para obter a letra do DNI débense levar a cabo os seguintes pasos:
 * Dividimos o número entre 23.
 * Co resto da división anterior, obtemos a letra corresponde na seguinte táboa: 
 */
    function comprobar_nif($nif) {
        $nif_numeros=substr($nif,0,8);
        if (preg_match("([0-9]{8}[A-z]{1})", strtoupper($nif))) {
            switch ($nif_numeros%23) {
                case 0:
                    if (preg_match("([0-9]{8}T)", strtoupper($nif))) {
                        return true;
                    } else {return false;}
                case 1: 
                    if (preg_match("([0-9]{8}R)", strtoupper($nif))) {
                        return true;
                    } else {return false;}
                case 2: 
                    if (preg_match("([0-9]{8}W)", strtoupper($nif))) {
                        return true;
                    } else {return false;}
                case 3: 
                    if (preg_match("([0-9]{8}A)", strtoupper($nif))) {
                        return true;
                    } else {return false;}
                case 4: 
                    if (preg_match("([0-9]{8}G)", strtoupper($nif))) {
                        return true;
                    } else {return false;}
                case 5: 
                    if (preg_match("([0-9]{8}M)", strtoupper($nif))) {
                        return true;
                    } else {return false;}
                case 6: 
                    if (preg_match("([0-9]{8}Y)", strtoupper($nif))) {
                        return true;
                    } else {return false;}
                case 7: 
                    if (preg_match("([0-9]{8}F)", strtoupper($nif))) {
                        return true;
                    } else {return false;}
                case 8: 
                    if (preg_match("([0-9]{8}P)", strtoupper($nif))) {
                        return true;
                    } else {return false;}
                case 9: 
                    if (preg_match("([0-9]{8}D)", strtoupper($nif))) {
                        return true;
                    } else {return false;}
                case 10: 
                    if (preg_match("([0-9]{8}X)", strtoupper($nif))) {
                        return true;
                    } else {return false;}
                case 11: 
                    if (preg_match("([0-9]{8}B)", strtoupper($nif))) {
                        return true;
                    } else {return false;}
                case 12: 
                    if (preg_match("([0-9]{8}N)", strtoupper($nif))) {
                        return true;
                    } else {return false;}
                case 13: 
                    if (preg_match("([0-9]{8}J)", strtoupper($nif))) {
                        return true;
                    } else {return false;}
                case 14: 
                    if (preg_match("([0-9]{8}Z)", strtoupper($nif))) {
                        return true;
                    } else {return false;}
                case 15: 
                    if (preg_match("([0-9]{8}S)", strtoupper($nif))) {
                        return true;
                    } else {return false;}
                case 16: 
                    if (preg_match("([0-9]{8}Q)", strtoupper($nif))) {
                        return true;
                    } else {return false;}
                case 17: 
                    if (preg_match("([0-9]{8}V)", strtoupper($nif))) {
                        return true;
                    } else {return false;}
                case 18: 
                    if (preg_match("([0-9]{8}H)", strtoupper($nif))) {
                        return true;
                    } else {return false;}
                case 19: 
                    if (preg_match("([0-9]{8}L)", strtoupper($nif))) {
                        return true;
                    } else {return false;}
                case 20: 
                    if (preg_match("([0-9]{8}C)", strtoupper($nif))) {
                        return true;
                    } else {return false;}
                case 21: 
                    if (preg_match("([0-9]{8}K)", strtoupper($nif))) {
                        return true;
                    } else {return false;}
                case 22: 
                    if (preg_match("([0-9]{8}E)", strtoupper($nif))) {
                        return true;
                    } else {return false;}
            }
        } else {
            return false;
        }
    }

    // Probamos
    $nif = "12345678z";

    if (comprobar_nif($nif) == true) {
        echo "O DNI ".$nif." é correcto.\n";
    } else {
        echo "O DNI ".$nif." é incorrecto.\n";
    }

    $nif = "12345678x";
    
    if (comprobar_nif($nif) == true) {
        echo "O DNI ".$nif." é correcto.\n";
    } else {
        echo "O DNI ".$nif." é incorrecto.\n";
    }

?>