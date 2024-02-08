<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
    <link rel="stylesheet" href="styles/index.css">
</head>
<body>
    <form action="procesar_login.php" method="post">
        <h2>🌐 ¡Bienvenido a la Conexión del Futuro!</h2>
        Usuario: <input type="text" name="usuario" required><br>
        Contraseña: <input type="password" name="contrasena" required><br>
        <input type="submit" value="Iniciar sesión">
    </form>
</body>
</html>
