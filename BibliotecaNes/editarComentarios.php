<?php
require_once("autoload.php");

if (isset($_POST['submit'])) {
    $idComentarios = $_POST['idComentarios'];
    $idLibro = $_POST["idLibro"];
    $valoracion = $_POST['valoracion'];
    $comentario = $_POST['comentario'];
    $idUsu = $_POST['idUsu'];

    $objComentarios = new Comentarios();
    $update = $objComentarios->updateComentarios($idComentarios, $idLibro, $valoracion, $comentario, $idUsu);

    if ($update) {
        header("Location: sisComentarios.php");
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
    <title>Editar Comentarios</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="javascript/bootstrap.bundle.min.js"></script>
</head>

<body>

    <div class="centered-container" style="margin-top: 80px; margin-left: 290px;">
        <div class="container mt-5">
            <h4 class="mb-4">Actualizar comentarios</h4> <br><br>

            <?php
            // Obtener el ID del usuario de la URL
            $comentarioId = isset($_GET['idComentarioValoracion']) ? $_GET['idComentarioValoracion'] : null;

            // Verificar si se proporcionó un ID válido
            if ($comentarioId) {
                $objComentario = new Comentarios();
                $comentario = $objComentario->getComentario($comentarioId);

                // Verificar si existe
                if ($comentario) {
            ?>
                    <!-- Formulario para editar-->

                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                        <div class="mb-3">
                            <label for="idLibro" class="form-label">ID del libro:</label>
                            <input type="number" class="form-control" id="idLibro" name="idLibro" placeholder="Ingresar ID del libro..." required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Valoracion:</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="valoracion" id="valoracion" value="Una estrella">
                                <label class="form-check-label" for="valoracion">1 Estrella</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="valoracion" id="valoracion" value="Dos estrellas">
                                <label class="form-check-label" for="valoracion">2 Estrellas</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="valoracion" id="valoracion" value="Tres estrellas">
                                <label class="form-check-label" for="valoracion">3 Estrellas</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="valoracion" id="valoracion" value="Cuatro estrellas">
                                <label class="form-check-label" for="valoracion">4 Estrellas</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="valoracion" id="valoracion" value="Cinco estrellas" checked>
                                <label class="form-check-label" for="valoracion">5 Estrellas</label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="comentario" class="form-label">Comentario:</label>
                            <textarea class="form-control" id="comentario" name="comentario" cols="20" rows="5" placeholder="Ingresar comentario..." style="resize: none;"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="idUsu" class="form-label">ID del usuario:</label>
                            <input type="number" class="form-control" id="idUsu" name="idUsu" placeholder="Ingresar id del usuario..." required>
                        </div>
                        <input type="hidden" name="idComentarios" value="<?php echo htmlspecialchars($comentarioId); ?>">
                        <br>
                        <button type="submit" class="btn btn-primary" name="submit"><img src="imagenes/editar-codigo.png" alt="Agregar formato" class="mr-3" style="width: 24px; height: 24px;"> Actualizar autor</button>
                        <button type="reset" class="btn btn-warning" name="reset"><img src="imagenes/escoba-magica.png" alt="Agregar Usuarios" class="mr-3" style="width: 24px; height: 24px;"> Limpiar</button>
                    </form><br><br><br><br>
        </div>
    </div>
<?php
                } else {
                    echo "No encontrado.";
                }
            }
?>
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