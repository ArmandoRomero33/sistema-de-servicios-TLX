<?php
session_start();
include("conexion.php");

$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];

$consulta = "SELECT * FROM usuarios WHERE usuario='$usuario'";
$resultado = mysqli_query($conexion, $consulta);

if (mysqli_num_rows($resultado) > 0) {
    $fila = mysqli_fetch_assoc($resultado);
    if (password_verify($contrasena, $fila['contrasena'])) {
        $_SESSION['usuario'] = $usuario;
        header("Location: bienvenido.php");
        exit();
    } else {
        echo "Usuario o contraseña incorrectos. <a href='login.php'>Volver a intentar</a>";
    }
} else {
    echo "Usuario o contraseña incorrectos. <a href='login.php'>Volver a intentar</a>";
}

mysqli_close($conexion);
?>
