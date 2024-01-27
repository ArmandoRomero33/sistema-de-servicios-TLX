<?php
$host = "localhost";
$usuario_db = "root";  // Cambia esto con tu nombre de usuario de MySQL
$contrasena_db = "";  // Cambia esto con tu contraseña de MySQL
$base_datos = "contratos";

$conexion = mysqli_connect($host, $usuario_db, $contrasena_db, $base_datos);

if (!$conexion) {
    die("Error al conectar a la base de datos: " . mysqli_connect_error());
}
?>
