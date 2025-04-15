<?php
header('Content-Type: application/json');//I was missing this line<
$dictionary = [
    'cat' => 'chat',
    'dog' => 'chien',
    'bird' => 'oiseau',
    'bunny' => 'lapin',
];

$data = $_POST["word"]." Here is the direction of your translation ".$_POST["translation_direction"];
echo json_encode($data);
?>