<?php

namespace F3il;

defined('F3IL') or die('Acces interdit' . __FILE__);

/**
 * Autoloader : classe de chargement automatique des classes du framework
 * et de l'application
 */
class AutoLoader {

    private static $_instance;

    /**
     * Chemin vers le dosser de l'application
     * @var string
     */
    private $appFolder;

    /**
     * Dossier du framework
     * @var type          
     */
    private $frameworkFolder;

    /**
     * Identifiant de l'espace de nom de l'application
     * @var string
     */
    private $appNamespace;

    /**
     * Identifiant de l'espace de nom du framework
     * @var string 
     */
    private $frameworkNamespace;

    /**
     * Constructeur
     * 
     * @param string $appFolder : chemin vers le dossier de l'application
     * @param string $appNamespace : identifiant de l'espace de nom de l'application
     */
    private function __construct($appFolder, $appNamespace) {

        $this->appFolder = $appFolder;
        $this->frameworkFolder = __DIR__;
        $this->appNamespace = strtolower($appNamespace);
        $this->frameworkNamespace = strtolower(__NAMESPACE__);

        spl_autoload_register(array($this, 'loader'));
    }

    /**
     * Gestion du singleton
     * 
     * @param string $appFolder : chemin vers le dossier de l'application
     * @param string $appNamespace : identifiant de l'epsace de nom de l'application
     * @return type
     */
    public static function getInstance($appFolder, $appNamespace) {
        if (is_null(self::$_instance) === true) {
            self::$_instance = new AutoLoader($appFolder, $appNamespace);
        }
        return self::$_instance;
    }

    /**
     * Réalisé l'inclusion du fichier s'il existe
     * 
     * @param string $filename : chemin du fichier à inclure
     * @param string $classname : nom de la classe à vérifier une fois le fichier inclus
     * @throws \F3il\Error
     */
    public function checkAndRequire($filename, $classname) {
       // echo "<br>$filename - $classname";
        if (!is_readable($filename))
            throw new AutoloaderError('Fichier inexistant ' . $filename, $classname);

        require_once $filename;

        if (!class_exists($classname))
            throw new AutoloaderError('Classe ' . $classname . ' non trouvée dans le fichier ' . $filename, $classname);
    }

    /**
     * Méthode réalisant le découpage du nom de la classe pour déterminer quel fichier charger
     * @param string $className
     * @throws AutoloaderError
     */
    private function loader($className) {
        // Elimine les \ dans le nom de classe 
        $class = str_replace('\\', '', $className);
           
        // Découpe le nom suivant les majuscules pour faire un tableau de chaînes
        $nameParts = preg_split('/(?=[A-Z])/', $class, -1, PREG_SPLIT_NO_EMPTY);

        // Convertit toutes les chaînes en minuscules            
        $parts = array_map('strtolower', $nameParts);

        switch (count($parts)) {
            case 2:
                $file = $parts[1] . '.php';
                $folder = '/';
                break;
            case 3:
                $file = $parts[1] . '.' . $parts[2] . '.php';
                $folder = '/' . $parts[2] . 's/';
                break;
            default:
                throw new AutoloaderError("Nom de classe invalide ", $className);
        }
        //echo "<br>".$className." ".$parts[0]." ".$file."<br>";
         //echo "<br>".$package ." ; ". $folder ." ; ". $file ;
        
        //echo "<br>$parts[0]  $this->appNamespace $this->appFolder<br>" ;
        
        switch ($parts[0]) {
            
            case str_replace('\\','',$this->appNamespace):
                $package = $this->appFolder;
                break;
            case $this->frameworkNamespace:
                $package = $this->frameworkFolder;
                break;
            default:
                throw new AutoloaderError("Package inconnu " . $parts[0], $className);
        }
       
        $this->checkAndRequire($package . $folder . $file, $className);
    }

}
