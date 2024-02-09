<!DOCTYPE html>
<html lang="es">
<?php
include('DB/db.php');
include('templates/header.php');

// Comprobar si hay una sesión iniciada
if (isset($_SESSION['user_id'])) {
    // Redirigir a asignaturas.php si hay una sesión iniciada
    header('Location: ./pages');
    exit();
}
?>

<link rel="stylesheet" href="css/login.css">

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card text-center">
                    <div class="card-header text-start">
                        <img src="./img/logoMini.jpg" alt="Purrrfect Polyglot" class="img-thumbnail" style="width: 50px; height: 50px;">
                        Purrrfect Polyglot
                    </div>
                    <div class="card-body">
                        <!-- Imagen en el contenido -->
                        <?php
                        $imagenContenidoRuta = "./img/homePage.png";
                        $maxContentWidth = 300;
                        list($originalWidth, $originalHeight) = getimagesize($imagenContenidoRuta);
                        $newContentWidth = min($maxContentWidth, $originalWidth);
                        $newContentHeight = ($newContentWidth / $originalWidth) * $originalHeight;
                        ?>
                        <img src="<?php echo $imagenContenidoRuta; ?>" alt="Mascota web" class="img-fluid" style="width: 100%; max-width: <?php echo $maxContentWidth; ?>px; height: auto;">

                        <!-- Contenido de la tarjeta -->
                        <h6 class="card-title mt-3">
                            Conviértete en un hablante fluido <br> de inglés en Purrrfect Polyglot con <br> nuestras lecciones educativas.
                        </h6>

                        <!-- Botones centrados -->
                        <div class="d-grid gap-2 col-8 mx-auto mt-3">
                            <a href="./login.php" class="btn btn-primary btn-lg">Login</a>
                            <a href="./register.php" class="btn btn-secondary mt-2 btn-lg">Register</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include('templates/footer.php'); ?>

</body>

</html>

