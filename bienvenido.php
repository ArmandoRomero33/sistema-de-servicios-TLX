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

<form action="procesar_bienvenido.php" method="post">
        Nombre: <input type="text" name="nombre" required><br>
        Correo electrónico: <input type="email" name="correo" required><br>
        numero:<input type="numero" name="numero" require><br>
        casa:<input type="casa" name="casa" require><br>
        <!-- Agrega más campos según tu plantilla de PDF -->
        <input type="submit" value="Generar PDF">
    </form>

    <h2>Bienvenido, <?php echo $_SESSION['usuario']; ?>!</h2>
    <p><a href="cerrar_sesion.php">Cerrar sesión</a></p>
</body>
</html>
