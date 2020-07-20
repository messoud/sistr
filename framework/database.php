<?php namespace F3il ;
if(!defined('F3IL')){ throw new Error('Accès interdit ');}
abstract class Database
{
    private static $_instance;
    public static $test ;
    public static function getInstance()
    {
        self::$test = "DatatBase";
        if(Configuration::isLoaded())
        {
            $config = Configuration::getInstance();
            $host = $config->__get('mysql_host');
            $dbName = $config->__get('mysql_dbname');
            $user = $config->__get('mysql_login');
            $mdp = $config->__get('mysql_password');
            if(is_null(self::$_instance))
            {
                try {
                    $ch= 'mysql:host='.$host.';dbname='.$dbName;
                    $db = new \PDO($ch,$user,$mdp,array(\PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8' ));
                    $db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
                    self::$_instance = $db;
                } catch (\PDOException $ex) {
                    die('Erreur connexion');
                }
            }
        }
        else 
        {
            throw new Error('fichier config non chargé !');
        }
        return self::$_instance;
    }
}