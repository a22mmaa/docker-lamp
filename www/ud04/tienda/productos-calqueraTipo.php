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
    <form action="productos-calqueraTipo.php" method="post" enctype="multipart/form-data">
      Nombre: <input type="text" name="name">
      <br><br>
      Descripción: <input type="text" name="descripcion">
      <br><br>
      Precio: <input type="number" step="0.01" name="precio"> 
      <br><br>
      Unidades: <input type="number" step="0.01" name="unidades">  
      <br><br>
      Foto 1:
      <input type="file" name="fileToUpload" id="fileToUpload">
      <input type="submit" name="submit" value="Submit">
    </form>
    
    
    <?php

        $target_dir;
        $uploadOk = 1;

        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_FILES['fileToUpload'])) {

                $nome_file = $_FILES['fileToUpload']['name'];
                $extension_file = strtolower(pathinfo($nome_file,PATHINFO_EXTENSION));

                switch($extension_file) {
                    case "jpg":
                    case "jpeg":
                    case "png":
                    case "gif":
                        $target_dir = "uploads/img/";
                        break;
                    case "pdf":
                        $target_dir = "uploads/pdf/";
                        break;
                    case "txt":
                    case "md":
                        $target_dir = "uploads/txt/";
                        break;
                    default: 
                        $target_dir = "uploads/otros/";
                        break;
                    }

                $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
                $tamanho_file = $_FILES["fileToUpload"]["size"];

                if (!file_exists($target_file)) {
                    if (comprobaTamanho($tamanho_file) === true) {
                        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                            echo "El fichero ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). "ha sido subido.";
                        } else {
                            echo "Hubo un error subiendo el fichero";
                        }
                    } else { 
                        echo "El archivo es demasiado grande.";
                    }
                } else { 
                    echo "El fichero ya existe";
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