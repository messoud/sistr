<?php
define('SECURITE', '');
require_once 'utilisateur.php';
require_once 'groupe.php';
$heure = date("H:i:s"); 
require 'apparence.php' ;
$per = new Utilisateur('toto','titi');
$per->direBonjour();
require 'apparence.php' ;