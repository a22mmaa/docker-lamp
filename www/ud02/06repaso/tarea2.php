<?php
/* Escribir un programa que lea la entrada de la hora de un día en notación 14 horas y
nuestre la respuesta en notación de 12 horas. Por ejemplo, si introducimos 18:05
debe proporcionar como salida 06:05 PM. */

    $numero_introducido = readline("Introducir a hora en formato 24h: ");
    if (preg_match("([0-9]{1,2}:[0-9]{2})", $numero_introducido)) {
        if (preg_match("([0-9]:[0-9]{2})", $numero_introducido)) {
            $hora_introducida=(substr($numero_introducido,0,1));
            $hora_24 = (int)("0".$hora_introducida);
        } else {
            $hora_24 = (int)(substr($numero_introducido,0,2));
        }
        $minutos_24 = substr($numero_introducido,-2,2);
        if ($hora_24 >= 00 && $hora_24 <= 23) {
            if ($minutos_24 >= 00 && $minutos_24 <= 59) {
                if ($hora_24 >= 13) {
                    $hora_12 = $hora_24 - 12;
                    echo "A hora en formato 12h é ".$hora_12.":".$minutos_24." PM.";
                } else {
                    echo "A hora en formato 12h é ".$hora_24.":".$minutos_24." AM.";
                }
            } else {echo "Minutos incorrectos.";}
        } else {echo "Hora incorrecta.";}
    } else {echo "Formato de hora incorrecto.";}


?>