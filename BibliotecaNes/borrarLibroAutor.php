<?php
require_once("autoload.php");

if (isset($_GET['idLibro'])) {
    $idLibro = $_GET['idLibro'];

    $objLibrAut = new LibrosAutores();
    $delete = $objLibrAut->delLibroAutor($idLibro);

    if ($delete) {
        header("Location: sisLibrosAutores.php");
    } else {
        echo "Error al eliminar.";
        exit();
    }
}
?>