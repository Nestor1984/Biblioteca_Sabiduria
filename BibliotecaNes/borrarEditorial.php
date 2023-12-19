<?php
require_once("autoload.php");

if (isset($_GET['idEditorial'])) {
    $idEditorial = $_GET['idEditorial'];

    $objEdi = new Editoriales();
    $delete = $objEdi->delEditorial($idEditorial);

    if ($delete) {
        header("Location: sisEditoriales.php");
    } else {
        echo "Error al eliminar.";
        exit();
    }
}
?>