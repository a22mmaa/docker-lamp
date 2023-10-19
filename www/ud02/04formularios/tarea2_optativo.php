<html>
    <head>
        <meta charset="utf-8">
        <title>HTML</title> 
    </head>
    <body>
        <div>
            <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
                <div style="border: 1px solid black; padding: 1em; margin: 0.4em">
                    <p><em>Que bebida desexa?</em></p>
                    <select name="opcionbebida">
                        <option value="cocacola">Coca Cola (1€)</option>
                        <option value="pepsi">Pepsi Cola (0,80 €)</option>
                        <option value="fanta">Fanta Naranja (0,90 €)</option>
                        <option value="trina">Trina Manzana (1,10 €)</option>
                    </select>
                </div>
                <div style="border: 1px solid black; padding: 1em; margin: 0.4em">
                    <p><em>Cantas quere?</em></p>
                    <input type="number" name="number" value="1">
                </div>
                <div style="border: 1px solid black; padding: 1em; margin: 0.4em">
                    <input type="submit" value="Solicitar">
                </div>
            </form>
        </div>


<?php 
/*
Crea un formulario para solicitar una de las siguientes bebidas:

    Bebida|PVP
    :-|:-:
    Coca Cola|1 €
    Pepsi Cola|0,80 €
    Fanta Naranja|0,90 €
    Trina Manzana|1,10 €
    
    A mayores, necesitamos un campo adicional con la cantidad de bebidas a comprar y un botón de <kbd>Solicitar</kbd>.
    
    La aplicación mostrará algo como:

    Pediste 3 botellas de Coca Cola. Precio total a pagar: 3 Euros.
    Puedes utilizar sentencias `switch` o `if`.
    */

    //Aquí va el código PHP que muestra la información solicitada.


    $numero = $_POST['number'];
    $opcion = $_POST['opcionbebida'];
    $botellas = "botella";
    $prezo_total = 0;

    switch ($numero) {
        case 1: $botellas = "botella"; break;
        default: $botellas = "botellas"; break;
    }

    switch ($opcion) {
        case "cocacola": $prezo_total = 1*$numero;break;
        case "pepsi": $prezo_total = 0.8*$numero;break;
        case "fanta": $prezo_total = 0.9*$numero;break;
        case "trina": $prezo_total = 1.1*$numero;break;
    }


    echo "Pediste ".$numero." ".$botellas." de ".ucfirst($opcion).". Precio total a pagar: ". $prezo_total ." euros.";


?>
    </body>
</html>
