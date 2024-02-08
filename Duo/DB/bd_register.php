<?php
include('db.php');

// Verificar si el formulario ha sido enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verificar si todos los campos del formulario están configurados
    if (
        isset($_POST['username']) &&
        isset($_POST['email']) &&
        isset($_POST['password']) &&
        isset($_POST['password2'])
    ) {
        // Obtener los valores del formulario
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
            // Consulta para verificar si el nombre de usuario ya existe
            $query = 'SELECT * FROM users WHERE username = :username';
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':username', $username);
            $stmt->execute();
            $existingUser = $stmt->fetch(PDO::FETCH_ASSOC);

            // Verificar si el nombre de usuario ya está en uso
            if ($existingUser) {
                echo "El nombre de usuario ya está en uso.";
            } else {
                // Insertar el nuevo usuario en la base de datos
                $query = 'INSERT INTO users (username, email, password) VALUES (:username, :email, :password)';
                $stmt = $conn->prepare($query);
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                $stmt->bindParam(':username', $username);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':password', $hashedPassword);
                $stmt->execute();

                // Loguear al usuario después del registro
                $loggedInUser = loginUser($conn, $username, $password);
                if ($loggedInUser) {
                    // Iniciar sesión exitosa, guardar información del usuario en la sesión
                    session_start();
                    $_SESSION['user_id'] = $loggedInUser['id'];
                    $_SESSION['username'] = $loggedInUser['username'];

                    // Redirigir al usuario a la página de inicio
                    header("Location: ../pages");
                    exit;
                } else {
                    echo "Error al intentar iniciar sesión después del registro.";
                }
            }
        }
    } else {
        echo "No se enviaron todos los campos del formulario.";
    }
}
?>
