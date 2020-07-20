<?php
namespace F3il;
defined('F3IL') or die('Erreur FORM.PHP');
/**
 * Description of form
 *
 * @author 
 */
class Form {
    protected static $_html;
    public function __construct() {
        $this->getHtmlFile();
    }
    public function render()
    {
        require self::$_html;
    }
    public function getHtmlFile()
    {
        $className = get_class();
        $className = substr($className,  strpos($className, '\\'));
        $className = substr($className,0,strpos($className, 'Form'));
        $className  = mb_strtolower($className);
        self::$_html = APPLICATION_PATH.'/forms/html/'.$className.'.form-html.php';
        if(!is_readable(self::$_html))
        {
            throw  new Error('Fichier introuvable !');
        }
    }
}
