<?php
require_once("autoload.php");

if (isset($_POST['submit'])) {
    $idLibro = $_POST["idLibro"];
    $idEditorial = $_POST["idEditorial"];

    $objLibEdi = new LibrosEditoriales();
    $insert = $objLibEdi->insertLibrosEditoriales($idLibro, $idEditorial);

    if ($insert) {
        header("Location: sisLibrosEditoriales.php");
    } else {
        echo "Error al insertar.";
        exit();
    }
}
?>
