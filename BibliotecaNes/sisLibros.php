<?php
require_once("autoload.php");

$objLibro = new Libros();
$libros = $objLibro->getLibros();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Libros</title>
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
            <h4 class="mb-4">Ingresar libros</h4> <br><br>

            <form action="agregarLibros.php" method="post">
                <div class="mb-3">
                    <label for="titulo" class="form-label">Titulo del libro:</label>
                    <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Ingresar titulo..." required>
                </div>
                <div class="mb-3">
                    <label for="canPag" class="form-label">Cantidad de paginas:</label>
                    <input type="number" class="form-control" id="canPag" name="canPag" placeholder="Ingresar cantidad de paginas..." required>
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
                    <input type="text" class="form-control" id="genero" name="genero" placeholder="Ingresar genero..." required>
                </div>
                <div class="mb-3">
                    <label for="idioma" class="form-label">Idioma:</label>
                    <input type="text" class="form-control" id="idioma" name="idioma" placeholder="Ingresar idioma..." required>
                </div>
                <div class="mb-3">
                    <label for="isbn" class="form-label">ISBN:</label>
                    <input type="text" class="form-control" id="isbn" name="isbn" placeholder="Ingresar isbn..." required>
                </div>
                <div class="mb-3">
                    <label for="idForm" class="form-label">ID del formato:</label>
                    <input type="number" class="form-control" id="idForm" name="idForm" placeholder="Ingresar id del formato..." required>
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
                        <th>ID Libro</th>
                        <th>Titulo</th>
                        <th>Cantidad de paginas</th>
                        <th>Fecha de publicacion</th>
                        <th>Descripcion</th>
                        <th>Genero</th>
                        <th>Idioma</th>
                        <th>ISBN</th>
                        <th>ID Formato</th>
                        <th>Nombre del formato</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include_once("Autoload.php");
                    foreach ($libros as $user) { ?>
                        <tr>
                            <td><?= $user['idLibro'] ?></td>
                            <td><?= $user['titulo'] ?></td>
                            <td><?= $user['cantidadPaginas'] ?></td>
                            <td><?= $user['fechaPublicacion'] ?></td>
                            <td><?= $user['descripcion'] ?></td>
                            <td><?= $user['genero'] ?></td>
                            <td><?= $user['idioma'] ?></td>
                            <td><?= $user['isbn'] ?></td>
                            <td><?= $user['idFormato'] ?></td>
                            <td><?= $user['nombre'] ?></td>
                            <td>
                                <a href="editarLibros.php?idLibro=<?= $user['idLibro']; ?>" class="btn btn-warning"><img src="imagenes/actualizar-datos.png" alt="Agregar formato" class="mr-3" style="width: 24px; height: 24px;">Editar</a>
                                <a href="borrarLibro.php?idLibro=<?= $user['idLibro']; ?>" class="btn btn-danger"><img src="imagenes/borrar.png" alt="Agregar formato" class="mr-3" style="width: 24px; height: 24px;">Borrar</a>
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