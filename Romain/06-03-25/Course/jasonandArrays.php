<?php

$myArray = ["apple", "banana", "cherry", 1, 2, true];
$jsonString = json_encode($myArray);
$toJSON = json_decode($jsonString);

echo "Type of \$jsonString: " . gettype($jsonString) . "\n";
echo $jsonString . "\n";
echo "Type of \$toJSON: " . gettype($toJSON) . "\n";
print_r($toJSON); // 

$age = array("Peter"=>35, "Ben"=>37, "Joe"=>43);

$age2 =json_encode($age);
echo json_encode($age);


?>