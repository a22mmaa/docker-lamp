<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>Calculadora</title>
    <style>
    label
    {
        width: 4em;
        float: left;
        text-align: right;
        margin-right: 0.5em;
        display: block;
    }
    
    .submit input
    {
        margin-left: 4.5em;
    }
    input
    {
        color: #781351;
        background: #fee3ad;
        border: 1px solid #781351;
        width: 40px;
    }
    
    input.submit
    {
        color: #000;
        background: #ffa20f;
        border: 2px outset #d7b9c9;
        width: 90px;
    }
    fieldset
    {
        border: 1px solid #781351;
        width: 20em
    }
    
    legend
    {
        color: #fff;
        background: #ffa20c;
        border: 1px solid #781351;
        padding: 2px 6px;
    }
    </style>
</head>
<body>
    <form name="formulario" method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
        <fieldset>
        <legend>Calculadora</legend>
            <p><label for="campo1">Núm 1:</label><input name="campo1" value="" /></p>
            <p><label for="campo2">Núm 2:</label><input name="campo2" value="" /></p>
            <p><label for="campo3">Núm 3:</label><input name="campo3" value="" /></p>
            <p><label for="campo4">Núm 4:</label><input name="campo4" value="" /></p>
            <input type="submit" class="submit" name="enviar" value="Calcular" />
        </fieldset>
    </form>
    <?php
    /* Crear un programa para mostrar los siguientes resultados en PHP:

    Números recibidos por método POST: num1, num2, num3, num4,
    Suma total de los números: xxx
    Multiplicación de lo números: xxx
    Division entre el primer y tercer número: xxx
    Resto entre num1 y num2: xxx
    ¿El primer número es mayor que el tercero? Si o No.

    Validación obligatoria para cada campo $_POST recibido:

        isset
        not empty
        is_numeric

    */

    $num1 = $_POST['campo1'];
    $num2 = $_POST['campo2'];
    $num3 = $_POST['campo3'];
    $num4 = $_POST['campo4'];
    
    if (isset($num1)) {
        if (empty($num1) == false) {
            if (is_numeric($num1)) {
                $n1=$num1;
            } else {throw new Exception("Erro");}
        } else {throw new Exception("Erro");}
    } else {throw new Exception("Erro");}

    if (isset($num2)) {
        if (empty($num2) == false) {
            if (is_numeric($num2)) {
                $n2=$num2;
            } else {throw new Exception("Erro");}
        } else {throw new Exception("Erro");}
    } else {throw new Exception("Erro");}

    if (isset($num3)) {
        if (empty($num3) == false) {
            if (is_numeric($num3)) {
                $n3=$num3;
            } else {throw new Exception("Erro");}
        } else {throw new Exception("Erro");}
    } else {throw new Exception("Erro");}

    if (isset($num4)) {
        if (empty($num4) == false) {
            if (is_numeric($num4)) {
                $n4=$num4;
            } else {throw new Exception("Erro");}
        } else {throw new Exception("Erro");}
    } else {throw new Exception("Erro");}

    

    echo "<p>Números recibidos por método POST: ".$n1.", ".$n2.", ".$n3." e ".$n4.".</p>";
    echo "Suma total de los números: ".$n1+$n2+$n3+$n4.".</p>";
    echo "Multiplicación de lo números: ".$n1*$n2*$n3*$n4.".</p>";
    echo "Division entre el primer y tercer número: ".$n1/$n3.".</p>";
    echo "Resto entre num1 y num2: ".$n1%$n2.".</p>";
    echo "¿El primer número es mayor que el tercero?: ";
    if ($n1>$n3) {
        echo "Si";
    } else {echo "No";}
    echo ".</p>";

    ?>
</body>
</html>