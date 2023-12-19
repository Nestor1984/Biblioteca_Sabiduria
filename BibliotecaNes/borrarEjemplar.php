<?php
require_once("autoload.php");

if (isset($_GET['idEjemplar'])) {
    $idEjemplar = $_GET['idEjemplar'];

    $objEjem = new Ejemplares();
    $delete = $objEjem->delEjemplar($idEjemplar);

    if ($delete) {
        header("Location: sisEjemplares.php");
    } else {
        echo "Error al eliminar ejemplar.";
        exit();
    }
}
?>