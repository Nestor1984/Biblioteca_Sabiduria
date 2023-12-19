<?php
require_once("autoload.php");

$objComentario = new Comentarios();
$comentarios = $objComentario->getComentarios();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Comentarios y valoraciones</title>
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
            <h4 class="mb-4">Ingresar comentarios y valoraciones</h4> <br><br>

            <form action="agregarLibros.php" method="post">
                <div class="mb-3">
                    <label for="idLibro" class="form-label">ID del libro:</label>
                    <input type="number" class="form-control" id="idLibro" name="idLibro" placeholder="Ingresar ID del libro..." required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Valoracion:</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="valoracion" id="valoracion" value="Una estrella">
                        <label class="form-check-label" for="valoracion">
                        <img src="imagenes/estrella.png" alt="Agregar Usuarios" class="mr-3" style="width: 24px; height: 24px;">
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="valoracion" id="valoracion" value="Dos estrellas">
                        <label class="form-check-label" for="valoracion">
                        <img src="imagenes/estrella.png" alt="Agregar Usuarios" class="mr-3" style="width: 24px; height: 24px;">
                        <img src="imagenes/estrella.png" alt="Agregar Usuarios" class="mr-3" style="width: 24px; height: 24px;">
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="valoracion" id="valoracion" value="Tres estrellas">
                        <label class="form-check-label" for="valoracion">
                        <img src="imagenes/estrella.png" alt="Agregar Usuarios" class="mr-3" style="width: 24px; height: 24px;">
                        <img src="imagenes/estrella.png" alt="Agregar Usuarios" class="mr-3" style="width: 24px; height: 24px;">
                        <img src="imagenes/estrella.png" alt="Agregar Usuarios" class="mr-3" style="width: 24px; height: 24px;">
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="valoracion" id="valoracion" value="Cuatro estrellas">
                        <label class="form-check-label" for="valoracion">
                        <img src="imagenes/estrella.png" alt="Agregar Usuarios" class="mr-3" style="width: 24px; height: 24px;">
                        <img src="imagenes/estrella.png" alt="Agregar Usuarios" class="mr-3" style="width: 24px; height: 24px;">
                        <img src="imagenes/estrella.png" alt="Agregar Usuarios" class="mr-3" style="width: 24px; height: 24px;">
                        <img src="imagenes/estrella.png" alt="Agregar Usuarios" class="mr-3" style="width: 24px; height: 24px;">
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="valoracion" id="valoracion" value="Cinco estrellas" checked>
                        <label class="form-check-label" for="valoracion">
                        <img src="imagenes/estrella.png" alt="Agregar Usuarios" class="mr-3" style="width: 24px; height: 24px;">
                        <img src="imagenes/estrella.png" alt="Agregar Usuarios" class="mr-3" style="width: 24px; height: 24px;">
                        <img src="imagenes/estrella.png" alt="Agregar Usuarios" class="mr-3" style="width: 24px; height: 24px;">
                        <img src="imagenes/estrella.png" alt="Agregar Usuarios" class="mr-3" style="width: 24px; height: 24px;">
                        <img src="imagenes/estrella.png" alt="Agregar Usuarios" class="mr-3" style="width: 24px; height: 24px;">
                        </label>
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
                <br>
                <button type="submit" class="btn btn-primary" name="submit"><img src="imagenes/cheque.png" alt="Agregar Usuarios" class="mr-3" style="width: 24px; height: 24px;"> Agregar</button>
                <button type="reset" class="btn btn-warning" name="reset"><img src="imagenes/escoba.png" alt="Agregar Usuarios" class="mr-3" style="width: 24px; height: 24px;"> Limpiar</button>
            </form>

            <br><br><br><br>
            <div class="row justify-content-center">
                <div class="col-md-8">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>ID Libro</th>
                        <th>Valoracion</th>
                        <th>Comentario</th>
                        <th>ID del Usuario</th>
                        <th>Titulo</th>
                        <th>Usuario</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include_once("Autoload.php");
                    foreach ($comentarios as $user) { ?>
                        <tr>
                            <td><?= $user['idComentarioValoracion'] ?></td>
                            <td><?= $user['idLibro'] ?></td>
                            <td><?= $user['valoracion'] ?></td>
                            <td><?= $user['comentario'] ?></td>
                            <td><?= $user['idUsuario'] ?></td>
                            <td><?= $user['titulo'] ?></td>
                            <td><?= $user['nombres'] ?></td>
                            <td>
                                <a href="editarComentarios.php?idComentarioValoracion=<?= $user['idComentarioValoracion']; ?>" class="btn btn-warning"><img src="imagenes/actualizar-datos.png" alt="Agregar formato" class="mr-3" style="width: 24px; height: 24px;">Editar</a>
                                <a href="borrarComentario.php?idComentarioValoracion=<?= $user['idComentarioValoracion']; ?>" class="btn btn-danger"><img src="imagenes/borrar.png" alt="Agregar formato" class="mr-3" style="width: 24px; height: 24px;">Borrar</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
                </div>
                </div>
            </table>
        </div>
    </div>
    </main>
    <script src="javascript/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
</body>

</html>