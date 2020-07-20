<?php
    define('SISTR','');
    define('ROOT_PATH',__DIR__);
    define('APPLICATION_PATH',__DIR__.'/application/');
    define('APPLICATION_NAMESPACE','\\Sistr\\');
   
     require_once 'framework/f3il.php';
     
     //require_once 'application/controllers/utilisateur.controller.php';
     
    // $uc = new Sistr\UtilisateurController();
    // $uc->listerAction();

    $app = F3il\Application::getInstance(APPLICATION_PATH.'configuration.ini') ;

    $app->run();