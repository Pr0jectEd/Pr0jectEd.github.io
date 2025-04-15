<?php
/* Start mMachine a laver
prelavage fini 
lavage fini 
stop */

#DWWM2024-11
/* * Exception
* CDC
Modéliser le fonctionnement d'une machine à laver!
Les tâches séquentielles sont: prelavage, lavage, essorage, rinçage, toutes peuvent "planter"
Un message affiche la tâche en cours.
Dès que l'une plante, on le dit et on arrête tout!
Un nombre aléatoire (1,5) ramène la tâche qui plante (5 => ça marche)
Comment coder ceci ?

* technique
- try {} catch (Exception $e) {} dans le prog principal
- throw propage l'erreur (en général traitée par le prog principal)

/* Ancienne méthode : sans exception:

  $brand=new MachineALaver();
  if ($brand->prelavage()) {
    if ($brand->lavage()) {
      if ($brand->essorage()) {
        if ($brand->rincage()) {
          echo "Ok";
        }
        else
          echo "err au rincage";
      }
      else
          echo "err au essorage";
    }
  }
## exemple de rendu: */


class Machinealaver {


    private function prelavage(int $prelavage){
        if ($prelavage == 1) {
            throw new Exception("Planté: au lavage");
        }
        echo "prelavage";
    }

    
    private function lavage(int $lavage){
        if ($lavage == 2) {
            throw new Exception("Planté: au lavage");
        }
        echo "lavage";
    }

    
    private function essorage(int $essorage){
        if ($essorage == 3) {
            throw new Exception("Planté: au lavage");
        }
        echo "essorage";
    }

    
    private function rincage(int $rincage){
        if ($rincage == 4) {
            throw new Exception("Planté: au lavage");
        }
        echo "rincage";
    }


    private function run (int $running){

        try {
            self::prelavage($running);
            self::prelavage($running);
            self::lavage($running);
            self::essorage($running);
            self::rincage($running);
           
        } catch (Exception $err) {
            echo $err->getMessage();
        }

        echo "Stopped";
        
        

    }
    
}



?>