<?php 

// 1. Crea una función que reciba un carácter e imprima se o carácter é un díxito entre 0 e 9.
    function comproba_integer($tarea1_1) {
        echo is_integer($tarea1_1);
    }
    // Probamos
    echo "\n";
    comproba_integer(1);
    comproba_integer('Exercicio 1');

// 2. Crea una función que reciba un string e devolva a súa lonxitude.
    function comprobar_lonxitude($tarea1_2) {
        return strlen($tarea1_2);
    }

    // Probamos
    comprobar_lonxitude("Exercicio 02");

// 3. Crea una función que reciba dous número `a` e `b` e devolva o número `a` elevado a `b`.
    function elevar_numero($a, $b) {
        return pow ($a, $b);
    }

    // Probamos
    elevar_numero(2, 3);

// 4. Crea una función que reciba un carácter e devolva `true` se o carácter é unha vogal.
    function comprobar_vogal($tarea1_4_caracter) {

        $tarea1_4_caracter_minus = strtolower($tarea1_4_caracter);
        $vogais = array('a', 'e', 'i', 'o', 'u');

        if (in_array($tarea1_4_caracter_minus, $vogais)) {
            return true;
        }
    }
    // Probamos
    echo "\nExercicio 4\n";
    if (comprobar_vogal("E") == true) {
        echo "Funciona";
    }

// 5. Crea una función que reciba un número e devolva se o número é par ou impar.
    function comprobar_par($t5_numero) {
        if ($t5_numero%2 == 0) {
            return "par";
        } else {
            return "impar";
        }
    }
    // Probamos
    echo "\nExercicio 5\n";
    if (comprobar_par(5) == "impar") {
        echo "Funciona";
    }

// 6. Crea una función que reciba un string e devolva o string en maiúsculas.
    function a_maiusculas($t6_string) {
        return strtoupper($t6_string);
    }
    // Probamos
    echo "\nExercicio 6\n";
    echo a_maiusculas("Probando");

// 7. Crea una función que imprima a zona horaria (*timezone*) por defecto utilizada en PHP.
    function zona_horaria() {
        echo date_default_timezone_get();
    }
    // Probamos
    echo "\nExercicio 7\n";
    echo zona_horaria();

/* 8. Crea una función que imprima a hora á que sae e se pon o sol para a 
localización por defecto. Debes comprobar como axustar as coordenadas (latitude 
e lonxitude) predeterminadas do teu servidor.
*/
    echo "\nExercicio 8\n";
    // Non encontro "como axustar as coordenadas (latitude e lonxitude) predeterminadas do teu servidor", polo que me limito a modificar as coordenadas por defecto da función `date_sun_info`.
    $sol = date_sun_info(time(), 42.633333, -8.55);
    foreach ($sol as $chave => $valor) {
        if ($chave == 'sunrise') {
            echo "Saída do sol: ". date("H:i:s", $valor) . "\n";
        }
        if ($chave == 'sunset') {
            echo "Posta do sol: ". date("H:i:s", $valor) . "\n";
        }
    }
    
?>