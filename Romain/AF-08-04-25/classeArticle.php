<?php
class Article
{
    private string $libelle;
    private float  $prixHt;
    private int $idTauxTva;

    public function __construct(string $oLibelle, float $oPrixHt, int $oIdTauxTva)
    {
        $this->libelle = $oLibelle;
        $this->prixHt = $oPrixHt;
        $this->idTauxTva = $oIdTauxTva;
    }

    public static function chargerArticle(int $idArticle, PDO $pdo)
    {
        
        

        $stmt = $pdo->query("SELECT * FROM articles WHERE id_article = $idArticle ");
        foreach ($stmt as $row) {
            $articles[] = $row['libelle'];
            //print_r($articles);
            echo $row['libelle'] . "<br />";
        }
    }

    public function enregistrerArticle($pdo) {

        try{

            $stmt= $pdo->prepare('INSERT INTO articles (libelle, prix_ht, id_taux_tva) VALUES (?, ?, ?);');
            $success = $stmt->execute([$this->libelle,$this->prixHt,$this->idTauxTva]);
            if ($success){
                $lastIndexed = $pdo->lastInsertId();
                echo "Id du derniere element indexé:".$lastIndexed;
            } else {
                echo "Transaction pas possible";
            }
            
            
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
    }

    private function enregistrerArticles() {}

    public static function modifierLibelleArticle(int $idArticle, string $iLibelle,PDO $pdo) {

        try {

            $stmt = $pdo->prepare("UPDATE articles SET libelle = :libelle WHERE id_article = :id_article ");
            $stmt->bindParam(":libelle",$iLibelle, PDO::PARAM_STR);
            $stmt->bindParam(":id_article",$idArticle, PDO::PARAM_INT);
            $success = $stmt->execute();
            if ($success) {
                echo "Element $idArticle modifié ";
            } else {
                echo "Transaction pas possible";
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

        //UPDATE articles SET libelle = 'Mouse logitech' WHERE id_article = 14; 
    }

    public static function supprimerArticle(int $idArticle, PDO $pdo) {

        try {

            $stmt = $pdo->prepare("DELETE FROM articles WHERE id_article = $idArticle ");
            $success = $stmt->execute();
            if ($success) {
                echo "Element $idArticle efface ";
            } else {
                echo "Transaction pas possible";
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function __toString()
    {
        return "Libelle " . $this->libelle . "  Prix Hors taxes:" . $this->prixHt . " Id TVA" . $this->idTauxTva;
    }
    public function __destruct() {}
}
