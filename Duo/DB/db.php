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

function createTableLevels($db){
    $sql = "CREATE TABLE IF NOT EXISTS niveles (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        nombre TEXT UNIQUE,
        respuestasT INTEGER
    )";
    $db->exec($sql);
}

function createTableLessons($db){
    $sql = "CREATE TABLE IF NOT EXISTS temas (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        nombre TEXT UNIQUE
    )";
    $db->exec($sql);
}

function createTableScores($db) {
    $sql = "CREATE TABLE IF NOT EXISTS puntuacion (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        user_id INTEGER,
        nivel_id INTEGER,
        tema_id INTEGER,
        correctas INTEGER,
        FOREIGN KEY(user_id) REFERENCES users(id),
        FOREIGN KEY(tema_id) REFERENCES temas(id),
        FOREIGN KEY(nivel_id) REFERENCES niveles(id)
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

// CONNECTION
if ($_SERVER['HTTP_HOST'] == "localhost") {
    // For localhost
    $dbPath = 'C:\xampp\htdocs\AD\Duo\DB\sqlLite\Purrrfect_Polyglot.sqlite'; // Replace with the actual path to your SQLite database file
} else {
    // For remote host
    $dbPath = 'path/to/dampp.db'; // Replace with the actual path to your SQLite database file
}

try {
    $conn = new PDO("sqlite:$dbPath");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Check the connection
    if (!$conn) {
        echo 'Error de conexión: No se pudo conectar a la base de datos.';
    }

    // Crear tablas si no existen
    createTableUsers($conn);
    createTableLevels($conn);
    createTableScores($conn);
    createTableLessons($conn);

    // Ejemplo de registro de usuario
    //registerUser($conn, 'carlos123', 'carlos@gmail.com', '123456');

    // Ejemplo de inicio de sesión
    //$loggedInUser = loginUser($conn, 'carlos123', '123456');
    
    if (isset($loggedInUser) && $loggedInUser) {
        echo "Inicio de sesión exitoso. Usuario: " . $loggedInUser['username'];
    } else {
        //echo "Error en el inicio de sesión. Credenciales incorrectas.";
    } 
} catch (PDOException $e) {
    echo 'Error de conexión: ' . $e->getMessage();
}
?>

