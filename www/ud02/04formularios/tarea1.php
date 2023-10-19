<?php 
    /**  Cree un formulario que solicite su nombre y apellido. Cuando se reciben los datos, se debe mostrar la siguiente información:
     * Nombre: `xxxxxxxxx`
     *  Apellidos: `xxxxxxxxx`
     * Nombre y apellidos: `xxxxxxxxxxxx xxxxxxxxxxxx`
     * Su nombre tiene caracteres `X`.
     * Los 3 primeros caracteres de tu nombre son: `xxx`
     * La letra A fue encontrada en sus apellidos en la posición: `X`
     * Tu nombre en mayúsculas es: `XXXXXXXXX`
     * Sus apellidos en minúsculas son: `xxxxxx`
     * Su nombre y apellido en mayúsculas: `XXXXXX XXXXXXXXXX`
     * Tu nombre escrito al revés es: `xxxxxx`
    */
    
    //Aquí el código php que muestra la información solicitada.

    

    echo "Nombre: " . $_GET["nome"];

    echo "\n<br/>Apelidos: " . $_GET["apelidos"];

    echo "\n<br/>Nome e apelidos: " . $_GET["nome"] . " " . $_GET["apelidos"];

    echo "\n<br/>Su nombre tiene ". strlen($_GET["nome"]) . " caracteres.";

    echo "\n<br/>Los 3 primeros caracteres de tu nombre son: ".substr($_GET["nome"], 0, 3);

    echo "\n<br/>La letra A fue encontrada en sus apellidos en la posición: ".stripos($_GET["apelidos"], 'a')+1; //Sumo 1 porque normalmente non se comeza a contar desde 0

    echo "\n<br/>Tu nombre en mayúsculas es: ".strtoupper($_GET["nome"]);

    echo "\n<br/>Sus apellidos en minúsculas son: ".strtolower($_GET["apelidos"]);

    echo "\n<br/>Su nombre y apellido en mayúsculas: ".strtoupper($_GET["nome"])." ".strtoupper($_GET["apelidos"]);

    echo "\n<br/>Tu nombre escrito al revés es: ".strrev($_GET["nome"]);


?>

