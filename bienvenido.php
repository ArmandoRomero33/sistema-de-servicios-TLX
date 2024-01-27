<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Bienvenido</title>
</head>
<body>
    <h2>Bienvenido, <?php echo $_SESSION['usuario']; ?>!</h2>
    <p><a href="cerrar_sesion.php">Cerrar sesión</a></p>
</body>
</html>
