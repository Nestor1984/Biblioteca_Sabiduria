<?php
require_once("autoload.php");

if (isset($_POST['submit'])) {
    $id = $_POST["idEjemplares"];
    $idLibro = $_POST["idLibro"];
    $estado = $_POST['estado'];

    $objEjemplares = new Ejemplares();
    $update = $objEjemplares->updateEjemplares($id, $idLibro, $estado);

    if ($update) {
        header("Location: sisEjemplares.php");
    } else {
        echo "Hubo un error";
    }
}
?>

<!-- Formulario para editar usuario -->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Ejemplares</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="javascript/bootstrap.bundle.min.js"></script>
</head>

<body>

<div class="centered-container" style="margin-top: 80px; margin-left: 290px;">
        <div class="container mt-5">
        <h2 class="mb-4">Editar Ejemplares</h2>

        <?php

        $ejemplarId = isset($_GET['idEjemplar']) ? $_GET['idEjemplar'] : null;

        // Verificar si se proporcionó un ID válido
        if ($ejemplarId) {
            $objEjem = new Ejemplares();
            $ejemplar = $objEjem->getEjemplar($ejemplarId);


            if ($ejemplar) {
        ?>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <div class="mb-3">
                        <label for="idLibro" class="form-label">ID del libro:</label>
                        <input type="text" class="form-control" id="idLibro" name="idLibro" placeholder="Ingresar ID del libro...." required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Estado:</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="estado" id="disponible" value="Disponible" checked>
                            <label class="form-check-label" for="disponible">Disponible</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="estado" id="no-disponible" value="No disponible">
                            <label class="form-check-label" for="no-disponible">No disponible</label>
                        </div>
                    </div>
                    <input type="hidden" name="idEjemplares" value="<?php echo htmlspecialchars($ejemplarId); ?>">
                    <br>
                    <button type="submit" class="btn btn-primary" name="submit"><img src="imagenes/editar-codigo.png" class="mr-3" style="width: 24px; height: 24px;"> Actualizar ejemplar</button>
                    <button type="reset" class="btn btn-warning" name="reset"><img src="imagenes/escoba-magica.png" alt="Agregar Usuarios" class="mr-3" style="width: 24px; height: 24px;"> Limpiar</button>
                </form>
        <?php
            } else {
                echo "Formato no encontrado.";
            }
        }
        ?>
    </div>
    </div>
</body>

<style>
    body {
        margin: 0;
        padding: 0;
    }

    aside {
        background-color: #007BFF;
        color: white;
        padding: 10px;
        position: fixed;
        top: 0;
        left: 0;
        height: 100%;
        width: 260px;
        transition: width 0.3s;
        font-family: 'Lobster', cursive;
        font-size: 16px;
    }

    .nav-link {
        text-decoration: none;
        color: white;
    }

    .nav-link img {
        width: 24px;
        height: 24px;
        margin-right: 10px;
    }

    .font-italic-professional {
        font-family: 'Cormorant Garamond', serif;
        font-style: italic;
        font-weight: 700;
        /* Puedes ajustar esto según tu preferencia */
    }
</style>
</html>