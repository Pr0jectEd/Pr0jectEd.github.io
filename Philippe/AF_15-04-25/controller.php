<?php

declare(strict_types=1);

require_once 'classPays.php';
require_once 'classPaysRepository.php';
require_once 'classPaysException.php';

// Enable error reporting for development (remove in production)
/* ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL); */

header('Content-Type: application/json');

$data = json_decode(file_get_contents('php://input'), true);

$pName = $data['pName'] ?? null;
$continent = $data['continent'] ?? null;
$population = $data['population'] ?? null;


$paysInterdits = [
    'Uruguay', 'Italy', 'Germany', 'Brazil', 'England',
    'Argentina', 'France', 'Spain'
];

echo json_encode([
    "message" => "resultado exitoso",
    "color" => "green"

]);



/* 
try {
    if (in_array($pName, $paysInterdits)) {
        throw new PaysException("Pays $pName non autorisé", "orange");
    }

    $repo = new PaysRepository();

    if ($repo->paysExiste($pName)) {
        throw new PaysException("Pays $pName déjà inséré", "red");
    }

    $pays = new Pays($pName, $continent, $population);
    $repo->insertPays($pays);

    echo json_encode([
        "message" => "Pays $pName inséré avec succès",
        "color" => "green"
    ]);

} catch (PaysException $e) {
    echo json_encode([
        "message" => $e->getMessage(),
        "color" => $e->color
    ]);
} catch (Exception $e) {
    echo json_encode([
        "message" => "Erreur serveur: " . $e->getMessage(),
        "color" => "black"
    ]);
}  */

?>