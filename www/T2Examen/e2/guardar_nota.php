<?php

$nomeNotas;
$directorio_notas = "notas/";
// Verificar si se han enviado los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener el nombre y el contenido de la nota desde el formulario
    $nombre = $_POST['nombre'] ?? '';
    $contenido = $_POST['contenido'] ?? '';

    // engade o nome nun array
    $nomeNotas[] = $nombre;

    //Guardar la nota en un archivo
    $nomeCompleto = "./notas/" . $nombre . ".txt";
    if (file_exists($nomeCompleto)) {
        echo "<p>O arquivo xa existe, cambia o nome.</p>";
    } else {
        $mifichero = fopen($nomeCompleto, "w") or die ("Erro! Non podemos abrir o arquivo");
        fwrite($mifichero, $contenido);
        echo "La nota se ha guardado correctamente en el archivo: $directorio_notas$nombre.txt";
        fclose($mifichero);
    }


} else {
    // Si no se han enviado los datos del formulario, redirigir al formulario
    header('Location: formulario.html');
    exit();
}

