<?php
namespace F3il;
defined('F3IL') or die('Erreur PAGE.PHP');

abstract class Messenger
{
    const SESSION_KEY = 'f3il.messenger';
    /*
     * initialise une variable session par $message
     */
    public static function setMessage($message)
    {
       // echo __METHOD__ ;
        $_SESSION[self::SESSION_KEY]=$message;
    }
    /*
     * Retourne le message contenu dans la variable session s'il existe
     */
    public static function getMessage()
    {
       // echo __METHOD__ .' ' .$_SESSION[self::SESSION_KEY];
        if(!isset($_SESSION[self::SESSION_KEY]))
            return false;
        $mess = $_SESSION[self::SESSION_KEY] ;
        unset($_SESSION[self::SESSION_KEY]);
        return $mess;
    }
}
