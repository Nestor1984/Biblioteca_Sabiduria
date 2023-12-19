<?php
require_once("autoload.php");

if (isset($_GET['idDevolucion'])) {
    $idDevolucion = $_GET['idDevolucion'];

    $objDevo = new Devoluciones();
    $delete = $objDevo->delDevolucion($idDevolucion);

    if ($delete) {
        header("Location: sisDevoluciones.php");
    } else {
        echo "Error al eliminar.";
        exit();
    }
}
?>