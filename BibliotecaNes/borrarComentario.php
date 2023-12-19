<?php
require_once("autoload.php");

if (isset($_GET['idComentarioValoracion'])) {
    $comentarioId = $_GET['idComentarioValoracion'];

    $objComen = new Comentarios();
    $delete = $objComen->delComentario($comentarioId);

    if ($delete) {
        header("Location: sisComentarios.php");
    } else {
        echo "Error al eliminar.";
        exit();
    }
}
?>