<?php

/*
0. Determinar una temática para la tienda. Cada uno elegirá la temática que desee.
*/

// A nosa tenda vai ser de videoxogos.

/*
1. Crear una base de datos que se llame tienda. Sólo una vez, en el caso de que ya esté creada no volver a crearla
*/



// Creamos a base de datos



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
