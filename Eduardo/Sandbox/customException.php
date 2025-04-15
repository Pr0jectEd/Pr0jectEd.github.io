<?php
/*
* Exception spécialisée/gestion de code d'erreurs
* CDC 

Je jette un dé sans arrêt (jusqu'à ce que j'ai 6 auquel cas, c'est fini!)
S'il est pair je considère que c'est une erreur grave, sinon un warning.
L'erreur doit être affichée à l'écran (rouge pour erreur, orange pour warning) et est de plus stockée dans un fichier de log (log.txt) 
comportant la date courante.

Bonus: le libellé des messages est externe au fichier php (dans un fichier de propriétés)

* Exigence: 
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
class SpecificDieException extends Exception {
    private string $mess = "";
    private bool $grav = true;

    private static $fd = null;  // on ouvre le fichier une seule fois dans l'application

    public function __construct(bool $gravity, string $mess) {
        $this->mess= $mess;
        $this->grav = $gravity;
    }

    public function handle() {
        $col = (! $this->grav) ? "orange" : "red";
        echo "<p style='background-color: {$col}';>{$this->mess}</p>";
        $this->manageLogFile();
    }

    private function manageLogFile() : void {
        if (self::$fd == null){
            self::$fd = fopen("log.txt", "a");  // en mode append
            fwrite(self::$fd, "\nLOG du: " . date("Y-m-d H:i:s") . "\n");
        }
        fwrite(self::$fd, $this->mess . "\n");

    }

}
class SpecificDie {
    private array $errMessages;

    public function __construct() {
        try {
            $this->loadMessages();
            echo "Messages chargés<BR/>";
        }
        catch(Exception $e) {   // je traite l'exception ici
            echo $e;
            exit();             
        }
    }
    
    public function run() {
        for (;;) {
            $val = $this->draw();
            if ($val === 6) {
                echo "6: Fin!<BR/>";
                exit();
            }
            try {
                if ($val % 2 === 0)   // je propage
                    throw new SpecificDieException(True, $this->errMessages[100] . $val);
                else
                    throw new SpecificDieException(False, $this->errMessages[200]. $val);
            }
            catch (SpecificDieException $sExc) {
                $sExc->handle();
            }

        }
    }

    private function draw(): int {
        return rand(1, 6);

    }
    private function loadMessages() : void {
        $this->errMessages = parse_ini_file("11.2.1.conf.ini");
        if (count($this->errMessages) == 0)
            throw new Exception("Impossible de charger les messages... Fin!<BR/>");
    }
}
// main
$myDie = new SpecificDie();
$myDie->run();
exit();