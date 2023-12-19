<?php
require_once("autoload.php");

if (isset($_POST['submit'])) {
    $id = $_POST["idLibro"];
    $titulo = $_POST["titulo"];
    $canPag = $_POST["canPag"];
    $fechaPublicacion = $_POST["fechaPubli"];
    $descripcion = $_POST["descripcion"];
    $genero = $_POST["genero"];
    $idioma = $_POST["idioma"];
    $isbn = $_POST["isbn"];
    $idForm = $_POST["idForm"];

    $objLibros = new Libros();
    $update = $objLibros->updateLibros($id, $titulo, $canPag, $fechaPublicacion, $descripcion, $genero, $idioma, $isbn, $idForm);

    if ($update) {
        header("Location: sisLibros.php");
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
    <title>Editar Libros</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="javascript/bootstrap.bundle.min.js"></script>
</head>

<body>

    <div class="centered-container" style="margin-top: 80px; margin-left: 290px;">
        <div class="container mt-5">
            <h2 class="mb-4">Editar Libros</h2>

            <?php
            // Obtener el ID del usuario de la URL
            $libroId = isset($_GET['idLibro']) ? $_GET['idLibro'] : null;

            // Verificar si se proporcionó un ID válido
            if ($libroId) {
                $objLibro = new Libros();
                $libro = $objLibro->getLibro($libroId);

                // Verificar si el usuario existe
                if ($libro) {
            ?>
                    <!-- Formulario para editar usuario -->
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                        <div class="mb-3">
                            <label for="titulo" class="form-label">Titulo del libro:</label>
                            <input type="text" class="form-control" id="titulo" name="titulo" required>
                        </div>
                        <div class="mb-3">
                            <label for="canPag" class="form-label">Cantidad de paginas:</label>
                            <input type="number" class="form-control" id="canPag" name="canPag" required>
                        </div>
                        <div class="mb-3">
                            <label for="fechaPubli" class="form-label">Fecha de publicacion:</label>
                            <input type="date" class="form-control" id="fechaPubli" name="fechaPubli" required>
                        </div>
                        <div class="mb-3">
                            <label for="descripcion" class="form-label">Descripcion:</label>
                            <textarea class="form-control" id="descripcion" name="descripcion" cols="20" rows="12" placeholder="Ingresar descripcion..." style="resize: none;"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="genero" class="form-label">Genero:</label>
                            <input type="text" class="form-control" id="genero" name="genero" required>
                        </div>
                        <div class="mb-3">
                            <label for="idioma" class="form-label">Idioma:</label>
                            <input type="text" class="form-control" id="idioma" name="idioma" required>
                        </div>
                        <div class="mb-3">
                            <label for="isbn" class="form-label">ISBN:</label>
                            <input type="text" class="form-control" id="isbn" name="isbn" required>
                        </div>
                        <div class="mb-3">
                            <label for="idForm" class="form-label">ID del formato:</label>
                            <input type="number" class="form-control" id="idForm" name="idForm" required>
                        </div>
                        <input type="hidden" name="idLibro" value="<?php echo htmlspecialchars($libroId); ?>">
                        <br>
                        <button type="submit" class="btn btn-primary" name="submit"><img src="imagenes/editar-codigo.png" alt="Agregar formato" class="mr-3" style="width: 24px; height: 24px;"> Actualizar libro</button>
                        <button type="reset" class="btn btn-warning" name="reset"><img src="imagenes/escoba-magica.png" class="mr-3" style="width: 24px; height: 24px;"> Limpiar</button>
                    </form>
                    <br><br><br><br>
            <?php
                } else {
                    echo "Libro no encontrado.";
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