<?php 

/*
Necesitamos almacenar la siguiente información en un array multidimensional:

- **John**
    - email: `john@demo.com`
    - website: `www.john.com`
    - age: `22`
    - password: `pass`
- **Anna**
    - email: `anna@demo.com`
    - website: `www.anna.com`
    - age: `24`
    - password: `pass`
- **Peter**
    - email: `peter@mail.com`
    - website: `www.peter.com`
    - age: `42`
    - password: `pass`
- **Max**
    - email: `max@mail.com`
    - website: `www.max.com`
    - age: `33`
    - password: `pass`

Almacena e imprime la información. 
*/
    $usuarios = array(
        array("John", "john@demo.com", "www.john.com", "22", "pass"),
        array("Anna", "anna@demo.com", "www.anna.com", "24", "pass"),
        array("Peter", "peter@mail.com", "www.peter.com", "42", "pass"),
        array("Max", "max@mail.com", "www.max.com", "33", "pass")
    );


    // Probamos:
    $usuarios_ultimo = count($usuarios)-1;

    echo "USUARIOS:<br/ >";

    for ($row = 0; $row < 4; $row++) {
        echo "<strong>Usuario " . $row . "</strong>. ";
        for ($col = 0; $col < 5; $col++) {
            switch($col) {
                case 0: echo "Nome: "; break;
                case 1: echo "Email: "; break;
                case 2: echo "Website: "; break;
                case 3: echo "Idade: "; break;
                case 4: echo "Password: "; break;
            }
            echo $usuarios[$row][$col];    
            switch($col) {
                default: echo ", "; break;
                case 4: echo "."; break;
            }
        }
        switch($row) {
            default: echo "<br/>"; break;
            case $usuarios_ultimo: echo ""; break;
        }
    }

?>