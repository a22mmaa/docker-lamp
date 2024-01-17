<?php

session_start();

if (!isset($_SESSION['contvisitas'])) {
    $_SESSION['contvisitas'] = 0;
} else {
    $_SESSION['contvisitas'] ++;
}
?>

<html>
    <body>
        <p>Esta páxina conta as túas visitas. Recargáchela <?php echo $_SESSION['contvisitas'] ?> veces.</p>
    </body>

</html>