<?php
require 'connection.php'; 


try{
$articles=[];
$sql = "SELECT * FROM articles ;";
$res = $pdo->query($sql);
foreach( $res as $row ) {
    $articles[] =$row['libelle'];
    print_r($articles);
//echo $row['libelle'] . "<br />";
}


} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>