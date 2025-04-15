<?php
/*
* Héritage
* CDC 

- Une Forme géométrique c'est: une position dans le plan (x,y), une couleur (ex: 2,3, "red")
- on doit pouvoir la déplacer (en x et y) et lui changer sa couleur
- un rectangle a une largeur (l) et une longueur(L). Son périmètre c'est : (l+L)*2
- un carré est un rectangle avec l=L
Pouvez-vous créer un rectangle, un carré et les faire bouger (et changer de couleur), puis calculer leurs périmètres ?

*/
declare(strict_types=1);
class GeoForm {
	protected int $x = 0;		
	protected int $y = 0;		
	protected string $col ="";		
    
	public function __construct(int $x=0, int $y=0, string $col="black") { 
		$this->x = $x;
        $this->y = $y;
        $this->col = $col;
  	}

 	public function __toString() : string {
		return "[$this->x $this->y $this->col]";
    }
    public final function move(int $dx, int $dy) : void {   // si 'final': interdiction de redéfinir cette méthode pour les enfants!
        $this->x += $dx; $this->y+= $dy;
    }
        // générés automatiquement
	/**
	 * Get the value of col
	 */ 
	public function getCol()
	{
		return $this->col;
	}
	public function setCol($col)
	{
		$this->col = $col;
	}
    /**
	 * Get the value of x
	 */ 
	public function getX()
	{
		return $this->x;
	}
    /**
	 * Get the value of y
	 */ 
	public function getY()
	{
		return $this->y;
	}
    
}

class Rect extends GeoForm {
    protected int $width = 0;
    protected int $height = 0;
    protected int $perim = 0;

    public function __construct (int $w, int $h, int $x=0, int $y=0, string $col="black") {
        parent::__construct ($x, $y, $col);
        $this->width = $w;
        $this->height = $h;
    }
    public function perim(): int {
        $this->perim = 2*($this->height+$this->width);
        return $this->perim;
    }
    public function __toString() : string {     // override!
		return get_class ($this) . " [x=$this->x y=$this->y col=$this->col w=$this->width h=$this->height]";
    }
    /**
     * Get the value of width
     */ 
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * Get the value of height
     */ 
    public function getHeight()
    {
        return $this->height;
    }

}
class Square extends Rect { // le carré est un rectangle particulier!
    public function __construct (int $s, int $x=0, int $y=0, string $col="black") {
        parent::__construct ($s, $s, $x, $y, $col);
    }
    public function __toString() : string {     // override!
		return get_class ($this) . " [x=$this->x y=$this->y col=$this->col side=$this->width]";
    }
}
    // main
$forms = [
    new Rect(100, 50, 10, 12, "red"), 
    new Square(30, 150, 110, "blue")];
$html = ["<p>"];
$newCol = "green";

foreach ($forms as $f) {
        $moveX = rand (1, 50);
        $moveY = rand (1, 50);
        $html []=$f;
        $html []="...Move of: $moveX, $moveY and change col to: $newCol";
        $f->move ($moveX, $moveY);
        $f->setCol ($newCol);
        $html []=$f . " Perim=". $f->perim();
}
echo implode ("<br/>".PHP_EOL, $html);
// rendu graphique
$html = ["</p><p>"];
$html[] = "<svg width='500' height='230' style='background-color: grey'>";
foreach ($forms as $f) {
    $html [] = "<rect width='" . $f->getWidth() . "' height='" . $f->getHeight() . 
        "' x='" . $f->getX() . "' y='" . $f->getY() . "' fill='" . $f->getCol() . "' />";
}
$html[] = "</svg></p>";
echo implode (PHP_EOL, $html);

exit();
?>