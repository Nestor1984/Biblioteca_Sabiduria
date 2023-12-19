<?php
require_once("autoload.php");

if (isset($_POST['submit'])) {
    $fPrestamo = $_POST['f-prestamo'];
    $plazo = $_POST['plazo'];
    $idU = $_POST['id-u'];
    $idB = $_POST['id-b'];
    $idE = $_POST['id-e'];
    $objPres = new Prestamos();
    $insert = $objPres->insertPrestamos($fPrestamo, $plazo, $idU, $idB, $idE);

    if ($insert) {
        header("Location: sisPrestamos.php");
    } else {
        echo "Error al insertar.";
        exit();
    }
}
?>