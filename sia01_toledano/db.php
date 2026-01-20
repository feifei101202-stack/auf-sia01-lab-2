<?php
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'sia01_toledano';

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    error_log('DB_CONNECTION_FAILED: ' . mysqli_connect_error());
    die('Database connection error: ' . mysqli_connect_error());
}

mysqli_set_charset($conn, 'utf8mb4');
error_log('DB_CONNECTION_SUCCESS: Connected to database ' . $database);
?>