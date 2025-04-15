<?php
$name = $_POST["phrase"];
$nameExploded = explode(" ",$name);
$fruits = isset($_POST["fruits"]) ? $_POST["fruits"] : [];
$fruits = array_merge($fruits,$nameExploded);

sort($fruits);

$data = [
    'user' => $name,
    'fruits' => $fruits,
];

header('Content-Type: application/json');
echo json_encode($data);
?>