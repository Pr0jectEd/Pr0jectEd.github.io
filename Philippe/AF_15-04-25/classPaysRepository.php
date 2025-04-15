<?php
declare(strict_types=1);

require_once 'classPays.php';

class PaysRepository {
    private string $servername = "mysql-projected.alwaysdata.net";
    private string $username = "projected_user";
    private string $password = "MYP455!!BD";
    private string $dbname = "projected_course_bge_bd";
    private PDO $pdo;

    public function __construct() {
        $this->pdo = new PDO(
            "mysql:host={$this->servername};dbname={$this->dbname};charset=utf8",
            $this->username,
            $this->password
        );
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function paysExiste(string $nom): bool {
        $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM pays WHERE nom_pays = ?");
        $stmt->execute([$nom]);
        return $stmt->fetchColumn() > 0;
    }

    public function insertPays(Pays $pays): void {
        $stmt = $this->pdo->prepare("INSERT INTO pays (nom_pays, continent, population) VALUES (?, ?, ?)");
        $stmt->execute([$pays->nom, $pays->continent, $pays->population]);
    }
}
