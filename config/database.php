<?php
$host = "www.9ne3etmisr.com";
$db   = "formal";
$user = "admin";
$pass = "Gpckareemdata@9287";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    echo json_encode(["status" => false, "message" => "Database connection failed"]);
    exit;
}