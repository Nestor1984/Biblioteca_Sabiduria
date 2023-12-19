<?php
require_once("autoload.php");

if (isset($_GET['idLibro'])) {
    $idLibro = $_GET['idLibro'];

    $objLibrEdi = new LibrosEditoriales();
    $delete = $objLibrEdi->delLibroEditorial($idLibro);

    if ($delete) {
        header("Location: sisLibrosEditoriales.php");
    } else {
        echo "Error al eliminar.";
        exit();
    }
}
?>