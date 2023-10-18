<?php
/*1. Escribe un programa que pase de grados Fahrenheit a Celsius. 
Para pasar de Fahrenheit a Celsius se resta 32 a la temperatura, 
se multiplica por 5 y se divide entre 9.*/

    function to_celsius($fahr) {
        $cels = ($fahr - 32)*5 / 9;
        return $cels;
    }
    // Probamos se funciona:
    $fahr = 90;
    echo to_celsius($fahr);

/*2. Crea un programa en PHP que declare e inicialice dos 
variables x e y con los valores 20 y 10 respectivamente y
muestre la suma, la resta, la multiplicación, 
la división y el módulo de ambas variables. */
/*(Optativo) Haz dos versiones de este ejercicios.
    - Guarda los resultados en nuevas variables.
    - Sin utilizar variables intermedias. */
    $x = 20;
    $y = 10;

    // VERSION 1
    $suma = $x + $y;
    $resta = $x - $y;
    $multiplicacion = $x * $y;
    $division = $x / $y;
    $modulo = $x % $y;

    echo "\nSuma: " . $suma . ". Resta: " . $resta . ". Multiplicación: " . $multiplicacion . ". División: " . $division . ". Módulo: " . $modulo . ".";

    // VERSION 2
    $x = 20;
    $y = 10;

    echo "\nSuma: " . ($x+$y) . ". Resta: " . ($x - $y) . ". Multiplicación: " . ($x * $y) . ". División: " . ($x / $y) . ". Módulo: " . ($x % $y) . ".";

/*3. (Optativo) Escribe un programa que imprima por pantalla los cuadrados de los 
30 primeros números naturales.*/ 

    for($i = 1; $i <= 30; $i++) {
        echo "\nRaíz de ".$i.": " . pow($i, 2);
    }

/*4. Hacer un programa php que calcule el área y el perímetro de un rectángulo
 (```área=base*altura``` y (```perímetro=2*base+2*altura```). Debéis declarar 
 las variables base=20 y altura=10. */

    function calcular_area($base, $altura) {
        $area = $base*$altura;
        return $area;
    }
    function calcular_perimetro($base, $altura) {
        $perimetro = $base*2+$altura*2;
        return $perimetro;
    }

    $base=20;
    $altura=10;

    echo "\nÁrea: ". calcular_area($base, $altura) . ". Perímetro: ". calcular_perimetro($base, $altura) . ".";





?>