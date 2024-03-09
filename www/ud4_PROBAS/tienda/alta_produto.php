<?php

  require "lib/base_datos.php";
  require "lib/utilidades.php";

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tienda IES San Clemente </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <h1>Alta de produto </h1>

<?php

$mensajes = array();
$nombreProducto = "";
$descripcion = "";
$precio = "";
$unidades = "";
$archivo = "";
$archivo_tmp = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {

        if(!empty($_POST["nombreProducto"]) && is_string($_POST["nombreProducto"])) {
            $nombreProducto = test_input($_POST["nombreProducto"]);
        } else {
            // Array multidimensional
            $mensajes[] = array("error", "nombre producto mal");
        }

        if(!empty($_POST["descripcion"]) && is_string($_POST["descripcion"])) {
            $descripcion = test_input($_POST["descripcion"]);
        } else {
            $mensajes[] = array("error", "desc mal");
        }

        if(!empty($_POST["precio"]) && is_numeric($_POST["precio"])) {
            $descripcion = test_input($_POST["precio"]);
        } else {
            $mensajes[] = array("error", "precio mal");
        }

        if(!empty($_POST["unidades"]) && is_numeric($_POST["unidades"])) {
            $descripcion = test_input($_POST["unidades"]);
        } else {
            $mensajes[] = array("error", "unidades mal");
        }

        if(!empty($_POST['arquivo']['name'])) {
            $archivo = $_FILES['archivo'];
            $archivo_tmp = $_FILES['archivo']['tmp_name'];
        } else {
            $mensajes[] = array("error", "arquivo mal");
        }  

        if(empty($mensajes)) {
            // Validamos o arquivo
            $archivo_validado =  validar_archivo($archivo);

            //Si se validó...
            if($archivo_validado) {

                // Probamos a subir
                if (subir_archivo($archivo)) {

                    // Registramos en la BD
                    $mensajes[] = subir_fichero_producto_bbdd($nombreProducto, $descripcion, $unidades, $precio, $archivo['name'], "uploads/");
            } else {
                $mensajes[] = array("error", "Error al guardar el archivo");
            }

                
            }
        }



    
}
?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>

<?= imprimir_mensajes($mensajes);?>

    <p>Formulario de alta</p>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    nombreProducto: <input type="text" name="nombreProducto">
      <br><br>
      descripcion: <input type="text" name="descripcion">
      <br><br>
      precio: <input type="text" name="precio">
      <br><br>
      unidades: <input type="text" name="unidades">
      <br><br>
      archivo: <input type="file" name="archivo" id="archivo">
      <br><br>
      <input type="submit" name="submit" value="Submit">
    </form>
    
    <footer>
        <p>
            <a href='index.php'>Página de inicio</a>
        </p>
    </footer>
</body>

</html>