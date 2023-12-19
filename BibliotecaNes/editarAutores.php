<?php
require_once("autoload.php");

if (isset($_POST['submit'])) {
    $id = $_POST["idAutores"];
    $nomApe = $_POST['nombres-apellidos'];
    $sitio = $_POST['sitio'];
    $nacionalidad = $_POST['nacionalidad'];
    $anioNacimiento = $_POST['anioNacimiento'];
    $anioFallecimiento = $_POST['anioFallecimiento'];
    $genero = $_POST['genero'];

    $objAutores = new Autores();
    $update = $objAutores->updateAutores($id, $nomApe, $sitio, $nacionalidad, $anioNacimiento, $anioFallecimiento, $genero);

    if ($update) {
        header("Location: sisAutores.php");
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
    <title>Editar Autores</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="javascript/bootstrap.bundle.min.js"></script>
</head>

<body>

    <div class="centered-container" style="margin-top: 80px; margin-left: 290px;">
        <div class="container mt-5">
            <h4 class="mb-4">Actualizar autores</h4> <br><br>

            <?php
            // Obtener el ID del usuario de la URL
            $autorId = isset($_GET['idAutor']) ? $_GET['idAutor'] : null;

            // Verificar si se proporcionó un ID válido
            if ($autorId) {
                $objAutor = new Autores();
                $autor = $objAutor->getAutor($autorId);

                // Verificar si existe
                if ($autor) {
            ?>
                    <!-- Formulario para editar-->

                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
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
                        <input type="hidden" name="idAutores" value="<?php echo htmlspecialchars($autorId); ?>">
                        <br>
                        <button type="submit" class="btn btn-primary" name="submit"><img src="imagenes/editar-codigo.png" alt="Agregar formato" class="mr-3" style="width: 24px; height: 24px;"> Actualizar autor</button>
                        <button type="reset" class="btn btn-warning" name="reset"><img src="imagenes/escoba-magica.png" alt="Agregar Usuarios" class="mr-3" style="width: 24px; height: 24px;"> Limpiar</button>
                    </form><br><br><br><br>
        </div>
    </div>
<?php
                } else {
                    echo "Formato no encontrado.";
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