<?php
declare(strict_types=1);

class Figure {
    protected float $posX;
    protected float $posY;
    protected string $figurecolor;

    public function __construct(float $posicionX, float $posicionY, string $colorFigura) {
        $this->posX = $posicionX;
        $this->posY = $posicionY;
        $this->figurecolor = $colorFigura;
    }

    public function __toString(): string {
        return "Position X: {$this->posX}, Position Y: {$this->posY}, Couleur: {$this->figurecolor}";
    }

    public function moveAxeX(float $ejeX): void {
        $this->posX = $ejeX;
    }

    public function moveAxeY(float $ejeY): void {
        $this->posY = $ejeY;
    }

    public function changeColor(string $newColor): void {
        $this->figurecolor = $newColor;
    }
}

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

    public function __toString(): string {
        return get_class($this).": ".parent::__toString() . ", Longueur: {$this->length}, Hauteur: {$this->height}";
    }
}

class Square extends Rectangle {
    public function __construct(float $posicionX, float $posicionY, string $colorFigura, float $cote) {
        parent::__construct($posicionX, $posicionY, $colorFigura, $cote, $cote);
    }

    public function calculatePerimeter(): float {
        return parent::calclulatePerimeter(); 
    }

    public function __toString(): string {
        return parent::__toString();
    }
}




$figure1= new Rectangle(3,5,"green",4.5,7);
echo $figure1;
echo"<br>";
echo $figure2= new Square(5,6,"Red",4);
echo"<br>";
echo $figure1->moveAxeX(7);
echo"<br>";
echo $figure1;
