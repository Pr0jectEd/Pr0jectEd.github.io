<?php
class Article
{
    private string $libelle;
    private float  $prixHt;
    private int $idTauxTva;
    private static array $Articles=[];

    public function __construct(string $oLibelle, float $oPrixHt, int $oIdTauxTva)
    {
        $this->libelle = $oLibelle;
        $this->prixHt = $oPrixHt;
        $this->idTauxTva = $oIdTauxTva;
        self::$Articles[] = $this;
    }

    public static function chargerArticle(int $idArticle, PDO $pdo)
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
    
/*             $articles[] = [
                'libelle' => $libelle,
                'prix_ht' => $prixHt,
                'id_taux_tva' => $idTauxTva,
            ]; */
        }
    
     /*    return $articles;  */
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

    public static function arrayOfArticles() {

        return self::$Articles;

        //INSERT INTO articles (libelle, prix_ht,id_taux_tva) VALUES ("Teclado",30,3),("Monitor",50,2);
    }

    public static function clearArticles(): void
    {
        self::$Articles = [];
    }

    public function __toString()
    {
        return "Libelle " . $this->libelle . "  Prix Hors taxes:" . $this->prixHt . " Id TVA" . $this->idTauxTva;
    }
    public function __destruct() {}
}
