<?php
declare(strict_types=1);
require_once 'Figure.php';

class Rectangle extends Figure {
    private float $length;
    private float $height;

    public function __construct(float $posicionX, float $posicionY, string $colorFigura, float $longitud, float $altura) {
        parent::__construct($posicionX, $posicionY, $colorFigura);
        $this->length = $longitud;
        $this->height = $altura;
    }

    public function calclulatePerimeter(): float {
        return ($this->length + $this->height) * 2;
    }

    public function getLenght():float{
        return $this->length;
    }

    public function getHeigth(): float {
        return $this->height;
    }



    public function __toString() {
        return get_class($this). ":".parent::__toString() .", Longueur: {$this->length}, Hauteur: {$this->height}";
    }
}