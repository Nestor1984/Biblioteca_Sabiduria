<?php
require_once("autoload.php");

if (isset($_POST['submit'])) {
    $nombre = $_POST["nombre"];
    $pais = $_POST["pais"];
    $ciudad = $_POST["ciudad"];
    $telefono = $_POST['telefono'];
    $anioF = $_POST['fecha'];

    $objEditorial = new Editoriales();
    $insert = $objEditorial->insertEditoriales($nombre, $pais, $ciudad, $telefono, $anioF);

    if ($insert) {
        header("Location: sisEditoriales.php");
    } else {
        echo "Error al insertar.";
    }
}
?>
