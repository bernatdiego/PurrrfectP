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
<link rel="stylesheet" href="../css/cards.css">
<body class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <section class="d-flex justify-content-center">
        <!--//Listado de Cards-->
        <div class="container">
        <div class="card neon-effect">
            <div class="content">
                <h2>Grammar</h2>
                <a href="./grammar.php">Grammar</a>
            </div>
        </div>
        <div class="card neon-effect">
            <div class="content">
                <h2>Listening</h2>
                <a href="./listening.php">Listening</a>
            </div>
        </div>
        <div class="card neon-effect">
            <div class="content">
                <h2>Reading</h2>
                <a href="./reading.php">Reading</a>
            </div>
        </div>
        <div class="card neon-effect">
            <div class="content">
                <h2>Speaking</h2>
                <a href="./speaking.php">Speaking</a>
            </div>
        </div>
        <div class="card neon-effect">
            <div class="content">
                <h2>Vocabulary</h2>
                <a href="./vocabulary.php">Vocabulary</a>
            </div>
        </div>
    </div>
    </section>
</body>
</html>
<?php include('./templates/footer.php'); ?>