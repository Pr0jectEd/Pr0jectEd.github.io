<?php
function add($a, $b) { return floatval($a) + floatval($b); }
function subtract($a, $b) { return floatval($a) - floatval($b); }
function multiply($a, $b) { return floatval($a) * floatval($b); }
function divide($a, $b) { 
    if ($b == 0) {
        return "Division par zéro impossible";
    }
    return floatval($a) / floatval($b); 
}

$expression = isset($_POST['expression']) ? $_POST['expression'] : '';

// Validation et exécution de l'expression (à améliorer pour la sécurité)
$result = eval('return ' . $expression . ';');

echo $result;
?>