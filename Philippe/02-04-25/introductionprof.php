<?php
// CDC: Un personne = nom, age. une personne doit pouvoir se présenter!
class Person {
    private string $name;
    private int $age;
    public function __construct (string $nom, int $age) {
        $this->name = $nom;
        $this->age = $age;
    }
    public function display() : void {
        echo $this->name ." a " . $this->age . " ans";
    }
    public function __toString()  {
        return $this->name ." a " . $this->age . " ans";
    }
    public function __destruct() {
        
    }
    
}
// main
    $p1 = new Person("Paul", 20);
    echo($p1);  // -> Paul a 20 ans

?>