<?php
$cookie_name = "idioma";

if(!isset($_GET["idioma"])) {
    $cookie_value = 'galego';
}  else {
    $cookie_value = $_GET["idioma"];
}

setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");

?>

<html>
    <body>
    <?php

if(!isset($_COOKIE[$cookie_name])) {
    echo "Escolle un idioma e recarga";

} else {
    switch($_COOKIE[$cookie_name]) {
        case 'galego':
            echo "Benvid@ á miña páxina!";
            break;
        case 'castellano':
            echo "Bienvenid@ a mi página!";
            break;
        case 'ingles':
            echo "Welcome to my page!";
            break;
        default:
            echo "👋";
            break;
    }
}

?>
            <form action="2_idioma.php" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
                
                <label for="idioma">
                    <?php 
                    switch($_COOKIE[$cookie_name]) {
                        case 'galego':
                            echo "Escolle un idioma";
                            break;
                        case 'castellano':
                            echo "Escoge un idioma";
                            break;
                        case 'ingles':
                            echo "Select a language";
                            break;
                        default:
                            echo "Escolle un idioma";
                            break;
                    }
                    ?>
                </label>
                <select id="idioma" name="idioma">
                    <option value="blank"></option>
                    <option value="galego">Galego</option>
                    <option value="castellano">Castellano</option>
                    <option value="ingles">English</option>
                </select>
                <p><input type="submit" title="Enviar" value="<?php 
                    switch($_COOKIE[$cookie_name]) {
                        case 'ingles':
                            echo "Submit";
                            break;
                        default:
                            echo "Enviar";
                            break;
                    }
                    ?>"> + 
                    <button onClick="window.location.reload();"><?php 
                    switch($_COOKIE[$cookie_name]) {
                        case 'ingles':
                            echo "Refresh";
                            break;
                        default:
                            echo "Recargar";
                            break;
                    }
                    ?></button>
                    </p>
            </form> 
        
    </body>
</html>