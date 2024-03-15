
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
</head>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    if (empty($_POST["username"]) || empty($_POST["password"])) {
        echo "Error: Faltan datos.";
    } else {
        $nombre = $_POST["name"];
        $apellidos = $_POST["apellidos"];
    }
}

?>
<body>
    <h2>Iniciar sesión</h2>
    <form method="post" action="login.php">
        <label for="username">Nombre de usuario:</label><br>
        <input type="text" id="username" name="username" required><br>
        <label for="password">Contraseña:</label><br>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit" value="Iniciar sesión">
    </form>
</body>
</html>