<?php
require_once("autoload.php");

if (isset($_POST['submit'])) {
    $idLibro = $_POST["idLibro"];
    $idAutor = $_POST["idAutor"];

    $objLibAut = new LibrosAutores();
    $insert = $objLibAut->insertLibrosAutores($idLibro, $idAutor);

    if ($insert) {
        header("Location: sisLibrosAutores.php");
    } else {
        echo "Error al insertar.";
        exit();
    }
}
?>
