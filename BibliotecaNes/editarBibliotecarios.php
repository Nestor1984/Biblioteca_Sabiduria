<?php
require_once("autoload.php");

if (isset($_POST['submit'])) {
    $id = $_POST["idBibliotecario"];
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['direccion'];
    $direccion = $_POST['direccion'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $genero = $_POST['genero'];
    $ci = $_POST['ci'];
    $turno = $_POST['turno'];

    $objBibliotecarios = new Bibliotecarios();
    $update = $objBibliotecarios->updateBibliotecario($id, $nombres, $apellidos, $direccion, $email, $telefono, $genero, $ci, $turno);

    if ($update) {
        header("Location: sisBibliotecarios.php");
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
    <title>Editar Bibliotecarios</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="javascript/bootstrap.bundle.min.js"></script>
</head>

<body>

    <div class="centered-container" style="margin-top: 80px; margin-left: 290px;">
        <div class="container mt-5">
            <h4 class="mb-4">Actualizar Bibliotecarios</h4> <br><br>

            <?php
            // Obtener el ID del usuario de la URL
            $bibliotecarioId = isset($_GET['idBibliotecario']) ? $_GET['idBibliotecario'] : null;

            // Verificar si se proporcionó un ID válido
            if ($bibliotecarioId) {
                $objBibliotecario = new Bibliotecarios();
                $bibliotecario = $objBibliotecario->getBibliotecario($bibliotecarioId);

                // Verificar si el usuario existe
                if ($bibliotecario) {
            ?>
                    <!-- Formulario para editar usuario -->

                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
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
                        <input type="hidden" name="idBibliotecario" value="<?php echo htmlspecialchars($bibliotecarioId); ?>">
                        <br>
                        <button type="submit" class="btn btn-primary" name="submit"><img src="imagenes/editar-codigo.png" class="mr-3" style="width: 24px; height: 24px;"> Actualizar formato</button>
                        <button type="reset" class="btn btn-warning" name="reset"><img src="imagenes/escoba-magica.png" class="mr-3" style="width: 24px; height: 24px;"> Limpiar</button>
                    </form>
                    <br><br><br><br>
        </div>
    </div>
<?php
                } else {
                    echo "No encontrado.";
                }
            }
?>
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