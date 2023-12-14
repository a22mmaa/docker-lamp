<?php
include("e1.php");

$arrayCualquiera = [4, 7, 4.5, "hola"];

isPar($arrayCualquiera);

foreach (isPar($arrayCualquiera) as $valor) {
    if ($valor === true) {
        echo "true";
    } elseif ($valor === false) {
        echo "false";
    }
}

echo "\n";


isImpar($arrayCualquiera);
foreach (isImpar($arrayCualquiera) as $valor) {
    if ($valor === true) {
        echo "true";
    } elseif ($valor === false) {
        echo "false";
    }
}