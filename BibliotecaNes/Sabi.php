<?php
require_once("autoload.php");

// Instancia de la clase Formatos
$objFormato = new Formatos();
$formatos = $objFormato->getFormatos();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Formatos</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
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

            <a href="#" class="selected">
                <div class="option">
                    <i class="fas fa-home" title="Inicio"></i>
                    <h4>Inicio</h4>
                </div>
            </a>

            <a href="#">
                <div class="option">
                    <i class="far fa-file" title="Portafolio"></i>
                    <h4>Portafolio</h4>
                </div>
            </a>
            
            <a href="#">
                <div class="option">
                    <i class="fas fa-video" title="Cursos"></i>
                    <h4>Cursos</h4>
                </div>
            </a>

            <a href="#">
                <div class="option">
                    <i class="far fa-sticky-note" title="Blog"></i>
                    <h4>Blog</h4>
                </div>
            </a>

            <a href="#">
                <div class="option">
                    <i class="far fa-id-badge" title="Contacto"></i>
                    <h4>Contacto</h4>
                </div>
            </a>

            <a href="#">
                <div class="option">
                    <i class="far fa-address-card" title="Nosotros"></i>
                    <h4>Nosotros</h4>
                </div>
            </a>

        </div>

    </div>

    <main>

    <div class="centered-container" style="margin-top: 80px; margin-left: 100px;">
        <div class="container mt-5">
            <h4 class="mb-4">Ingresar formatos</h4> <br><br>

            <form action="agregarFormato.php" method="post">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre del formato:</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingresar formato..." required>
                </div>
                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripcion:</label>
                    <textarea class="form-control" id="descripcion" name="descripcion" cols="20" rows="5" placeholder="Ingresar descripcion..." style="resize: none;"></textarea>
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
                                <th>Nombre</th>
                                <th>Descripcion</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include_once("Autoload.php");
                            foreach ($formatos as $user) { ?>
                                <tr>
                                    <td><?= $user['idFormatos'] ?></td>
                                    <td><?= $user['nombre'] ?></td>
                                    <td><?= $user['descripcion'] ?></td>
                                    <td>
                                        <a href="editarFormatos.php?idFormatos=<?= $user['idFormatos']; ?>" class="btn btn-warning"><img src="imagenes/actualizar-datos.png" alt="Agregar formato" class="mr-3" style="width: 24px; height: 24px;"> Editar</a>
                                        <a href="borrarFormato.php?idFormatos=<?= $user['idFormatos']; ?>" class="btn btn-danger"><img src="imagenes/borrar.png" alt="Agregar formato" class="mr-3" style="width: 24px; height: 24px;"> Borrar</a>
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