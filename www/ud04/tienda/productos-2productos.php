<?php

  require "lib/base_datos.php";
  require "lib/utilidades.php";
  require "lib/funciones.php";

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
    <h1>Productos</h1>

<?php

$mensajes = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    if (empty($_POST["name"]) || empty($_POST["descripcion"])) {
        $mensajes =  "Falta algún dato obligatorio del formulario </br>";
    } else {
        $nombre = test_input($_POST["name"]);
        $descripcion = test_input($_POST["descripcion"]);
        $precio = test_input($_POST["precio"]);
        $unidades = test_input($_POST["unidades"]);
        $fileToUpload = $_FILES["fileToUpload"]["name"];

        $conexion = get_conexion();
        seleccionar_bd_tienda($conexion);
        crear_producto($conexion, $nombre, $descripcion, $precio, $unidades, $fileToUpload);
        $mensajes = "Producto creado correctamente";
        cerrar_conexion($conexion);
    }
}
?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>

    <?= $mensajes;?>

    <p>Formulario para subir produtos</p>
    <form action="productos-2productos.php" method="post" enctype="multipart/form-data">
      Nombre: <input type="text" name="name">
      <br><br>
      Descripción: <input type="text" name="descripcion">
      <br><br>
      Precio: <input type="number" step="0.01" name="precio"> 
      <br><br>
      Unidades: <input type="number" step="0.01" name="unidades">  
      <br><br>
      Foto 1:
      <input type="file" name="fileToUpload1" id="fileToUpload1">
      Foto 2:
      <input type="file" name="fileToUpload2" id="fileToUpload2">
      <br><br>
      <input type="submit" name="submit" value="Submit">
    </form>
    
    
    <?php
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_FILES['fileToUpload1']) || isset($_FILES['fileToUpload2'])) {

                $target_dir = "uploads/";
                $uploadOk = 1;

                if (isset($_FILES['fileToUpload1'])) {

                    $target_file1 = $target_dir . basename($_FILES["fileToUpload1"]["name"]);
                    $extension_file1 = strtolower(pathinfo($target_file1,PATHINFO_EXTENSION));
                    $tamanho_file1 = $_FILES["fileToUpload1"]["size"];
                    $temporal_file1 = $_FILES["fileToUpload1"]["tmp_name"];

                    if (!file_exists($target_file1)) {

                        
                        if (comprobaTamanho($tamanho_file1) === true) {
                            if(compruebaExtension($extension_file1)) {
                                if (move_uploaded_file($temporal_file1, $target_file1)) {
                                    echo "El fichero ". htmlspecialchars( basename( $_FILES["fileToUpload1"]["name"])). "ha sido subido."; 
                                } else {
                                        echo "Hubo un error subiendo el primer fichero";
                                }
                            } else{
                                    echo "Solo los ficheros JPG, JPEG, PNG & GIF están permitidos.";
                            }
                        } else { 
                            echo "El primer archivo es demasiado grande.";
                        }
                    } else { 
                        echo "El primer fichero ya existe";
                    } 
                    
                    echo "<br>";
                } else {
                    echo "";
                    $temporal_file1 = "";
                }

                if (isset($_FILES['fileToUpload2'])) {

                    $target_file2 = $target_dir . basename($_FILES["fileToUpload2"]["name"]);
                    $extension_file2 = strtolower(pathinfo($target_file2,PATHINFO_EXTENSION));
                    $tamanho_file2 = $_FILES["fileToUpload2"]["size"];
                    $temporal_file2 = $_FILES["fileToUpload2"]["tmp_name"];
                    
                    if (!file_exists($target_file2)) {
                        if (comprobaTamanho($tamanho_file2) === true) {
                            if(compruebaExtension($extension_file2)) {
                                if (move_uploaded_file($temporal_file2, $target_file2)) {
                                    echo "El fichero ". htmlspecialchars( basename( $_FILES["fileToUpload2"]["name"])). "ha sido subido."; 
                                } else {
                                        echo "Hubo un error subiendo el segundo fichero";
                                }
                            } else{
                                    echo "Solo los ficheros JPG, JPEG, PNG & GIF están permitidos.";
                            }
                        } else { 
                            echo "El segundo archivo es demasiado grande.";
                        }
                    } else { 
                        echo "El segundo fichero ya existe";
                    } 
                } else {
                    echo "";
                    $temporal_file2 = "";
            }
        }
    }
    
    ?>

    <footer>
        <p>
            <a href='index.php'>Página de inicio</a>
        </p>
    </footer>
</body>

</html>