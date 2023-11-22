<?php

/*
0. Determinar una temática para la tienda. Cada uno elegirá la temática que desee.
*/

// A nosa tenda vai ser de videoxogos.

/*
1. Crear una base de datos que se llame tienda. Sólo una vez, en el caso de que ya esté creada no volver a crearla
*/

// Creamos a conexión con MySQLi Orientado a obxectos

$conexion = new mysqli('db', 'root', 'test', 'dbname');

// Comprobamos a conexión

$erro = $conexion->connect_errno;
if ($erro != null) {
  die("Produciuse un erro na conexión: ".$conexion->connect_error". Código de erro: ".$erro);
}
echo "Conexión correcta."

// Creamos a base de datos

$sql = "CREATE DATABASE IF NOT EXISTS tenda";

if($conexion->query($sql)) {
  echo "Base de datos 'tenda' creada correctamente";
} else {
  "Erro na creación na base de datos. ".$conexion->error;
}

/*
2. Crea una nueva tabla llamada usuarios. Sólo una vez, en el caso de que ya esté creada no volver a crearla. Los datos que almacenaremos en dicha tabla son (...).
En ambos casos de deben crear si no existen. [IF NOT EXISTS].
*/

// Creamos a táboa

$sql = "CREATE TABLE IF NOT EXISTS usuarios(
  id INT(6) AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(50),
  apellidos VARCHAR(100),
  edad INT,
  provincia VARCHAR(50)
  )";

/*
3. Completar las opciones del menú que se encuentra en index.php.
*/


// Imprimimos formulario

echo "
  <form method='post' action='<?php echo localhost($_SERVER['PHP_SELF']); ?>'>
    <p>Nome: <input type="text" name="nome" /></p>
    <p>Apelido: <input type="text" name="apelido" /></p>
    <p>Idade: <input type="number" name="idade" /></p>
    <p>Provincia: <input type="text" name="provincia" /></p>
    <p><input type="submit" /></p>
  </form>
"

// Definimos variábeis e verificamos 

$nome = $apelido = $idade = $provincia = "";

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nome = test_input($_POST["nome"]);
  $apelido = test_input($_POST["apelido"]);
  $idade = test_input($_POST["idade"]);
  $provincia = test_input($_POST["provincia"]);
}

// Inserción "normal" de rexistros:
/*
$sql = "INSERT INTO usuarios (nombre, apellidos, edad, provincia)
VALUES ($nome, $apelido, $idade, $provincia);"
*/

// Inserción de rexistros con consultas preparadas:

$stmt = $conexion->prepare("INSERT INTO usuarios (nombre, apellidos, edad, provincia)
VALUE (?,?,?,?)");
$stmt->bind_param("ssis", $nome, $apelido, $idade, $email);

$stmt->execute();

if($conexion->query($sql)){
  echo "Novo rexistro creado";
 }else{
     echo "Non se puido crear o rexistro".$conexion->error;
 } 

/*
3.1. Registro de usuarios.
- Crea un formulario para el registro de usuarios. Deberá contener los datos nombre, apellido, edad y provincia.
- Valida los datos en PHP antes de guardarlos en la base de datos. Ver el apartado “Formularios” de la UD02.
- Guarda los datos en la tabla de base de datos.-
Optativo. Usa consultas preparadas. 
*/

echo "
<table>
 <th><td>Usuario</td></th>
"

for 


echo "
</table>
"



/*
3.2. Lista de usuarios.
- Se deberá generar una tabla con todos los usuarios, mostrando en cada fila un usuario.
- Para cada usuario, se mostrarán las opciones Editar y Eliminar. 
*/



/*
3.3. Modificaciones de usuario.
- Se podrán actualizar todos los datos de los usuarios desde el botón Editar. 
*/


/*
3.4. Eliminar usuarios.
- Si se selecciona la opción de “Eliminar” el usuario deberá ser borrado de la base de datos.
*/



/*
4. En todas las páginas debe existir un “footer” con un botón que nos permita volver a la página principal index.php, que es la que contiene el menú.
*/



/*
5. Optativo. Uso de librerías que nos permita la reutilización de código.
*/




/*
6. Optativo. Maquetar la página web para que quede más visual. Podéis hacer uso de los componentes de bootstrap.
*/



?>
