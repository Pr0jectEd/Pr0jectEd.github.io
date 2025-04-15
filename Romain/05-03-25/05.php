<?php 

function stars (){
   
    for ($i = 0; $i <=10; $i++){
        for ($j = 0; $j<=10; $j++){
            echo "*";
        }
        echo " <br>";
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p><?php stars(); ?></p>
</body>
</html>