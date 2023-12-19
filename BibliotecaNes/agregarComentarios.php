<?php
require_once("autoload.php");

if (isset($_POST['submit'])) {
    $titulo = $_POST["titulo"];
    $canPag = $_POST["canPag"];
    $fechaPublicacion = $_POST["fechaPubli"];
    $descripcion = $_POST["descripcion"];
    $genero = $_POST["genero"];
    $idioma = $_POST["idioma"];
    $isbn = $_POST["isbn"];
    $idForm = $_POST["idForm"];

    $objLib= new Libros();
    $insert = $objLib->insertLibros($titulo, $canPag, $fechaPublicacion, $descripcion, $genero, $idioma, $isbn, $idForm);

    if ($insert) {
        header("Location: sisComentarios.php");
    } else {
        echo "Error al insertar libro.";
        exit();
    }
}
?>
