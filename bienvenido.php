<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido, <?php echo $_SESSION['usuario']; ?>!</title>
    <link rel="stylesheet" href="styles/bienvenido.css">
</head>
<body>
    <h2>Bienvenido, <?php echo $_SESSION['usuario']; ?>! Te encuentras en el módulo de contratos.</h2>
    <p><a href="cerrar_sesion.php" class="logout-btn">Cerrar sesión</a></p>

    <form action="procesar_bienvenido.php" method="post" enctype="multipart/form-data">
        Nombre: <input type="text" name="nombre" required><br>
        Correo electrónico: <input type="email" name="correo" required><br>
        Número: <input type="number" name="numero" required><br>
        Casa: <input type="text" name="casa" required><br>
        
        <!-- Campo de carga de archivos para imágenes -->
        Imagen (JPG): <input type="file" name="imagen_jpg"><br>
        Imagen (PNG): <input type="file" name="imagen_png"><br>

        <!-- Agrega más campos según tu plantilla de PDF -->
        <input type="submit" value="Generar PDF">
    </form>
</body>
</html>
