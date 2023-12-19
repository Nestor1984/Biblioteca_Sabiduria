<?php
require_once("autoload.php");

if (isset($_POST['submit'])) {
    $nomApe = $_POST['nombres-apellidos'];
    $sitio = $_POST['sitio'];
    $nacionalidad = $_POST['nacionalidad'];
    $anioNacimiento = $_POST['anioNacimiento'];
    $anioFallecimiento = $_POST['anioFallecimiento'];
    $genero = $_POST['genero'];

    $objAutor = new Autores();
    $insert = $objAutor->insertAutores($nomApe, $sitio, $nacionalidad, $anioNacimiento, $anioFallecimiento, $genero);

    if ($insert) {
        header("Location: sisAutores.php");
    } else {
        echo "Error al insertar.";
    }
}
?>