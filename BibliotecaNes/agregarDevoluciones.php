<?php
require_once("autoload.php");

if (isset($_POST['submit'])) {
    $fDevo = $_POST["f-devolucion"];
    $estado = $_POST["estado"];
    $multa = $_POST["multa"];
    $idP = $_POST["id-p"];
    $comen = $_POST["comentario"];
    $idB = $_POST["id-b"];
    
    $objDevo = new Devoluciones();
    $insert = $objDevo->insertDevoluciones($fDevo, $estado, $multa, $idP, $comen, $idB);

    if ($insert) {
        header("Location: sisDevoluciones.php");
    } else {
        echo "Error al insertar.";
        exit();
    }
}
?>
