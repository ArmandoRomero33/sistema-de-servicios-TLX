<?php
// Verifica si la extensión GD está habilitada
if (extension_loaded('gd')) {
    echo 'GD está habilitado en este servidor.';
} else {
    echo 'GD no está habilitado en este servidor.';
}
?>
