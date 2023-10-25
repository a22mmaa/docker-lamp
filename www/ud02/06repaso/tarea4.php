<?php
/* Crea unha estrutura de datos para almacenar a seguinte información:
    Identificador 	Nome 	Prezo
    cocacola 	Coca Cola 	2.1
    pepsicola 	Pepsi Cola 	2
    fantanaranja 	Fanta Naranja 	2.5
    trinamanzana 	Trina Manzana 	2.3
    
    Coa estrutura de datos creada anteriormente, xerar un select dinámico que dea como resultado o seguinte:
    
    <select name="opcion">
        <option value="cocacola">Coca Cola (2.1 €)</option>
        <option value="pepsicola">Pepsi Cola (2 €)</option>
        <option value="fantanaranja">Fanta Naranja (2.5 €)</option>
        <option value="trinamanzana">Trina Manzana (2.3 €)</option>
    </select>
*/  

    $bebidas = array (
        "cocacola" => array(
            "Nome" => "Coca Cola",
            "Prezo" => 2.1
        ),
        "pepsicola" => array(
            "Nome" => "Pepsi Cola",
            "Prezo" => 2
        ),
        "fantanaranja" => array(
            "Nome" => "Fanta Naranja",
            "Prezo" => 2.5
        ),
        "trinamanzana" => array(
            "Nome" => "Trina Naranja",
            "Prezo" => 2.3
        )
        );

        echo "<html>";
        echo "<select name='opcion'>";
        foreach ($bebidas as $key => $value) {
            echo "<option value='".$key."'>".$value["Nome"]." (".$value["Prezo"]." €)</option>";
        }
        echo "</select>";
        echo "</html>";


?>