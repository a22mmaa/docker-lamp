<?php

function imprimirTabla($array) {
    echo '<table>';
    echo '<tr><th>Coche</th><th>Stock</th><th>Ventas</th></tr>';
    foreach($array as $value){
        echo '<tr>';
        if (strlen($value[0]) > 4 && $value[2] > 4) {
            foreach($value as $value2) {
                echo '<td>' . $value2 . '</td>';
            }
        } 
        echo '</tr>';
    }
    echo '</table>';
}