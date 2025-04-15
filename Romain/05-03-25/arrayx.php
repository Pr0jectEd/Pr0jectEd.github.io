<?php
$phrase = $_POST['phrase'];
error_log("Recu : " . $phrase);
$arrayToDisplay = [];
$split = explode(" ", $phrase);
foreach ($split as $mot) {
array_push($arrayToDisplay, $mot);
error_log("Ajoute mot : " . $mot);
}
$fruits = $_POST['fruits'];
foreach ($fruits as $fruit) {
array_push($arrayToDisplay, $fruit);
error_log("Ajoute fruit " . $fruit);
}
sort($arrayToDisplay);
foreach($arrayToDisplay as $mot) {
echo $mot . "<br>";
}
?>