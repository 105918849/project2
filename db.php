<?php
// Configuration variables
$host = 'localhost';
$db   = 'contributors'; // create a database called this, add 4 columns
$user = 'root'; // your user ID
$pass = ''; // Default XAMPP password is empty
$charset = 'utf8mb4';

// Data Source Name configuration
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

// Options for secure and accurate error processing
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
     $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
     throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
?>