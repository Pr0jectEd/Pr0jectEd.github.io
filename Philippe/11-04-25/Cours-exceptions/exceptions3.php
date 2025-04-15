<?php
declare(strict_types=1);

function fct3($a, $b) {
    $tab = [1, 2, 3, 4];
    if ($a > 4 || $b > 4) {
        throw new Exception("BGE: indices incorrects");
    }
    return $tab[0];
}

function fct2($a, $b) : float {
    if ($b == 0) {
        throw new Exception("BGE: interdit de diviser par 0");
    }
    fct3($a, $b);
    if ($a / $b < 2) {
        throw new Exception("BGE: division trop petite");
    }
    return $a / $b;
}

function fct($a, $b){
    return fct2($a, $b);
}

// main: a scenario!
// CDC le résultat de la division doit être > 2?

$a = 3; 
$b = 2;

try {
    $c = fct($a, $b);
    echo $c;
} catch (Exception $err) {
    echo $err->getMessage();
}

exit();