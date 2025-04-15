<?php
/* $wordToSearch = $_POST['word'];
$langueSelection =$_POST['translation_direction'];
echo $wordToSearch;
echo "<br>";
echo $langueSelection; */
$data = $_POST["word"]." We have used PHP!!! and POST to get here";
header('Content-Type: application/json');//I was missing this line
echo json_encode($data);

/* $dictionary = [
    'cat' => 'chat',
    'dog' => 'chien',
    'bird' => 'oiseau',
    'bunny' => 'lapin',
]; */
?>