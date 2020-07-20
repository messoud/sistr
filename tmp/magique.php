<?php

class Test {
    public $prop;
    
    
    public function __get($name) {
        return "la methode __get() ".$name." a fourni la valeur";
    } 
        
}

$obj = new Test();
$obj->prop = "OK";


echo "Prop : ".$obj->prop."</br>";
echo "Erreur : ".$obj->erreur."</br>";
echo "existePas : ".$obj->existePas."</br>";
