<?php
require 'connection.php'; 

$libelle="'monitor VGA'";//Double cotes et guimelles aussi pour le SQL.
$prix_ht="450";
$id_taux_tva =3;
try{
$sql = "INSERT INTO articles (libelle, prix_ht, id_taux_tva) VALUES ($libelle, $prix_ht, $id_taux_tva);";
$res = $pdo->exec($sql);
//echo  $pdo::lastInsertId($libelle);
$lastIndexed = $pdo->lastInsertId();
echo "Id du derniere element indexé:".$lastIndexed;



} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

//INSERT INTO articles (libelle, prix_ht, id_taux_tva) VALUES ("Clavier", 50.00, 3);
?>