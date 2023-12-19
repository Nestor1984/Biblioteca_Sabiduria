<?php
require_once("autoload.php");

if (isset($_GET['idBibliotecario'])) {
    $bibliotecarioId = $_GET['idBibliotecario'];

    $objBibli = new Bibliotecarios();
    $delete = $objBibli->delBibliotecario($bibliotecarioId);

    if ($delete) {
        header("Location: sisBibliotecarios.php");
    } else {
        echo "Error al eliminar.";
        exit();
    }
}
?>
