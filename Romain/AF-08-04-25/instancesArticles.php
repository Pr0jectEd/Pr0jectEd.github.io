<?php
require 'classeArticle.php'; 
require 'connection.php';
$article1 = new Article("souris gokeda",30,1);
//$article1->enregistrerArticle($pdo);//Ajouter un nouvel Article.
echo"<br>";
//echo Article::supprimerArticle(12,$pdo);//Suprimer un Article.
echo"<br>";
//echo $article1->__toString();
echo"<br>";
echo Article::chargerArticle(10,$pdo);//Instancer Object avec ID
echo"<br>";
echo Article::modifierLibelleArticle(14,"Mouse logitech",$pdo);// Mettre a jour le libellé

?>