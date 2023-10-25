<?php

echo "\nExercicio 1\n";
/* ¿Cuál es el resultado de las siguientes expresiones?. Comprueba el resultado.
        70 * 10 – 5 % 3 * 4 + “9”
        (( 5 + 3) / 2 * 3) / 2 - (int) 28.75 / 4 + 29 % 3 * 4
        $r =’C’ – (double) 5 / 2 + 3.5 + 0.4 (Nota ‘C’ é o ascii: 67)
*/
    
    // A expresión `70 * 10 – 5 % 3 * 4 + “9”` ten algún erro de formato, quizá por mala codificación en Windows. Hai que cambiar a liña por `-` e, en principio, tamén as aspas de 9. Podemos comprobar que en PHP, a pesar de que estamos a escribir 9 con aspas, o que aparantemente sería un String, o número é interpretado como un enteiro e forma parte do resultado. O resultado é 701.
    echo 70 * 10 - 5 % 3 * 4 + "9" ."\n";
    echo 70 * 10 - 5 % 3 * 4 + 9 . "\n";

    // Resultado: 7
    echo (( 5 + 3) / 2 * 3) / 2 - (int) 28.75 / 4 + 29 % 3 * 4 . "\n";

    // Resultado: 68.4
    $r = ord('C') - (double) 5 / 2 + 3.5 + 0.4 . "\n";
    echo $r;
    

echo "\nExercicio 2\n";
/*  Indica cuál sería la salida del siguiente programa:
    - $m = 99;
    - $n = ++$m;
    - echo “m = $m, n = $n\n”;
    - $n = $m++;
    - echo “m = $m, n = $n\n”;
    - printf(“m = %d \n”, $m++); // printf é unha func. de C para imprimir que se pode empregar en PHP.
    - printf(“m = %d \n”,++$m);
*/
    
    // Resultado: n = 100 e m = 103. Comprobamos:
    $m = 99;
    $n = ++$m;
    echo "m = $m, n = $n\n";
    $n = $m++;
    echo "m = $m, n = $n\n";
    printf("m = %d \n", $m++);
    printf("m = %d \n",++$m);



echo "\nExercicio 3\n";
/*  Indica cuál sería la salida del siguiente programa:
    $n = 5;
    $t = ++$n * --$n;
    echo "n = $n, t = $t\n";
    printf("%d %d %d", ++$n, ++$n, ++$n);
*/
    
    // Resultado: n=5, t=30 e logo 6, 7 e 8. Comprobamos:
    $n = 5;
    $t = ++$n * --$n;
    echo "n = $n, t = $t\n";
    printf("%d %d %d", ++$n, ++$n, ++$n);


echo "\nExercicio 4\n";
/*     Escribe un programa que calcule el factorial de un número. */
     
    function calcular_factorial($n) {
        $factorial=1;
        for ($i = 1; $i <= $n; $i++) {
            $factorial *= $i;
        }
        echo $factorial;
    }
    calcular_factorial(5);


echo "\nExercicio 5\n";
/*     Escribir una página web que dados unos segundos (recogidos en un formulario)
 exprese su equivalente en semanas, días, horas, minutos y segundos.
 */
    // Ver tarea1-5a.php e tarea1-5b.php


 echo "\nExercicio 6\n"; 
/*     El domingo de pascua es el primer domingo después de la primera luna llena
    posterior al equinoccio de primavera y se determina mediante el siguiente
    cálculo sencillo:

A = anho mod 19 B = anho mod 4 C = anho mod 7 D = (19 * A + 24) mod 30 E = (2 * B + 4 * C + 6 * D + 5) mod 7 N = (22 + D + E)

Donde N indica el número de día del mes de marzo (si N es igual o menor que 31) o abril (si es mayor que 31). Contruir un programa que determina las fechas de domingos de pascua dado el año. Nota: Emplea únicamente las variables anho, d y n.
*/
    $anho = readline("O ano para o que se desexa calcular é: ");

    $a = $anho % 19;
    $b = $anho % 4;
    $c = $anho % 7;
    $d = (19 * $a + 24) % 30;
    $e = (2 * $b + 4 * $c + 6 * $d + 5) % 7;
    $n = (22 + $d + $e);

    if ($n <= 31) {
        $dia = $n;
        $mes = "marzo";
    } else {
        $dia = $n - 31;
        $mes = "abril";
    }

    echo "Para o ano ".$anho.", o domingo de Pascua será o día ".$dia." de ".$mes.".";

?>