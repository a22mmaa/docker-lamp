<?php 

/*
1. Crea una matriz con 30 posiciones y que contenga números aleatorios entre 0 y 20 (inclusive).
Uso de la función [rand](https://www.php.net/manual/es/function.rand.php). 
Imprima la matriz creada anteriormente.
*/ 
    echo "<h2>Tarefa 1</h2>";

    $numeros[29] = "";
    for ($i = 0; $i < 30; $i++) {
        $numeros[$i] = rand (0, 20);
    }

    echo "Matriz de números aleatorios:<br/><ol>";

    for ($j = 0; $j < 30; $j++) {
        echo "<li>".$numeros[$j]. "</li>";
    } 
    echo "</ol>";

/* 
2. (Optativo) Cree una matriz con los siguientes datos: 
`Batman`, `Superman`, `Krusty`, `Bob`, `Mel` y `Barney`.
    - Elimine la última posición de la matriz. 
    - Imprima la posición donde se encuentra la cadena 'Superman'. 
    - Agregue los siguientes elementos al final de la matriz: `Carl`, `Lenny`, `Burns` y `Lisa`. 
    - Ordene los elementos de la matriz e imprima la matriz ordenada. 
    - Agregue los siguientes elementos al comienzo de la matriz: `Apple`, `Melon`, `Watermelon`.
*/
    echo "<br>\n<h2>Tarefa 2</h2>\n";

    // Creamos
    $personaxes = ['Batman', 'Superman', 'Krusty', 'Bob', 'Mel', 'Barney'];

    //Eliminamos o último (sería máis facil usando `array_pop()`)
    $personaxes_ultimo = count($personaxes)-1;
    unset($personaxes[$personaxes_ultimo]);

    // Imprimimos a posición de superman
    $personaxes_lugarsuperman = array_search('Superman', $personaxes);
    echo $personaxes[$personaxes_lugarsuperman]."\n";

    // Agregamos novos elementos
    array_push($personaxes, "Carl", "Lenny", "Burns", "Lisa");

    // Ordenamos
    sort($personaxes);

    $personaxes_conta = count($personaxes)-1;

    for ($k = 0; $k <= $personaxes_conta; $k++) {
        echo $personaxes[$k].", ";
    } 
    echo "\n";

    // Agregamos ao inicio
    array_unshift ($personaxes, "Watermelon");
    array_unshift ($personaxes, "Melon");
    array_unshift ($personaxes, "Apple");
    
    // Comprobamos o resultado final
    $personaxes_conta = count($personaxes)-1;
    for ($l = 0; $l <= $personaxes_conta; $l++) {
        echo $personaxes[$l].", ";
    } 

/*3. (Optativo) Cree una copia de la matriz con el nombre `copia` con elementos del 3 al 5.
    - Agregue el elemento 'Pera' al final de la matriz. */ 
    echo "<br>\n<h2>Tarefa 3</h2>\n";
    $copia = array_slice($personaxes, 3, 3);

    array_push($copia, "Pera");

    // Comprobamos
    $copia_conta = count($copia)-1;
    for ($m = 0; $m <= $copia_conta; $m++) {
        echo $copia[$m].", ";
    }

?>