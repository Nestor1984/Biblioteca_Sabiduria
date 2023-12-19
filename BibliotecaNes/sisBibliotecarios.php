<?php
require_once("autoload.php");

$objBibliotecario = new Bibliotecarios();
$bibliotecarios = $objBibliotecario->getBibliotecarios();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bibliotecarios</title>
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
                <h4 class="mb-4">Ingresar bibliotecarios</h4> <br><br>

                <form action="agregarBibliotecario.php" method="post">
                    <div class="mb-3">
                        <label for="nombres" class="form-label">Nombres del bibliotecario:</label>
                        <input type="text" class="form-control" id="nombres" name="nombres" placeholder="Ingresar nombres...Ejemplo: Ximena Abigail" required>
                    </div>
                    <div class="mb-3">
                        <label for="apellidos" class="form-label">Apellidos del bibliotecario:</label>
                        <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Ingresar apellidos...Ejemplo: Gonzales Veliz" required>
                    </div>
                    <div class="mb-3">
                        <label for="direccion" class="form-label">Direccion:</label>
                        <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Ingresar direccion...Ejemplo: Villa Fatima" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Ingresar email...Ejemplo: ximenaV@gmail.com" required>
                    </div>
                    <div class="mb-3">
                        <label for="telefono" class="form-label">Telefono:</label>
                        <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Ingresar telefono...Ejemplo: 72340201" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Genero:</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="genero" id="genero" value="M" checked>
                            <label class="form-check-label" for="genero"><img src="imagenes/usuario-masculino.png" class="mr-3" style="width: 24px; height: 24px;">Masculino</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="genero" id="genero" value="F">
                            <label class="form-check-label" for="genero"><img src="imagenes/mujer.png" class="mr-3" style="width: 24px; height: 24px;">Femenino</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="genero" id="genero" value="O">
                            <label class="form-check-label" for="genero"><img src="imagenes/grupoN.png" class="mr-3" style="width: 24px; height: 24px;">Otros</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="ci" class="form-label">CI:</label>
                        <input type="text" class="form-control" id="ci" name="ci" placeholder="Ingresar CI...Ejemplo: 12678930" required>
                    </div>
                    <div class="mb-3">
                        <label for="turno" class="form-label">Turno:</label>
                        <select class="form-select" id="turno" name="turno" required>
                            <option value="Maniana">Maniana</option>
                            <option value="Tarde">Tarde</option>
                            <option value="Noche" selected>Noche</option>
                        </select>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary" name="submit"><img src="imagenes/cheque.png" alt="Agregar bibliotecarios" class="mr-3" style="width: 24px; height: 24px;"> Agregar</button>
                    <button type="reset" class="btn btn-warning" name="reset"><img src="imagenes/escoba.png" alt="Agregar bibliotecarios" class="mr-3" style="width: 24px; height: 24px;"> Limpiar</button>
                </form>

                <br><br><br><br>
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombres</th>
                                    <th>Apellidos</th>
                                    <th>Direccion</th>
                                    <th>Email</th>
                                    <th>Telefono</th>
                                    <th>Genero</th>
                                    <th>CI</th>
                                    <th>Turno</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include_once("Autoload.php");
                                foreach ($bibliotecarios as $user) { ?>
                                    <tr>
                                        <td><?= $user['idBibliotecario'] ?></td>
                                        <td><?= $user['nombres'] ?></td>
                                        <td><?= $user['apellidos'] ?></td>
                                        <td><?= $user['direccion'] ?></td>
                                        <td><?= $user['email'] ?></td>
                                        <td><?= $user['telefono'] ?></td>
                                        <td><?= $user['genero'] ?></td>
                                        <td><?= $user['ci'] ?></td>
                                        <td><?= $user['turno'] ?></td>
                                        <td>
                                            <a href="editarBibliotecarios.php?idBibliotecario=<?= $user['idBibliotecario']; ?>" class="btn btn-warning"><img src="imagenes/actualizar-datos.png" alt="Agregar formato" class="mr-3" style="width: 24px; height: 24px;"> Editar</a>
                                            <a href="borrarBibliotecario.php?idBibliotecario=<?= $user['idBibliotecario']; ?>" class="btn btn-danger"><img src="imagenes/borrar.png" alt="Agregar formato" class="mr-3" style="width: 24px; height: 24px;"> Borrar</a>
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