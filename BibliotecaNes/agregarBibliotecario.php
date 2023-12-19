<?php
require_once("autoload.php");

if (isset($_POST['submit'])) {
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['direccion'];
    $direccion = $_POST['direccion'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $genero = $_POST['genero'];
    $ci = $_POST['ci'];
    $turno = $_POST['turno'];

    $objBibliotecario = new Bibliotecarios();
    $insert = $objBibliotecario->insertBibliotecarios($nombres, $apellidos, $direccion, $email, $telefono, $genero, $ci, $turno);

    if ($insert) {
        header("Location: sisBibliotecarios.php");
    } else {
        echo "Error al insertar.";
    }
}
?>
