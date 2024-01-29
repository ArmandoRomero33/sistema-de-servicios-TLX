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
    <script src="scripts/bienvenido.js"></script>
    <link rel="stylesheet" href="styles/bienvenido.css">
    <!-- Agrega el script de JavaScript para acceder a la cámara -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/signature_pad/1.5.3/signature_pad.min.js"></script>
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
        Imagen (JPG): <input type="file" name="imagen_jpg" id="imagen_jpg"><br>
        Imagen (PNG): <input type="file" name="imagen_png"><br>

        <!-- Área de firma -->
        <label>Firma:</label>
        <div>
            <canvas id="firmaCanvas" width="400" height="200" style="border:1px solid #000;"></canvas>
        </div>

        <!-- Botón para borrar la firma -->
        <button type="button" onclick="borrarFirma()">Borrar Firma</button>

        <!-- Campo oculto para almacenar los datos de la firma -->
        <input type="hidden" name="datos_firma" id="datos_firma">

        <!-- ... tu botón de submit u otros campos ... -->

        <input type="submit" value="Generar PDF">
    </form>

    <!-- Script para gestionar la firma -->
    <script src="bienvenido.js"></script>
</body>
</html>
