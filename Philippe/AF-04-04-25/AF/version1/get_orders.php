<?php
session_start();
require_once "config.php";

header("Content-Type: application/json");

if (!isset($_SESSION['usuario_id'])) {
    echo json_encode([]);
    exit;
}

$user_id = $_SESSION['usuario_id'];

$stmt = $pdo->prepare("SELECT titulo, contenido, fecha_publicacion FROM articulos WHERE id_usuario = ? ORDER BY fecha_publicacion DESC");
$stmt->execute([$user_id]);
$articles = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($articles);
?>