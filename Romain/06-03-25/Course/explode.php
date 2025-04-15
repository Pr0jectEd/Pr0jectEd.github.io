<?php
// Example 1
$pizza  = "piece1 piece2 piece3 piece4 piece5 piece6";
$pieces = explode(" ", $pizza);
//echo $pieces[0]; // piece1
//echo $pieces[1]; // piece2

// Example 2
$data = "foo:*:1023:1000::/home/foo:/bin/sh";
list($user, $pass, $uid, $gid, $gecos, $home, $shell) = explode(":", $data);
echo $user; // foo
echo $pass; // *

$myString ="This is / a test / in which / I am / putting examples";
$answer = explode("/",$myString);
list($item1, $item2,$item3,$item4,$item5) = explode("/",$myString);

$info = array('coffee', 'brown', 'caffeine');
list($drink, $color, $power) = $info;
echo "$drink is $color and $power makes it special.\n";



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>Chaine de characters: <?php echo $pizza ?></p>
    <p>Tableau: <?php print_r($pieces);?></p>
    <p>String myString: <?php echo $myString  ?></p>   
    <p>Array Answer: <?php print_r($answer);   ?></p>
    <p>Array info: <?php print_r($info)?></p>
    <p>Elements+Concatenation <?php echo "$drink is $color and $power makes it special.\n"; ?></p>
    <p><?php ?></p>
    <p><?php ?></p>
    <p><?php ?></p>
    <p><?php ?></p>
    <p><?php ?></p>
    <?php 

function createTable1($Array,$name){
    echo __FUNCTION__;
    
    echo "<table>";
    echo " <tr><th>Index</th><th>$name</th></tr>";
    for ($i=0; $i<count($Array);$i++){
        echo "<tr>";
        
            echo "<td>".($i+1)."</td>"."<td>".$Array[$i]."</td>"; 
        
        echo "</tr>";
    }
    echo "</table>";

}
        function createTable2($Array,$name){
            echo __FUNCTION__;
            
           sort($Array);
            echo "<table>";
            echo " <tr><th>Index</th><th>$name</th></tr>";
            for ($i=0; $i<count($Array);$i++){
                echo "<tr>";
                
                    echo "<td>".($i+1)."</td>"."<td>".$Array[$i]."</td>"; 
                
                echo "</tr>";
            }
            echo "</table>";
    
        }


        createTable2($pieces,"pieces");
        createTable1($answer,"answer");
    
    ?>
</body>
</html>