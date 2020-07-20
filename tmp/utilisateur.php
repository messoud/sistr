<?php
defined('SECURITE') or die('Acces interdit');
class Utilisateur{
    protected $nom;
    protected $prenom;
    
    public function __construct($nom, $prenom){
        $this->nom = $nom;
        $this->prenom = $prenom ;
    }
    
    public function direBonjour() {
        echo "Bonjour" .$this->nom." ".$this->prenom;
    }
}
