<?php
include("conexion.php");

$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];

$consulta_existencia = "SELECT * FROM usuarios WHERE usuario='$usuario'";
$resultado_existencia = mysqli_query($conexion, $consulta_existencia);

if (mysqli_num_rows($resultado_existencia) > 0) {
    echo "El usuario ya existe. <a href='registro.php'>Volver a intentar</a>";
} else {
    $contrasena_encriptada = password_hash($contrasena, PASSWORD_DEFAULT);
    $consulta_registro = "INSERT INTO usuarios (usuario, contrasena) VALUES ('$usuario', '$contrasena_encriptada')";
    $resultado_registro = mysqli_query($conexion, $consulta_registro);

    if ($resultado_registro) {
        echo "Registro exitoso. <a href='login.php'>Iniciar sesión</a>";
    } else {
        echo "Error al registrar. <a href='registro.php'>Volver a intentar</a>";
    }
}

mysqli_close($conexion);
?>
