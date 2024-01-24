<!DOCTYPE html>
<html lang="es">

<?php include('templates/header.php'); ?>
<?php include('DB/db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (
        isset($_POST['username']) &&
        isset($_POST['email']) &&
        isset($_POST['password']) &&
        isset($_POST['password2'])
    ) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password2 = $_POST['password2'];

        // Validaciones en el lado del servidor
        if (empty($username) || empty($email) || empty($password) || empty($password2)) {
            echo "Todos los campos son obligatorios.";
        } elseif (strlen($password) < 6) {
            echo "La contraseña debe tener al menos 6 caracteres.";
        } elseif ($password !== $password2) {
            echo "Las contraseñas no coinciden.";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "El formato del correo electrónico no es válido.";
        } else {
            // Llamo metodo Register
            registerUser($db, $username, $email, $password);
            header('Location: index.php');
            exit();
        }
    }
}
?>

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

                <form class="mx-1 mx-md-4" method="post" action="register.php" onsubmit="return validateForm()">

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" id="username" class="form-control" />
                      <label class="form-label" for="username">Your Name</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="email" id="email" class="form-control" />
                      <label class="form-label" for="email">Your Email</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="password" id="password" class="form-control" />
                      <label class="form-label" for="password">Password</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="password" id="password2" class="form-control" />
                      <label class="form-label" for="password2">Repeat your password</label>
                    </div>
                  </div>

                  <div class="form-check d-flex justify-content-center mb-5">
                    <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3c" />
                    <label class="form-check-label" for="form2Example3">
                      I agree all statements in <a href="#!">Terms of service</a>
                    </label>
                  </div>

                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button type="submit" class="btn btn-primary btn-lg">Register</button>
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
