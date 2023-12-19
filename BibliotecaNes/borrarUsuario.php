<?php
require_once("autoload.php");

if (isset($_GET['idUsuarios'])) {
    $usuarioId = $_GET['idUsuarios'];

    $objUsu = new Usuarios();
    $delete = $objUsu->delUsuario($usuarioId);

    if ($delete) {
        header("Location: sisUsuarios.php");
    } else {
        echo "Error al eliminar usuario.";
        exit();
    }
}
?>
