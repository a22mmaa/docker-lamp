<?php 

//1. Almacena en un array los 10 primeros números pares. Imprímelos cada uno en una línea utilizando los valores contenidos en el array.
    
    $numeros_pares = array();
    $numero_par = 2;

    for ($i=0; $i<10; $i++) {
        $numeros_pares[] = $numero_par;
        $numero_par += 2;
        echo $numeros_pares[$i] . "\n";
    }

    

/* 2. Imprime los valores del array asociativo siguiente usando un foreach:*/
    $v[1]=90;
    $v[10] = 200;
    $v['hola']=43;
    $v[9]='e';

    echo "\nArray exercicio 2\n";
    foreach ($v as $p) {
        echo $p, "\n";
    }

?>

