<?php
require_once("autoload.php");

if (isset($_POST['submit'])) {
    $id = $_POST["idPrestamos"];
    $fPrestamo = $_POST['f-prestamo'];
    $plazo = $_POST['plazo'];
    $idU = $_POST['id-u'];
    $idB = $_POST['id-b'];
    $idE = $_POST['id-e'];

    $objPrestamos = new Prestamos();
    $update = $objPrestamos->updatePrestamos($id, $fPrestamo, $plazo, $idU, $idB, $idE);

    if ($update) {
        header("Location: sisPrestamos.php");
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
    <title>Editar Prestamos</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="javascript/bootstrap.bundle.min.js"></script>
</head>

<body>

    <div class="centered-container" style="margin-top: 80px; margin-left: 290px;">
        <div class="container mt-5">
            <h2 class="mb-4">Editar prestamos</h2>

            <?php

            $prestamoId = isset($_GET['idPrestamo']) ? $_GET['idPrestamo'] : null;

            // Verificar si se proporcionó un ID válido
            if ($prestamoId) {
                $objPrestamo = new Prestamos();
                $prestamo = $objPrestamo->getPrestamo($prestamoId);

                // Verificar si existe
                if ($prestamo) {
            ?>
                    <!-- Formulario para editar usuario -->
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                        <div class="mb-3">
                            <label for="f-prestamo" class="form-label">Fecha de prestamo:</label>
                            <input type="datetime" class="form-control" id="f-prestamo" name="f-prestamo" required>
                        </div>
                        <div class="mb-3">
                            <label for="plazo" class="form-label">Plazo:</label>
                            <input type="datetime" class="form-control" id="plazo" name="plazo" required>
                        </div>
                        <div class="mb-3">
                            <label for="id-u" class="form-label">ID Usuario:</label>
                            <input type="number" class="form-control" id="id-u" name="id-u" required>
                        </div>
                        <div class="mb-3">
                            <label for="id-b" class="form-label">ID Bibliotecario:</label>
                            <input type="number" class="form-control" id="id-b" name="id-b" required>
                        </div>
                        <div class="mb-3">
                            <label for="id-e" class="form-label">ID Ejemplar:</label>
                            <input type="number" class="form-control" id="id-e" name="id-e" required>
                        </div>
                        <input type="hidden" name="idPrestamos" value="<?php echo htmlspecialchars($prestamoId); ?>">
                        <br>
                        <button type="submit" class="btn btn-primary" name="submit"><img src="imagenes/editar-codigo.png" alt="Agregar formato" class="mr-3" style="width: 24px; height: 24px;"> Actualizar usuario</button>
                        <button type="reset" class="btn btn-warning" name="reset"><img src="imagenes/escoba-magica.png" class="mr-3" style="width: 24px; height: 24px;"> Limpiar</button>
                    </form>
                    <br><br><br><br>
            <?php
                } else {
                    echo "NO encontrado.";
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