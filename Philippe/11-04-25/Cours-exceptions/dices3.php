<?php

class DieException extends Exception {}

class DieThrowing
{
    private array $errorMessages;

    public function __construct()
    {
        $this->errorMessages = parse_ini_file("conf.ini");
    }

    public function throwDie()
    {
        do {
            $value = rand(1, 6);
            echo "Dé lancé: $value<br>";

            try {
                if ($value % 2 == 0 && $value != 6) {
                    // Erreur grave
                    throw new DieException($this->formatMessage("code1", $value), 1);
                } elseif ($value % 2 != 0 && $value != 5) {
                    // Warning
                    throw new DieException($this->formatMessage("code2", $value), 2);
                } elseif ($value == 5) {
                    // Warning aussi
                    throw new DieException($this->formatMessage("code2", $value), 2);
                } elseif ($value == 6) {
                    echo '<span style="color:green;">' . $this->formatMessage("code3", $value) . '</span><br>';
                    $this->logMessage("code3", $value);
                    break;
                }
            } catch (DieException $e) {
                $color = ($e->getCode() == 1) ? 'red' : 'orange';
                echo "<span style='color:$color;'>" . $e->getMessage() . "</span><br>";
                $this->logMessage(($e->getCode() == 1) ? "code1" : "code2", $value);
            }
        } while ($value != 6);
    }

    private function formatMessage(string $code, int $value): string
    {
        return $this->errorMessages[$code] . $value;
    }

    private function logMessage(string $code, int $value): void
    {
        $date = date('Y/m/d H:i:s');
        $message = $date . " " . $this->errorMessages[$code] . $value . PHP_EOL;
        file_put_contents("log.txt", $message, FILE_APPEND);
    }
}

$throw = new DieThrowing();
$throw->throwDie();
?>
