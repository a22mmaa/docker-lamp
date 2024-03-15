<?php
session_start();
// Datos de usuario para validar (en un caso real, estos datos se obtendrían de una base de datos)
$usuarios = array(
    'usuario1' => 'contraseña1',
    'usuario2' => 'contraseña2',
    // Puedes agregar más usuarios si lo deseas
);




function comporbar_usuario($nombre, $pass){
    if($nombre == "usuario1" && $pass="contraseña1"){
       $usuario['nombre']="usuario1";
       return $usuario;
    }elseif($nombre == "usuario2" && $pass="contraseña2"){
      $usuario['nombre']="usuario2";
      return $usuario;
    }else return false;
  
  }

// Obtener los datos del formulario
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $usuario = $_POST["usuario"];
    $pass = $_POST["password"];
    $user = comporbar_usuario($usuario, $pass );
    if(!$user){
       $error = true;
    }else{
    
       $_SESSION['usuario'] = $user;
       //Redirigimos a index.php
       header('Location: index.php');
    }
   }

// Validar las credenciales
if (isset($usuarios[$username]) && $usuarios[$username] === $password) {
    // Iniciar sesión
   
    header('Location: welcome.php');
    exit();
} else {
    // Credenciales inválidas, redirigir al formulario de inicio de sesión
    header('Location: index.php');
    exit();
}
