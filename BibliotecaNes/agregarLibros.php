<?php
require_once("autoload.php");

if (isset($_POST['submit'])) {
    $idLibro = $_POST["idLibro"];
    $valoracion = $_POST["valoracion"];
    $comentario = $_POST["comentario"];
    $idUsu = $_POST["idUsu"];

    $objComen= new Comentarios();
    $insert = $objComen->insertComentarios($idLibro, $valoracion, $comentario, $idUsu);

    if ($insert) {
        header("Location: sisComentarios.php");
    } else {
        echo "Error al insertar.";
        exit();
    }
}
?>
