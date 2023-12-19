<?php
require_once("autoload.php");

if (isset($_POST['submit'])) {
    $idLibro = $_POST["idLibro"];
    $idAutor = $_POST["idAutor"];

    $objLibrosAutores = new LibrosAutores();
    $update = $objLibrosAutores->updateLibrosAutores($idLibro, $idAutor);

    if ($update) {
        header("Location: sisLibrosAutores.php");
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
    <title>Editar Libros autores</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="javascript/bootstrap.bundle.min.js"></script>
</head>

<body>

    <div class="centered-container" style="margin-top: 80px; margin-left: 290px;">
        <div class="container mt-5">
            <h2 class="mb-4">Editar Libros - autores</h2>

            <?php
            // Obtener el ID del usuario de la URL
            $libroAutorId = isset($_GET['idLibro']) ? $_GET['idLibro'] : null;

            // Verificar si se proporcionó un ID válido
            if ($libroAutorId) {
                $objLibroAutor = new LibrosAutores();
                $libroAutor = $objLibroAutor->getLibroAutor($libroAutorId);

                // Verificar si el usuario existe
                if ($libroAutor) {
            ?>
                    <!-- Formulario para editar usuario -->
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                        <div class="mb-3">
                            <label for="idAutor" class="form-label">ID del autor:</label>
                            <input type="number" class="form-control" id="idAutor" name="idAutor" placeholder="Ingresar id del autor..." required>
                        </div>
                        <input type="hidden" name="idLibro" value="<?php echo htmlspecialchars($libroAutorId); ?>">
                        <br>
                        <button type="submit" class="btn btn-primary" name="submit"><img src="imagenes/editar-codigo.png" alt="Agregar formato" class="mr-3" style="width: 24px; height: 24px;"> Actualizar libro</button>
                        <button type="reset" class="btn btn-warning" name="reset"><img src="imagenes/escoba-magica.png" class="mr-3" style="width: 24px; height: 24px;"> Limpiar</button>
                    </form>
                    <br><br><br><br>
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