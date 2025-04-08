<?php
require 'connection.php'; 

$libelle="tour intel";
$prix_ht=700.50;
$id_taux_tva=3;
try{

$stmt= $pdo->prepare('INSERT INTO articles (libelle, prix_ht, id_taux_tva) VALUES (?, ?, ?);');
$success = $stmt->execute([$libelle,$prix_ht,$id_taux_tva]);
if ($success){
    $lastIndexed = $pdo->lastInsertId();
    echo "Id du derniere element indexé:".$lastIndexed;
} else {
    echo "Transaction pas possible";
}


} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

//INSERT INTO articles (libelle, prix_ht, id_taux_tva) VALUES ("Clavier", 50.00, 3);
?>