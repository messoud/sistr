<?php namespace F3il;
    session_start();
    define('F3IL','');
    if(!defined('ROOT_PATH')) {throw new Error('Erreur chemin');}//die('Erreur chemin');
    if(!defined('APPLICATION_PATH')) {throw new Error('Erreur application');}
    if(!defined('APPLICATION_NAMESPACE')) {throw new Error('Erreur espace de nom');}

    //require_once 'application.php' ;
    //require_once 'configuration.php';
    //require_once 'page.php';
    //require_once 'error.php';
    require_once 'autoloader.php';
    //echo APPLICATION_NAMESPACE;
    Autoloader::getInstance(APPLICATION_PATH, APPLICATION_NAMESPACE);
    
   // $app = Application::getInstance(APPLICATION_PATH.'configuration.ini');
   // $app->run('controller','action');
    