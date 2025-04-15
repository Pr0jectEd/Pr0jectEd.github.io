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

    public function moveAxeX(float $ejeX):float {
        
        return $this->posX = $ejeX;
    }

    public function moveAxeY(float $ejeY): float{
         return $this->posY = $ejeY;
    }

    public function getColor():string{
        return $this->figurecolor;
    }

    public function getPosX():float{
        return $this->posX;
    }

    public function getPosY():float{
        return $this->posY;
    }

    public function changeColor(string $newColor): void {
        $this->figurecolor = $newColor;
    }
}