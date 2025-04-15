<?php 
/* print_r($_POST); */
/* $name = $_POST["phrase"]; */
/* var_dump($_POST); */
/* echo "myName:".$name; */
/* foreach($_POST["fruits"] as $key => $value);
echo "My tableau".$value; */
/* print_r($_POST["fruits"]); */

/* for ($i=0; $i<count($_POST["fruits"]);$i++){
    echo $_POST["fruits"][$i]."\n";
} */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test</title>
</head>
<body>
    <?php 
    function createTable(){
        echo "<table>";
        for ($i=0; $i<count($_POST["fruits"]);$i++){
            echo "<tr>";

                echo "<td>".($i+1)."</td>"."<td>".$_POST["fruits"][$i]."</td>"; 
            
            echo "</tr>";
        }
        echo "</table>";

    }


    //createTable();
    function createTable2($arrayFruits){

        echo "function 2";
        echo "<table>";
        foreach($arrayFruits as $key => $values){
            echo "<tr>";
    
            echo "<td>".($key+1)."</td>"."<td>".$values."</td>"; 
        
        echo "</tr>";
        } 
        echo "</table>";
        
    }
    createTable2($_POST["fruits"]);
    ?>
</body>
</html>