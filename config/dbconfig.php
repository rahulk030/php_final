<?php
// Database connection parameters
$host = 'localhost:3308';
$username = 'root';
$password = '';
$databaseName = 'accounts';

// Establish a database connection
try {
    $pdo = new PDO("mysql:host=$host;dbname=$databaseName", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}
?>
