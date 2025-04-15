<?php

if(file_exists('users.txt'))
{
    // Si le fichier existe, on charge le JSON qu'il contient et on le décode en tableau PHP    
    $tabUsers = json_decode(file_get_contents('users.txt')) ;
}
else
{
    // Sinon on initialise un tableau vide
    $tabUsers = array() ;
}

// Si on a un paramètre nom et un paramètre prenom dans l'URL
if(isset($_GET['nom']) and isset($_GET['prenom']))
{
    // On ajoute au tableau
    $tabUsers[] = array(strtoupper($_GET['nom']), strtolower($_GET['prenom'])) ;
}

// On encode le tableau en JSON
$json = json_encode($tabUsers) ;

// On met le JSON dans le fichier
file_put_contents('users.txt', $json) ;

// On affiche le JSON
echo $json ;

?>