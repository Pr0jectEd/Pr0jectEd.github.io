<?php
//Syntax Heredoc
$sql = <<<EOD
SELECT * FROM users;
EOD;

$query = <<<EOD

?>
EOD;

class Person {
    private string $name;
    private int $age;

    public function __construct(string $nom, int $age)
    {
        $this->name = $nom;
        $this->age = $age;
    }

    public function display(): void {
        echo $this->name . " a " . $this->age . " ans";
    }

    // Corrected __toString() method
    public function __toString(): string {
        return $this->name . " a " . $this->age . " ans";
    }

    public function __destruct() {
        // Optional cleanup code
    }
}

$p1 = new Person("Paul", 20);
echo $p1;  // No more fatal error
