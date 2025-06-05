<?php

$host = 'localhost';
$dbname = 'myfirstdatabase'; // name of database in sql
$dbusername = 'root';
$dbpassword = '';

try {
    //code...
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $dbusername,
    $dbpassword); // connection string to SQL
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // throw exception
    die("Connection Failed: " . $e->getMessage()); // terminates the script if something goes wrong
}