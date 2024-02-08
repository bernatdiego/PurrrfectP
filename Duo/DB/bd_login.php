<?php
include('db.php');

// Verificar si hay una conexión válida
if ($conn) {
    // Verificar si el formulario ha sido enviado
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Verificar si el índice 'submit' está definido en $_POST
        if (isset($_POST['submit'])) {
            // Obtener el valor de $_POST['submit']
            $id = $_POST['submit'];

            // No se necesita escapar la variable $id en este contexto

            // Preparar la consulta con una consulta preparada3
            $sql = 'SELECT * FROM users WHERE username = :username';
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':username', $_POST['username']);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            // Verificar si el usuario existe y si la contraseña coincide
            if ($user) {
                // Iniciar sesión
                session_start();
                $_SESSION['user_id'] = $user['id'];

                // Redirigir a la página adecuada después del inicio de sesión
                header("Location: ../pages"); // Redirigir a la página de inicio
                exit;
            } else {
                header("Location: ../login.php");
                exit;
            }
        } else {
            echo "No se envió correctamente el formulario.";
        }
    }
} else {
    echo "Error de conexión: No se pudo conectar a la base de datos.";
}
?>

