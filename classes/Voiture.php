<?php

function str_starts_with ( $haystack, $needle ) {
    return strpos( $haystack , $needle ) === 0;
}

class Voiture
{
  private $modele;
  private $marque;
  private $mise_circulation;
  private $immatriculation;
  public $kilometrage;
  public $couleur;
  public $poids;
  private $disponibilite;
  private $utilite;
  private $utilisation;
  private $pays;
  private $age;

  public function __construct($modele, $marque, $mise_circulation, $immatriculation, $kilometrage, $couleur, $poids)
  {
      $this->modele=$modele;
      $this->marque=$marque;
      $this->mise_circulation=$mise_circulation;
      $this->immatriculation=$immatriculation;
      $this->kilometrage=$kilometrage;
      $this->couleur=$couleur;
      $this->poids=$poids;
      ($marque=="Audi") ? $this->disponibilite="reserved" : $this->disponibilite="free";
      ($poids>3500) ? $this->utilite="utilitaire" : $this->utilite="commerciale";
      if ($kilometrage<100000) $this->utilisation="low";
      if ($kilometrage>=100000 AND $kilometrage<=200000) $this->utilisation="middle";
      if ($kilometrage>200000) $this->utilisation="high";
      if (str_starts_with($immatriculation, 'BE')) $this->pays="Belgique";
      if (str_starts_with($immatriculation, 'FR')) $this->pays="France";
      if (str_starts_with($immatriculation, 'DE')) $this->pays="Allemagne";
      $this->age=date("Y")-$mise_circulation . "ans";
  }

  private function testUtilisation ($newKilometrage) {
      if ($newKilometrage<100000) $this->utilisation="low";
      if ($newKilometrage>=100000 AND $newKilometrage<=200000) $this->utilisation="middle";
      if ($newKilometrage>200000) $this->utilisation="high";
  }

  public function rouler() {
      $this->kilometrage=$this->kilometrage+100000;
      $this->testUtilisation($this->kilometrage);
  }

  public function display() {
      return "<tr>
                <td><img src='".$this->marque."-".$this->modele.".webp' alt='voiture'/></td>
                <td>".$this->marque."</td>
                <td>".$this->modele."</td>
                <td>".$this->mise_circulation."</td>
                <td>".$this->immatriculation."</td>
                <td>".$this->kilometrage."</td>
                <td>".$this->couleur."</td>
                <td>".$this->poids."</td>
                <td>".$this->utilite."</td>
                <td>".$this->age."</td>
                <td>".$this->disponibilite."</td>
                <td>".$this->pays."</td> 
                <td>".$this->utilisation."</td>                                          
              </tr>";
  }

}