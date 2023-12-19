<?php
require_once("autoload.php");

if (isset($_POST['submit'])) {
    $id = $_POST["idEditoriales"];
    $nombre = $_POST["nombre"];
    $pais = $_POST['pais'];
    $ciudad = $_POST['ciudad'];
    $telefono = $_POST['telefono'];
    $anio = $_POST['anioFundacion'];

    $objEditoriales = new Editoriales();
    $update = $objEditoriales->updateEditorial($id, $nombre, $pais, $ciudad, $telefono, $anio);

    if ($update) {
        header("Location: sisEditoriales.php");
    } else {
        echo "Hubo un error";
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Editoriales</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="javascript/bootstrap.bundle.min.js"></script>
</head>

<body>

    <div class="centered-container" style="margin-top: 80px; margin-left: 290px;">
        <div class="container mt-5">
            <h2 class="mb-4">Editar Editoriales</h2>

            <?php

            $editorialId = isset($_GET['idEditorial']) ? $_GET['idEditorial'] : null;

            // Verificar si se proporcionó un ID válido
            if ($editorialId) {
                $objEdit = new Editoriales();
                $editorial = $objEdit->getEditorial($editorialId);


                if ($editorial) {
            ?>
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre:</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingresar nombre de la editorial....." required>
                        </div>
                        <div class="mb-3">
                            <label for="pais" class="form-label">Pais:</label>
                            <input type="text" class="form-control" id="pais" name="pais" placeholder="Ingresar pais de la editorial..." required>
                        </div>
                        <div class="mb-3">
                            <label for="ciudad" class="form-label">Ciudad:</label>
                            <input type="text" class="form-control" id="ciudad" name="ciudad" placeholder="Ingresar ciudad de la editorial..." required>
                        </div>
                        <div class="mb-3">
                            <label for="telefono" class="form-label">Telefono:</label>
                            <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Ingresar ciudad de la editorial..." required>
                        </div>
                        <div class="mb-3">
                            <label for="fecha" class="form-label">Fecha de fundacion:</label>
                            <input type="date" class="form-control" id="fecha" name="anioFundacion" placeholder="Ingresar telefono de la editorial..." required>
                        </div>
                        <input type="hidden" name="idEditoriales" value="<?php echo htmlspecialchars($editorialId); ?>">
                        <br>
                        <button type="submit" class="btn btn-primary" name="submit"><img src="imagenes/editar-codigo.png" class="mr-3" style="width: 24px; height: 24px;"> Actualizar editorial</button>
                        <button type="reset" class="btn btn-warning" name="reset"><img src="imagenes/escoba-magica.png" alt="Agregar Usuarios" class="mr-3" style="width: 24px; height: 24px;"> Limpiar</button>
                    </form>
            <?php
                } else {
                    echo "No encontrado.";
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