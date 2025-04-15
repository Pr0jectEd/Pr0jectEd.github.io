<?php
require_once 'DieException.php';

class DiceGame {
    private array $errorMessages;
    private string $logFile = 'log.txt';

    public function __construct(string $confFile) {
        $this->errorMessages = parse_ini_file($confFile);
        
        if ($this->errorMessages === false) {
            throw new Exception("Erreur lors du chargement du fichier de configuration: $confFile");
        }
    }

    public function rollUntilSix() {
        do {
            $value = rand(1, 6);

            if ($value === 6) {
                echo "🎉 Dé = 6. Fin du jeu !<br>";
                break;
            }

            try {
                if ($value % 2 === 0) {
                    // Erreur grave
                    $this->handleError("code1", $value, "error");
                } else {
                    // Avertissement
                    $this->handleError("code2", $value, "warning");
                }
            } catch (DieException $e) {
                $this->logError($e->getMessage());
                $this->displayMessage($e->getMessage(), $e->getSeverity());
            }

            sleep(1); // Optionnel, pour ralentir la boucle
        } while (true);
    }

    private function handleError(string $code, int $value, string $severity) {
        $message = $this->errorMessages[$code] . $value;
        throw new DieException($message, $severity);
    }

    private function logError(string $message) {
        $date = date("Y/m/d H:i:s");
        file_put_contents($this->logFile, "$date $message" . PHP_EOL, FILE_APPEND);
    }

    private function displayMessage(string $message, string $severity) {
        $color = $severity === 'error' ? 'red' : 'orange';
        echo "<p style='color: $color;'>$message</p>";
    }
}
?>
