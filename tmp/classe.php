<?php
    class AppelDynamique {
        public function maSuperMethode()
        {
            echo __METHOD__ ;
        }
    }
    $nomClasse = 'AppelDynamique' ;
    $nomMethode = 'maSuperMethode' ;
    
    $objet = new $nomClasse();
    $objet->$nomMethode();
    
