<?php
// Datos de usuario para validar (en un caso real, estos datos se obtendrían de una base de datos)

require 'index.php';

$usuarios = array(
  'usuario1' => 'contraseña1',
  'usuario2' => 'contraseña2',
  // Puedes agregar más usuarios si lo deseas134217728 bytes exhausted (tried to allocate 12288 bytes
);

// Obtener los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $usuario = $_POST["usuario"];
  $pass = $_POST["password"];
  /*
  $user = comprobar_usuario($usuario, $pass);
  if(!$user){
     $error = true;
  }else{
  
     $_SESSION['usuario'] = $user;
     //Redirigimos a index.php
     header('Location: index.php');
  }*/


  foreach ($usuarios as $usuario => $password) {
    if ($nombre === $usuario && $pass === $password) {
      header('Location: welcome.php');
    
    } else {
      header('Location: index.php');
      
    }
  }

} else {
  header('Location: index.php');
  
}
