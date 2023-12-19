<?php
require_once("autoload.php");

if (isset($_POST['submit'])) {
    $id = $_POST["idFormatos"];
    $nombre = $_POST["nombre"];
    $descripcion = $_POST['descripcion'];

    $objFormatos = new Formatos();
    $update = $objFormatos->updateFormato($id, $nombre, $descripcion);

    if ($update) {
        header("Location: index.php");
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
    <title>Editar Formatos</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="javascript/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="css/estilos.css">
    <script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>
</head>

<body id="body">

    <header>
        <div class="icon__menu">
            <i class="fas fa-bars" id="btn_open"></i>
        </div>
    </header>

    <div class="menu__side" id="menu_side">

        <div class="name__page">
            <i><img src="imagenes/libro.png" alt="Agregar libro" class="mr-3" style="width: 24px; height: 24px;"></i>
            <h4>Biblioteca Sabiduria</h4>
        </div>

        <div class="options__menu">

            <a href="index.php" class="selected">
                <div class="option">
                    <i><img src="imagenes/diseno.png" alt="Agregar libro" class="mr-3" style="width: 24px; height: 24px;"></i>
                    <h4>Formato</h4>
                </div>
            </a>

            <a href="sisLibros.php">
                <div class="option">
                    <i><img src="imagenes/libroJ.png" alt="Agregar libro" class="mr-3" style="width: 24px; height: 24px;"></i>
                    <h4>Libro</h4>
                </div>
            </a>

            <a href="sisEjemplares.php">
                <div class="option">
                    <i><img src="imagenes/libros-de-texto.png" alt="Agregar libro" class="mr-3" style="width: 24px; height: 24px;"></i>
                    <h4>Ejemplar</h4>
                </div>
            </a>
            <a href="sisUsuarios.php">
                <div class="option">
                    <i><img src="imagenes/grupo.png" alt="Agregar libro" class="mr-3" style="width: 24px; height: 24px;"></i>
                    <h4>Usuarios</h4>
                </div>
            </a>
            <a href="sisBibliotecarios.php">
                <div class="option">
                    <i><img src="imagenes/bibliotecario.png" alt="Agregar libro" class="mr-3" style="width: 24px; height: 24px;"></i>
                    <h4>Bibliotecarios</h4>
                </div>
            </a>

            <a href="sisEditoriales.php">
                <div class="option">
                    <i><img src="imagenes/editorial.png" alt="Agregar libro" class="mr-3" style="width: 24px; height: 24px;"></i>
                    <h4>Editorial</h4>
                </div>
            </a>

            <a href="sisAutores.php">
                <div class="option">
                    <i><img src="imagenes/editor.png" alt="Agregar libro" class="mr-3" style="width: 24px; height: 24px;"></i>
                    <h4>Autores</h4>
                </div>
            </a>
            <a href="sisLibrosAutores.php">
                <div class="option">
                    <i><img src="imagenes/autor.png" alt="Agregar libro" class="mr-3" style="width: 24px; height: 24px;"></i>
                    <h4>Libros autores</h4>
                </div>
            </a>
            <a href="sisLibrosEditoriales.php">
                <div class="option">
                    <i><img src="imagenes/dia-mundial-del-libro.png" alt="Agregar libro" class="mr-3" style="width: 24px; height: 24px;"></i>
                    <h4>Libros editoriales</h4>
                </div>
            </a>
            <a href="sisComentarios.php">
                <div class="option">
                    <i><img src="imagenes/comentarios.png" alt="Agregar libro" class="mr-3" style="width: 24px; height: 24px;"></i>
                    <h4>Comentarios</h4>
                </div>
            </a>
            <a href="sisPrestamos.php">
                <div class="option">
                    <i><img src="imagenes/pedir-prestado.png" alt="Agregar libro" class="mr-3" style="width: 24px; height: 24px;"></i>
                    <h4>Prestamos</h4>
                </div>
            </a>
            <a href="sisDevoluciones.php">
                <div class="option">
                    <i><img src="imagenes/afirmar.png" alt="Agregar libro" class="mr-3" style="width: 24px; height: 24px;"></i>
                    <h4>Devoluciones</h4>
                </div>
            </a>
        </div>

    </div>

    <main>

        <div class="centered-container" style="margin-top: 40px; margin-left: 100px;">

            <div class="container mt-5">
                <h4 class="mb-4">Actualizar formatos</h4> <br><br>

                <?php
                // Obtener el ID del usuario de la URL
                $formatoId = isset($_GET['idFormatos']) ? $_GET['idFormatos'] : null;

                // Verificar si se proporcionó un ID válido
                if ($formatoId) {
                    $objFormato = new Formatos();
                    $formato = $objFormato->getFormato($formatoId);

                    // Verificar si el usuario existe
                    if ($formato) {
                ?>
                        <!-- Formulario para editar usuario -->

                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre del formato:</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese el formato..." required>
                            </div>
                            <div class="mb-3">
                                <label for="descripcion" class="form-label">Descripcion:</label>
                                <textarea class="form-control" id="descripcion" name="descripcion" cols="20" rows="5" placeholder="Ingresar descripcion..." style="resize: none;"></textarea>
                            </div>
                            <input type="hidden" name="idFormatos" value="<?php echo htmlspecialchars($formatoId); ?>">
                            <br>
                            <button type="submit" class="btn btn-primary" name="submit"><img src="imagenes/editar-codigo.png" alt="Agregar formato" class="mr-3" style="width: 24px; height: 24px;"> Actualizar formato</button>
                            <button type="reset" class="btn btn-warning" name="reset"><img src="imagenes/escoba-magica.png" alt="Agregar Usuarios" class="mr-3" style="width: 24px; height: 24px;"> Limpiar</button>
                        </form>
            </div>
        </div>
<?php
                    } else {
                        echo "Formato no encontrado.";
                    }
                }
?>
</div>
    </main>
    <script src="javascript/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
</body>

</html>