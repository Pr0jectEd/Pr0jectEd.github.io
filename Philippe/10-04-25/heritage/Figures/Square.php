<?php
declare(strict_types=1);
require_once 'Rectangle.php';

class Square extends Rectangle {
    public function __construct(float $posicionX, float $posicionY, string $colorFigura, float $cote) {
        parent::__construct($posicionX, $posicionY, $colorFigura, $cote, $cote);
    }

    public function calculatePerimeter(): float {
        return parent::calclulatePerimeter(); 

    }

    public function getSide(): float
    {
        return parent::getLenght(); 
    }


    public function __toString(): string {
        return parent::__toString();
    }
}