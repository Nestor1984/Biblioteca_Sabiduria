<?php
require_once("autoload.php");

$objDevolucion = new Devoluciones();
$devoluciones = $objDevolucion->getDevoluciones();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Devoluciones</title>
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
            <h4 class="mb-4">Ingresar devoluciones</h4> <br><br>

            <form action="agregarDevoluciones.php" method="post">
                <div class="mb-3">
                    <label for="f-devolucion" class="form-label">Fecha de devolucion:</label>
                    <input type="datetime" class="form-control" id="f-devolucion" name="f-devolucion" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Estado:</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="estado" id="estado" value="Prestado" checked>
                        <label class="form-check-label" for="estado">Prestado</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="estado" id="estado" value="Devuelto">
                        <label class="form-check-label" for="estado">Devuelto</label>
                    </div>
                </div>
                <br>
                <div class="mb-3">
                    <label for="multa" class="form-label">Multa:</label>
                    <input type="text" class="form-control" id="multa" name="multa" required>
                </div>
                <div class="mb-3">
                    <label for="id-p" class="form-label">ID Prestamo:</label>
                    <input type="number" class="form-control" id="id-p" name="id-p" required>
                </div>
                <div class="mb-3">
                    <label for="comentario" class="form-label">Comentario:</label>
                    <textarea class="form-control" id="comentario" name="comentario" cols="20" rows="5" placeholder="Ingresar comentario..." style="resize: none;"></textarea>
                </div>
                <div class="mb-3">
                    <label for="id-b" class="form-label">ID Bibliotecario:</label>
                    <input type="number" class="form-control" id="id-b" name="id-b" required>
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
                                <th>Fecha devolucion</th>
                                <th>Estado</th>
                                <th>Multa</th>
                                <th>ID Prestamo</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include_once("Autoload.php");
                            foreach ($devoluciones as $user) { ?>
                                <tr>
                                    <td><?= $user['idDevolucion'] ?></td>
                                    <td><?= $user['fechaDevolucion'] ?></td>
                                    <td><?= $user['estado'] ?></td>
                                    <td><?= $user['multa'] ?></td>
                                    <td><?= $user['idPrestamo'] ?></td>
                                    <td>
                                        <a href="editarDevoluciones.php?idDevolucion=<?= $user['idDevolucion']; ?>" class="btn btn-warning"><img src="imagenes/actualizar-datos.png" alt="Agregar formato" class="mr-3" style="width: 24px; height: 24px;">Editar</a>
                                        <a href="borrarDevolucion.php?idDevolucion=<?= $user['idDevolucion']; ?>" class="btn btn-danger"><img src="imagenes/borrar.png" alt="Agregar formato" class="mr-3" style="width: 24px; height: 24px;">Borrar</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </main>
    <script src="javascript/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>