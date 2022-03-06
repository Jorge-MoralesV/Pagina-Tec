<?php
$server = 'localhost:3306';
$username = 'root';
$password = '';
$database = 'database_tec';

try {
    $conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
} catch (PDOException $e) {
    die('Connected failed: ' . $e->getMessage());
}