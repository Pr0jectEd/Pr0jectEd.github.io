<?php
$host = "localhost";
$dbname = "sujet1";
$username = "root";  
$password = "";      

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//ici je ratrappe ma requete pour la BD.
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}
?>
