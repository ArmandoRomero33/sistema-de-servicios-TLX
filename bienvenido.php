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
    <script src="bienvenido.js"></script>
    <link rel="stylesheet" href="styles/bienvenido.css">




</head>
<body>
    <h2>Bienvenido, <?php echo $_SESSION['usuario']; ?>! Te encuentras en el módulo de contratos.</h2>
    <p><a href="cerrar_sesion.php" class="logout-btn">Cerrar sesión</a></p>

    <form action="procesar_bienvenido.php" method="post" enctype="multipart/form-data">
        Nombre: <input type="text" name="nombre" required><br>
        Apellido Paterno: <input type="text" name="apellido1" require><br>
        Apellido Materno: <input type="text" name="apellido2" require><br>
      
        Calle: <input type="text" name="calle" required><br>
#Ext: <input type="text" name="num_ext" required><br>
#Int: <input type="text" name="num_int"><br>
Colonia: <input type="text" name="colonia" required><br>
Alcaldía/Municipio: <input type="text" name="alcaldia_municipio" required><br>
Estado: <input type="text" name="estado" required><br>
C.P: <input type="text" name="cp" required><br>
RFC: <input type="text" name="rfc" required><br>
Telefono: <input type="text" name="telefono" require><br>

Paquete: <input type="text" name="paquete"  required><br>
Tarifa: <input type="text" name="tarifa" required><br>

        
        <!-- Campo de carga de archivos para imágenes -->
        Imagen (JPG): <input type="file" name="imagen_jpg" id="imagen_jpg"><br>
        Imagen (PNG): <input type="file" name="imagen_png"><br>

        <!-- ... tu botón de submit u otros campos ... -->

        <input type="submit" value="Generar PDF">
    </form>

    <!-- Script para gestionar la firma -->
    <script src="bienvenido.js"></script>
</body>
</html>
