<?php
// Database connection settings
$host = 'localhost';
$dbname = 'dbcapstone';
$username = 'root';
$password = '';

// Function to connect to the database
function connectDB() {
    global $host, $dbname, $username, $password;

    try {
        $dsn = "mysql:host=$host;dbname=$dbname";
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ];

        // Create a PDO instance (connect to the database)
        $pdo = new PDO($dsn, $username, $password, $options);
        return $pdo;
    } catch (PDOException $e) {
        die("Database connection failed: " . $e->getMessage());
    }
}
?>
