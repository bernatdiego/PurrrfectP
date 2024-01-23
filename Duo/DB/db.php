<?php
function createTableUsers($db) {
    $sql = "CREATE TABLE IF NOT EXISTS users (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        username TEXT UNIQUE,
        email TEXT UNIQUE,
        password TEXT
    )";

    $db->exec($sql);
}

function registerUser($db, $username, $email, $password) {
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO users (username, email, password) VALUES (:username, :email, :password)";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':password', $hashedPassword, PDO::PARAM_STR);
    $stmt->execute();
}

function loginUser($db, $username, $password) {
    $sql = "SELECT * FROM users WHERE username = :username";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        return $user; // Usuario autenticado correctamente
    } else {
        return null; // Autenticación fallida
    }
}
//Funcion tabla
//Bernat y sus formularios

try {
    $dbPath = 'C:\xampp\htdocs\AD\Duo\DB\sqlLite\Purrrfect_Polyglot.sqlite';
    $db = new PDO("sqlite:$dbPath");

    createTableUsers($db);

    // Ejemplo de registro de usuario
    //registerUser($db, 'carlos123', 'carlos@gmail.com', '123456');

    // Ejemplo de inicio de sesión
    //$loggedInUser = loginUser($db, 'carlos123', '123456');
    
    if (isset($loggedInUser) && $loggedInUser) {
        echo "Inicio de sesión exitoso. Usuario: " . $loggedInUser['username'];
    } else {
        echo "Error en el inicio de sesión. Credenciales incorrectas.";
    } 
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
