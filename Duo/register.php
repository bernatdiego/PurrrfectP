<!DOCTYPE html>
<html lang="es">
<link rel="stylesheet" href="css/register.css">
<?php include('./templates/header.php');
// Comprobar si hay una sesión iniciada
if (isset($_SESSION['user_id'])) {
  // Redirigir a asignaturas.php si hay una sesión iniciada
  header('Location: ./pages');
  exit();
}?>

<div class="container flow-text">
    <body>

    <section class="vh-100" style="background-color: #eee;">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>

                <form class="mx-1 mx-md-4" method="post" action="./DB/bd_register.php" onsubmit="return validateForm()">

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <label class="form-label" for="username">Your Name</label>
                      <input type="text" id="username" name="username" class="form-control" />
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <label class="form-label" for="email">Your Email</label>
                      <input type="email" id="email" name="email" class="form-control" />
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <label class="form-label" for="password">Password</label>
                      <input type="password" id="password" name="password" class="form-control" />
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <label class="form-label" for="password2">Repeat your password</label>
                      <input type="password" id="password2" name="password2" class="form-control" /> 
                    </div>
                  </div>

                  <div class="form-check d-flex justify-content-center mb-5">
                      <label class="form-check-label d-flex align-items-center" for="form2">
                          <span>I agree all statements in <a href="#!">Terms of service</a></span>
                          <input class="form-check-input me-2" type="checkbox" value="" id="form2" />
                      </label>
                  </div>

                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button type="submit" name="submit" value="submit" class="btn btn-primary btn-lg">Register</button>
                  </div>

                  <!-- Mensajes de error -->
                  <div id="usernameError" class="text-danger"></div>
                  <div id="emailError" class="text-danger"></div>
                  <div id="passwordError" class="text-danger"></div>
                  <div id="password2Error" class="text-danger"></div>

                </form>

              </div>
              <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/draw1.webp"
                  class="img-fluid" alt="Sample image">

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

        <script>
            function validateForm() {
                var username = document.getElementById("username").value;
                var email = document.getElementById("email").value;
                var password = document.getElementById("password").value;
                var password2 = document.getElementById("password2").value;

                // Restablece los mensajes de error
                document.getElementById("usernameError").innerHTML = "";
                document.getElementById("emailError").innerHTML = "";
                document.getElementById("passwordError").innerHTML = "";
                document.getElementById("password2Error").innerHTML = "";

                var isValid = true;

                if (username.trim() === "") {
                    document.getElementById("usernameError").innerHTML = "Nombre de usuario no puede estar vacío.";
                    isValid = false;
                }

                if (!email.includes("@")) {
                    document.getElementById("emailError").innerHTML = "El formato del correo electrónico no es válido.";
                    isValid = false;
                }

                if (password.length < 6) {
                    document.getElementById("passwordError").innerHTML = "La contraseña debe tener al menos 6 caracteres.";
                    isValid = false;
                }

                if (password !== password2) {
                    document.getElementById("password2Error").innerHTML = "Las contraseñas no coinciden.";
                    isValid = false;
                }

                return isValid;
            }
        </script>

    <?php include('templates/footer.php'); ?>
</html>
