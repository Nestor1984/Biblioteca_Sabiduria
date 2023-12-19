<?php
require_once("autoload.php");

if (isset($_GET['idAutor'])) {
    $autorId = $_GET['idAutor'];

    $objAut = new Autores();
    $delete = $objAut->delAutor($autorId);

    if ($delete) {
        header("Location: sisAutores.php");
    } else {
        echo "Error al eliminar.";
        exit();
    }
}
?>