<?php
namespace F3il;
defined('F3IL') or die('Erreur PAGE.PHP');
/**
 * Description of messages
 *
 * @author video
 */
abstract class Messages {
    const MESSAGE_SUCCESS = 0 ;
    const MESSAGE_WARNING = 1 ;
    const MESSAGE_ERROR = 2 ;
    static private $_messages = array();
    static private $_renderer ='\F3il\Messages::defaultRenderer';
    /**
     * Rajoute un message au tableau de messages
     * @param type $message
     * @param type $type
     * @throws Error
     */
    public static  function addMessage($message,$type)
    {
        if($type!= self::MESSAGE_SUCCESS && $type!=self::MESSAGE_WARNING && $type!=self::MESSAGE_ERROR)
        {
            throw new Error('Type de message inconnu !');
        }
        self::$_messages[$type]=$message;
    }
    /**
     * return le nombre de messages du tableau de messages
     * @return type
     */
    public static  function getMessagesCount()
    {
        return count(self::$_messages);
    }
    /**
     * retourne le message 
     * @param type $num
     * @return type
     * @throws Error
     */
    public static  function getMessage($num=0)
    {
        
        if(!isset(self::$_messages[$num]))
        {
            throw new Error('Le message demandé n\'existe pas !');
        }
        return self::$_messages[$num];
    }
    /**
     * 
     * @param type $renderer
     */
    public static  function setMessageRenderer($renderer)
    {
        self::$_renderer = $renderer;
    }
    /**
     * appelle la fonction qui produit le rendu 
     * @return type
     */
    public static  function render()
    {
        ob_start();
        call_user_func(self::$_renderer);
        //self::defaultRenderer();
        return ob_get_clean();
    }
    /**
     * Le rendu par défaut
     */
    public static  function defaultRenderer()
    {
        //echo __METHOD__;
        echo '<div>';
        foreach(self::$_messages as $cle=>$val)
        {
            switch($cle)
            {
                case 0 : echo 'Succès' ; break;
                case 1 : echo 'Warning'; break;
                case 3 : echo 'Error'; break;
            }
            echo ' : '.$cle.'<br>';
        }
        echo '</div>';
    }
}
