<?php
$name = $_POST["phrase"];
$nameExploded = explode(" ",$name);
$fruits = isset($_POST["fruits"]) ? $_POST["fruits"] : []; // Check if fruits array exists
$fruits = array_merge($fruits,$nameExploded);

sort($fruits);

$data = [
    'user' => $name,
    'fruits' => $fruits,
];

header('Content-Type: application/json'); // Set the correct content type
echo json_encode($data);
?>
