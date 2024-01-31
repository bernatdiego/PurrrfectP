<!DOCTYPE html>
<html lang="es">
<?php include('DB/db.php');?>
<?php include('templates/header.php');?>
<link rel="stylesheet" href="css/login.css">
    <div class="container flow-text">
    <body>

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
        <img src="./img/logoMini.jpg"  alt="Purrrfect Polyglot" class="img-thumbnail" style="width: 50px; height: 50px;">
        Purrrfect Polyglot
        </div>
        <div class="card-body d-flex align-items-center">
          <!-- Imagen a la izquierda -->
          <img src="./img/homePage.png" alt="Mascota web" style="width: 300px; height: 350px;" class="mr-3">

            <div class="flex-column">
            <!-- Contenido de la tarjeta -->
            <div>
                <h6 class="text-center"><p>Conviértete en un hablante fluido <br> de inglés en Purrrfect Polyglot con <br> nuestras lecciones educativas.</p></h6>
            </div>

            <!-- Botones a la derecha -->
            <div class="d-grid gap-2 col-6 mx-auto">
              <a href="./login.php" class="btn btn-primary btn-lg">Login</a>
              <a href="./register.php" class="btn btn-secondary ml-2 btn-lg">Register</a>
            </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>

</body>

<?php include('templates/footer.php');?>

</html>