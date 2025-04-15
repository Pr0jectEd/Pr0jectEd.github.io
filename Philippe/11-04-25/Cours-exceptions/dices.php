
<?php

/* # DWWM2411
* Exception spécialisée/gestion de code d'erreurs
* CDC
Je jette un dé sans arrêt (jusqu'à ce que j'ai 6 auquel cas, c'est fini!)
S'il est pair je considère que c'est une erreur grave, sinon un warning.
L'erreur doit être affichée à l'écran (rouge pour erreur, orange pour warning) et est de plus stockée dans un fichier de log (log.txt)
comportant la date courante.

Bonus: le libellé des messages est externe au fichier php (dans un fichier de propriétés)

* Exigences:
- POO
- une classe d'exception spécifique

* technique
- exception spécialisée:
class DieException extends Exception {
}
- fichier de propriétés (si Bonus): les messages d'erreur sont dans un fichier de propriétés
avec la fonction php: parse_ini_file,
on peut lire un fichier de propriétés, ex: "conf.ini", dont la structure est:
; Les commentaires commencent par ';'
code1 = ERREUR dé=
code2 = WARNING dé=
...
code:
$errorMessages = parse_ini_file("conf.ini");
dans $errorMessages["code1"] j'ai "ERREUR dé="
- la date courante: cf php.net, date()

* rendu fichier log.txt:
2025/04/11 14:00:23 ERREUR dé=4
2025/04/11 14:00:35 WARNING dé=1
*/
class DieThrowing
{

    private int $throwing;

    public function __construct() {}

    public function throwDie()
    {
        $value = rand(1, 6);

        if ($value == 4) {
            throw new Exception("Planté: au rincage <br>");
        }
    }

    public function exec()
    {
        try {
            $this->throwDie();
        } catch (Exception $err) {
            echo $err->getMessage();
        }
    }
}



class CustomException extends Exception
{
    // exception spécialisée, hérite de l'exception standard
    public function myCustomMessage()
    { // rajoute une nouvelle méthode
        $errorMsg = 'Erreur à la ligne: ' . $this->getLine() .
            ', fichier: ' . $this->getFile() . ': <b>' . $this->getMessage() .
            '</b> ne peut pas être un diviseur';
        return $errorMsg;
    }
}

$throw1 = new DieThrowing();
$throw1->exec();
?>