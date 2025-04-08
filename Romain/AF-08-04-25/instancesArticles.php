<?php
require 'classeArticle.php'; 
require 'connection.php';
$article1 = new Article("souris gokeda",30,1);
$article2 = new Article("clavier gokeda",50,1);
$article3 = new Article("monitor gokeda",30,1);
//$article1->enregistrerArticle($pdo);//Ajouter un nouvel Article.
echo"<br>";
//echo Article::supprimerArticle(12,$pdo);//Suprimer un Article.
echo"<br> My first article:<br>";
echo $article1->__toString();
echo"<br>";
echo"My instance:<br>";
print_r(Article::chargerArticle(10,$pdo)) ;//Instancer Object avec ID
echo"<br> My libelle modification:";
echo Article::modifierLibelleArticle(14,"Mouse logitech",$pdo);// Mettre a jour le libellé
echo"<br>";
print_r(Article::arrayOfArticles());


?>