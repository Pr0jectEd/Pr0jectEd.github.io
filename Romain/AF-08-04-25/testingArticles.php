<?php
function chargerArticle(int $idArticle, PDO $pdo)
{
    $stmt = $pdo->query("SELECT libelle, prix_ht, id_taux_tva FROM articles WHERE id_article = $idArticle ");
    $articles = []; // tableau vide

    foreach ($stmt as $row) {
        $libelle = $row['libelle'];
        $prixHt = $row['prix_ht'];
        $idTauxTva = $row['id_taux_tva'];

        echo "Libellé: " . $libelle . "<br />";
        echo "Prix HT: " . $prixHt . "<br />";
        echo "ID Taux TVA: " . $idTauxTva . "<br /><br />";

        // store rows as an associative array:
        $articles[] = [
            'libelle' => $libelle,
            'prix_ht' => $prixHt,
            'id_taux_tva' => $idTauxTva,
        ];
    }

    return $articles; 
}
?>