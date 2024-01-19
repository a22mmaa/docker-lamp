<?php
session_start();

    // Facemos os preparativos para conectarnos coa base de datos
    require "lib/base_datos.php";
    require "lib/utilidades.php";
    require "lib/funciones.php";

    $conexion = get_conexion();
    seleccionar_bd_tienda($conexion);

    
    //Primeiro comprobamos se recibimos os datos
    if($_SERVER["REQUEST_METHOD"]=="POST"){

        $usuario = test_input($_POST["usuario"]);
        $pass = test_input($_POST["pass"]);

        // Igualamos $user ao resultado da consulta
        $user = comprobar_usuario($conexion, $usuario, $pass);

        if(!$user){
            $error = true;
            echo "Erro no inicio de sesión. Proba de novo.";
        }else{
        
            $_SESSION['usuario'] = $user;
            //Redireción a index.php
            header('Location: index.php');
        }
    }

    cerrar_conexion($conexion);

?>
<html>
    <body>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <p>Usuario: <input name="usuario" id="usuario" type="text"></p>
        <p>Contraseña:<input name="pass" id="pass" type="password"></p>
        <p><input type="submit" value="Iniciar sesión"></p>
        </form>
    </body>
</html>