<?php
require_once("autoload.php");

// Verificar si se proporcionó un ID de formato válido
if (isset($_GET['idFormatos'])) {
    $formatoId = $_GET['idFormatos'];

    $objForm = new Formatos();
    $delete = $objForm->delFormato($formatoId);

    if ($delete) {
        header("Location: index.php");
    } else {
        echo "Error al eliminar formato.";
        exit();
    }
}
?>
