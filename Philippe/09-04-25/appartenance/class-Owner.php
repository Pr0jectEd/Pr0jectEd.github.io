<?php
declare(strict_types=1);
//require_once "classVehicle.php";
class Owner
{
    private string $nameOwner;
    private string $city;
    private int $codePostal;

    public function __construct(string $propietario, string $ciudad, int $codigoPostal){
        $this->nameOwner = $propietario;
        $this->city = $ciudad;
        $this->codePostal = $codigoPostal;
    }
    
    public function __toString(){
        return $this->nameOwner.$this->city.$this->codePostal;
    }

    public function getName(){
        return $this->nameOwner;
    }

}
?>