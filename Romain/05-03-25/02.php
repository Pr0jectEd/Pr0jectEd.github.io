<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
    <?php 

//Style PHP:

$fruits = array ('ananas','pomme','pastec');



//Style JavaScript

$frutas = ['piña','manzana','sandia'];

//Asociative arrays:
$pentiums = [
    'P1' => 'Pentium 1',
    'P2' => 'Pentium 2',
    'P3' => 'Pentium 1',
    'P4' => 'Pentium 2',
];



?>

<p>print_r($fruits): <?php print_r($fruits); ?></p>
<p>count($fruits): <?php echo    count($fruits)."\n"; ?></p>
<p>print_r($frutas): <?php print_r($frutas);     ?></p>
<p>sizeof($frutas): <?php echo sizeof($frutas);      ?></p>
<p>print_r($pentiums):<?php print_r($pentiums)     ?></p>
<p>echo $fruits[0]:<?php echo $fruits[0];     ?></p>
<p>echo $frutas[2]<?php echo $frutas[2];     ?></p>
<?php  array_push($fruits,'banana')    ?>
<p>I add the banana item with array_push(array_push($fruits,'banana'))</p>
<p>print_r($fruits)<?php   print_r($fruits);   ?></p>
<?php sort($fruits);?>
<p>sort($fruits)<?php  print_r($fruits);    ?></p>
<?php rsort($fruits);?>
<p>rsort($fruits)<?php print_r($fruits);      ?></p>
<p>Push fresa, mandarina, mora <?php array_push($frutas, "fresa","mandarina","mora");      ?></p>
<p>Printing frutas:<?php print_r($frutas) ;     ?></p>
<p>Unshift mango <?php  array_unshift($frutas,"mango");     ?></p>
<p>Printing frutas<?php print_r($frutas);    ?></p>
<p><?php      ?></p>
<p><?php      ?></p>
<p><?php      ?></p>
<p><?php      ?></p>
<p><?php      ?></p>
<p><?php      ?></p>
<p><?php      ?></p>
<p><?php      ?></p>
<p><?php      ?></p>
<p><?php      ?></p>
<p><?php      ?></p>
<p><?php      ?></p>
<p><?php      ?></p>
<p><?php      ?></p>
<p><?php      ?></p>
<p><?php      ?></p>
<p><?php      ?></p>
<p><?php      ?></p>

    </div>

    
</body>
</html>
