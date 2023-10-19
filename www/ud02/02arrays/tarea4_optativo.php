<table>
    <tr>
        <th>Ciudad</th>
        <th>País</th>
        <th>Continente</th>
    </tr>
<?php
/*
En un *string*, tenemos almacenados varios datos agrupados en ciudad, país y continente.
El formato es `ciudad,pais,continente` y cada grupo *ciudad-pais-continente* se separa co un `;`.

$informacion = "Tokyo,Japan,Asia;Mexico City,Mexico,North America;New York City,USA,North America;Mumbai,India,Asia;Seoul,Korea,Asia;Shanghai,China,Asia;Lagos,Nigeria,Africa;Buenos Aires,Argentina,South America;Cairo,Egypt,Africa;London,UK,Europe";

Crea una aplicación PHP que imprima toda la información almacenada en el *string* en una tabla con 3 columnas.
Con la información anterior, realiza las seguintes tareas:
1. Crea la estrutura de datos y almacena toda la información anterior.
2. Utilizando a instrución `foreach` y listas HTML,  imprime toda la información almacenada en formato de tabla.
*/
    $informacion = "Tokyo,Japan,Asia;Mexico City,Mexico,North America;New York City,USA,North America;Mumbai,India,Asia;Seoul,Korea,Asia;Shanghai,China,Asia;Lagos,Nigeria,Africa;Buenos Aires,Argentina,South America;Cairo,Egypt,Africa;London,UK,Europe";

    $datos_agrupados = explode (";", $informacion);
    
    $datos_agrupados_conta = count($datos_agrupados)-1;
    for ($m = 0; $m <= $datos_agrupados_conta; $m++) {
        echo $datos_agrupados[$m]."\n";
    }

    foreach ($datos_agrupados as $d) {
        $datos = explode(",", $d);
        $datos_asociados[$datos[0]] = array(
            "Ciudad" => $datos[0],
            "País" => $datos[1],
            "Continente" => $datos[2]
        );
    }

    foreach ($datos_asociados as $da => $da_valor) {
        echo "<tr>";
        echo "<td>" . $da_valor['Ciudad'] . "</td>";
        echo "<td>" . $da_valor['País'] . "</td>";
        echo "<td>" . $da_valor['Continente'] . "</td>";
        echo "</tr>";
    }

?>
</table>