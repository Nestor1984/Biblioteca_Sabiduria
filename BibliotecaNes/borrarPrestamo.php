<?php
require_once("autoload.php");

if (isset($_GET['idPrestamo'])) {
    $idPrestamo = $_GET['idPrestamo'];

    $objPres = new Prestamos();
    $delete = $objPres->delPrestamo($idPrestamo);

    if ($delete) {
        header("Location: sisPrestamos.php");
    } else {
        echo "Error al eliminar.";
        exit();
    }
}
?>