<?php
$result = [];

// CONNECTION
if ($_SERVER['HTTP_HOST'] == "localhost") {
    // For localhost
    $dbPath = 'C:\xampp\htdocs\AD\Duo\DB\sqlLite\Purrrfect_Polyglot.sqlite'; // Replace with the actual path to your SQLite database file
} else {
    // For remote host
    $dbPath = 'path/to/dwesdatabase.db'; // Replace with the actual path to your SQLite database file
}

try {
    $conn = new PDO("sqlite:$dbPath");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Check the connection
    if (!$conn) {
        echo 'Error de conexión: No se pudo conectar a la base de datos.';
    }

    // Your further code goes here...

} catch (PDOException $e) {
    echo 'Error de conexión: ' . $e->getMessage();
}
?>
