<?php
require_once("autoload.php");

if (isset($_POST['submit'])) {
    $id = $_POST["idDevoluciones"];
    $fDevo = $_POST["f-devolucion"];
    $estado = $_POST["estado"];
    $multa = $_POST["multa"];
    $idP = $_POST["id-p"];
    $comen = $_POST["comentario"];
    $idB = $_POST["id-b"];
    $estado = $_POST["estado"];

    $objDevoluciones = new Devoluciones();
    $update = $objDevoluciones->updateDevoluciones($id, $fDevo, $estado, $multa, $idP, $comen, $idB);

    if ($update) {
        header("Location: sisDevoluciones.php");
    } else {
        echo "Hubo un error";
    }
}
/*
    <aside class="bg-primary text-white p-3 position-fixed" style="top: 0; left: 0; height: 100%; width: 260px; transition: width 0.3s; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);">
        <!-- Logo -->
        <div class="text-center mb-3">
            <img src="imagenes/libro.png" alt="Logo de la Biblioteca" style="width: 80px; height: auto;">
        </div>
        <h5 class="text-white mb-4 font-italic-professional" style="font-size: 1.5rem;">&nbsp; Biblioteca <span class="font-italic">Sabiduría</span></h5><br>
        <ul class="nav flex-column">
            <li class="nav-item mb-3" style="border-bottom: 1px solid rgba(255, 255, 255, 0.1); margin-bottom: 10px;">
                <a class="nav-link text-white" href="sistema.php" style="font-size: 1.2rem;">
                    <img src="imagenes/dia-mundial-del-libro.png" alt="Agregar formato" class="mr-3" style="width: 24px; height: 24px;"> Agregar formato
                </a>
            </li>
            <li class="nav-item mb-3" style="border-bottom: 1px solid rgba(255, 255, 255, 0.1); margin-bottom: 10px;">
                <a class="nav-link text-white" href="sisLibros.php" style="font-size: 1.2rem;">
                    <img src="imagenes/libro.png" alt="Agregar libro" class="mr-3" style="width: 24px; height: 24px;"> Agregar libro
                </a>
            </li>
            <li class="nav-item mb-3" style="border-bottom: 1px solid rgba(255, 255, 255, 0.1); margin-bottom: 10px;">
                <a class="nav-link text-white" href="sisEjemplares.php" style="font-size: 1.2rem;">
                    <img src="imagenes/libros-de-texto.png" alt="Agregar Ejemplar" class="mr-3" style="width: 24px; height: 24px;"> Agregar Ejemplar</a>
            </li>
            <li class="nav-item mb-3" style="border-bottom: 1px solid rgba(255, 255, 255, 0.1); margin-bottom: 10px;">
                <a class="nav-link text-white" href="sisUsuarios.php" style="font-size: 1.2rem;">
                    <img src="imagenes/grupo.png" alt="Agregar Usuarios" class="mr-3" style="width: 24px; height: 24px;"> Agregar Usuarios</a>
            </li>
        </ul>
    </aside>
*/
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Devoluciones</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="javascript/bootstrap.bundle.min.js"></script>
</head>

<body>

    <div class="centered-container" style="margin-top: 80px; margin-left: 290px;">
        <div class="container mt-5">
            <h2 class="mb-4">Editar Devoluciones</h2>

            <?php

            $devolucionId = isset($_GET['idDevolucion']) ? $_GET['idDevolucion'] : null;

            // Verificar si se proporcionó un ID válido
            if ($devolucionId) {
                $objDevo = new Devoluciones();
                $devolucion = $objDevo->getDevolucion($devolucionId);


                if ($devolucion) {
            ?>
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
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
                        <input type="hidden" name="idDevoluciones" value="<?php echo htmlspecialchars($devolucionId); ?>">
                        <br>
                        <button type="submit" class="btn btn-primary" name="submit"><img src="imagenes/editar-codigo.png" class="mr-3" style="width: 24px; height: 24px;"> Actualizar editorial</button>
                        <button type="reset" class="btn btn-warning" name="reset"><img src="imagenes/escoba-magica.png" alt="Agregar Usuarios" class="mr-3" style="width: 24px; height: 24px;"> Limpiar</button>
                    </form>
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