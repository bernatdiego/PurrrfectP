<!DOCTYPE html>
<html lang="es">

<?php include('templates/header.php');?>
<?php include('DB/db.php');
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Validación en el lado del servidor
        if (empty($username) || empty($password)) {
            echo "Por favor, completa todos los campos.";
        } else {
            $loggedInUser = loginUser($db, $username, $password);

            if ($loggedInUser) {
                header('Location: index.php');
                exit();
            } else {
                echo "Error en el inicio de sesión. Credenciales incorrectas.";
            }
        }
    }
}
?>

<div class="container flow-text">
<body>
 
<section class="vh-100" style="background-color: #4498ee;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">
        <div class="card" style="border-radius: 1rem;">
          <div class="row g-0">
            <div class="col-md-6 col-lg-5 d-none d-md-block">
              <img src="img/homePage.png"
                alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem; width: 100%;" />
            </div>
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">

                <form method="post" action="login.php" onsubmit="return validateForm()">

                  <div class="d-flex align-items-center mb-3 pb-1">
                    <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                    <span class="h1 fw-bold mb-0">Logo</span>
                  </div>

                  <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h5>

                  <div class="form-outline mb-4">
                    <input type="text" id="username" class="form-control form-control-lg" />
                    <label class="form-label" for="username">Username</label>
                  </div>

                  <div class="form-outline mb-4">
                    <input type="password" id="password" class="form-control form-control-lg" />
                    <label class="form-label" for="password">Password</label>
                  </div>

                  <div class="pt-1 mb-4">
                    <button class="btn btn-dark btn-lg btn-block" type="submit">Login</button>
                  </div>

                  <a class="small text-muted" href="#!">Forgot password?</a>
                  <p class="mb-5 pb-lg-2" style="color: #393f81;">Don't have an account? <a href="./register.php"
                      style="color: #393f81;">Register here</a></p>
                  <a href="#!" class="small text-muted">Terms of use.</a>
                  <a href="#!" class="small text-muted">Privacy policy</a>
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

</body>
<script>
    function validateForm() {
        var username = document.getElementById("username").value;
        var password = document.getElementById("password").value;

        if (username.trim() === "" || password.trim() === "") {
            alert("Por favor, completa todos los campos.");
            return false;
        }

        return true;
    }
</script>

<?php include('templates/footer.php');?>