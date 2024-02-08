<?php
session_start();

// Verificar si la variable de sesión 'user_id' está establecida
if (isset($_SESSION['user_id'])) {
    // El usuario está iniciado sesión
    include('./templates/header.php');
}
?>

<?php
include('../DB/db.php');
?>
<!DOCTYPE html>
<html lang="es">
<body class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <section>
        <!-- Contenido de tu sección aquí -->
        <!--//Listado de Cards-->
    </section>
</body>
</html>
<?php include('./templates/footer.php'); ?>