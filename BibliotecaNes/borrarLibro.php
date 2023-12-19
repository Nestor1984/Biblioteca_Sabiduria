<?php
require_once("autoload.php");

// Verificar si se proporcionó un ID de usuario válido
if (isset($_GET['idLibro'])) {
    $idLibro = $_GET['idLibro'];

    $objLibr = new Libros();
    $delete = $objLibr->delLibro($idLibro);

    if ($delete) {
        header("Location: sisLibros.php");
    } else {
        echo "Error al eliminar libro.";
        exit();
    }
}
?>
