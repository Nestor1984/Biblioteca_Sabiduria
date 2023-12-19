<?php
require_once("autoload.php");

$objAutor = new Autores();
$autores = $objAutor->getAutores();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Autores</title>
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
            <h4 class="mb-4">Ingresar autores</h4> <br><br>

            <form action="agregarAutor.php" method="post">
                <div class="mb-3">
                    <label for="nombres-apellidos" class="form-label">Nombres y apellidos:</label>
                    <input type="text" class="form-control" id="nombres-apellidos" name="nombres-apellidos" placeholder="Ingresar nombres y apellidos del autor....." required>
                </div>
                <div class="mb-3">
                    <label for="sitio" class="form-label">Sitio web del autor:</label>
                    <input type="text" class="form-control" id="sitio" name="sitio" placeholder="Ingresar sitio web del autor..." required>
                </div>
                <div class="mb-3">
                    <label for="nacionalidad" class="form-label">Nacionalidad:</label>
                    <input type="text" class="form-control" id="nacionalidad" name="nacionalidad" placeholder="Ingresar nacionalidad del autor..." required>
                </div>
                <div class="mb-3">
                    <label for="anioNacimiento" class="form-label">Fecha de nacimiento:</label>
                    <input type="date" class="form-control" id="anioNacimiento" name="anioNacimiento" placeholder="Ingresar la fecha de nacimiento..." required>
                </div>
                <div class="mb-3">
                    <label for="anioFallecimiento" class="form-label">Fecha de fallecimiento:</label>
                    <input type="date" class="form-control" id="anioFallecimiento" name="anioFallecimiento" placeholder="Ingresar la fecha de fallecimiento (NO OBLIGATORIO)...">
                </div>
                <div class="mb-3">
                    <label class="form-label">Genero:</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="genero" id="genero" value="M" checked>
                        <label class="form-check-label" for="genero">Masculino</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="genero" id="genero" value="F">
                        <label class="form-check-label" for="genero">Femenino</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="genero" id="genero" value="O">
                        <label class="form-check-label" for="genero">Otros</label>
                    </div>
                </div>
                <br>
                <button type="submit" class="btn btn-primary" name="submit"><img src="imagenes/cheque.png" class="mr-3" style="width: 24px; height: 24px;"> Agregar</button>
                <button type="reset" class="btn btn-warning" name="reset"><img src="imagenes/escoba.png" class="mr-3" style="width: 24px; height: 24px;"> Limpiar</button>
            </form>

            <br><br><br><br>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombres y apellidos</th>
                        <th>Sitio web</th>
                        <th>Nacionalidad</th>
                        <th>Fecha nacimiento</th>
                        <th>Fecha fallecimiento</th>
                        <th>Genero</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include_once("Autoload.php");
                    foreach ($autores as $user) { ?>
                        <tr>
                            <td><?= $user['idAutor'] ?></td>
                            <td><?= $user['nombresYApellidos'] ?></td>
                            <td><?= $user['sitioWeb'] ?></td>
                            <td><?= $user['nacionalidad'] ?></td>
                            <td><?= $user['anioNacimiento'] ?></td>
                            <td><?= $user['anioFallecimiento'] ?></td>
                            <td><?= $user['genero'] ?></td>
                            <td>
                                <a href="editarAutores.php?idAutor=<?= $user['idAutor']; ?>" class="btn btn-warning"><img src="imagenes/actualizar-datos.png" class="mr-3" style="width: 24px; height: 24px;">Editar</a>
                                <a href="borrarAutor.php?idAutor=<?= $user['idAutor']; ?>" class="btn btn-danger"><img src="imagenes/borrar.png" class="mr-3" style="width: 24px; height: 24px;">Borrar</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        </div>
        
    </div>
    </main>
    <script src="javascript/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
</body>

</html>