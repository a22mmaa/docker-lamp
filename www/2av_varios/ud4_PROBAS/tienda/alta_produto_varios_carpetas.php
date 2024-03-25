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
    <!-- DIFER€NZA -->
    <h1>Alta de varios arquivos por carpeta</h1>

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

        // DIFER€NZA
        if (!empty($_FILES['archivos'])) {
            $archivos = $_FILES['archivos'];
        } else {
            $mensajes[] = array("error", "Adjunta un archivo");
        }

        // DIFER€NZAS
        if (empty($mensajes)) {
            for ($i = 0; $i < count($archivos['name']); $i++) {
                $archivo_validado = validar_archivo_multiple_carpeta($archivos, $i);
                if ($archivo_validado) {
                    if (subir_archivo_multiple_carpeta($archivos, $i)) {
                        if ($i == 0) {
                            $mensajes[] = subir_fichero_producto_bbdd($nombreProducto, $descripcion, $unidades, $precio, $archivos['name'][0], get_target_dir($archivos['name'][0]));
                            // DIFER€NZA
                        }
                    } else {
                        $mensajes[] = array("error", "Error al guardar el archivo $i");
                    }
                } else {
                    $mensajes = array_merge($mensajes, $validar_fichero);
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
    <form method="post" action="<?= test_input($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
        <label for="nombreProducto">Nombre del producto:  </label>
        <input type="text" name="nombreProducto" value="<?= $nombreProducto;?>">
        <br><br>
        <label for="descripcion">Descripción: </label>
        <input type="text" name="descripcion" value="<?= $descripcion;?>">
        <br><br>
        <label for="precio">Precio: </label>
        <input type="text" name="precio" value="<?= $precio;?>">
        <br><br>
        <label for="unidades">Unidades: </label>
        <input type="text" name="unidades" value="<?= $unidades;?>">
        <br><br>
        <label for="archivo">Subir foto: </label>
        <!-- DIFER€NZA: Array de arquivos -->
        <input type="file" name="archivos[]" id="archivo" multiple>
        <br><br>
        <input type="submit" name="submit" value="Enviar"> 
      </form>
    
    <footer>
        <p>
            <a href='index.php'>Página de inicio</a>
        </p>
    </footer>
</body>

</html>