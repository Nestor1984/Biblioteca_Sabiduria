<?php
require_once("autoload.php");

if (isset($_POST['submit'])) {
    $nombres = $_POST["nombres"];
    $apellidos = $_POST["apellidos"];
    $ci = $_POST["ci"];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email-u'];
    $genero = $_POST['genero'];

    $objUsuario = new Usuarios();
    $insert = $objUsuario->insertUsuarios($nombres, $apellidos, $ci, $direccion, $telefono, $email, $genero);

    if ($insert) {
        header("Location: sisUsuarios.php");
    } else {
        echo "Error al insertar usuario.";
    }
}
?>
