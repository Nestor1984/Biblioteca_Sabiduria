<?php
require_once("autoload.php");

if (isset($_POST['submit'])) {
    $idLibro = $_POST['idLibro'];
    $estado = $_POST['estado'];

    $objEjem= new Ejemplares();
    $insert = $objEjem->insertEjemplares($idLibro, $estado);

    if ($insert) {
        header("Location: sisEjemplares.php");
    } else {
        echo "Error al insertar ejemplar.";
        exit();
    }
}
?>