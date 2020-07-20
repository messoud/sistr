<?php namespace F3il;
defined('F3IL') or die('Erreur PAGE.PHP');
class Application {
    private static $_instance;
    
    
    protected $controllerName;
    protected $actionName ;
    /**
         * Constructeur
         * 
         * @param string $iniFile : chemin du fichier INI de confuration
         */
    private function __construct($iniFile) {
        
        $config = Configuration::getInstance($iniFile); // Pour le premier appelle, on fournit le fichier de config $iniFile
    }
    /**
     * Retourne l'instance de l'Application
     * @param type $iniFile : chemin du fichier INI de configuration 
     * @return Application
     */
    public static function getInstance($iniFile="") {
      if(is_null(self::$_instance)){
          self::$_instance = new Application($iniFile);
      }
      return self::$_instance;
    }
    /**
         * Méthode principale d'exécution de l'application Web
         * - Analyse l'URL de la requête
         * - Route la requête vers l'action de contrôleur demandéé
         * - Affiche la page.
         */
    public function run() {    
        $search_url = filter_input(INPUT_GET, "controller", FILTER_SANITIZE_ENCODED); // FILTER_SANITIZE_ENCODED : Applique l'encodage URL, et supprime ou encode les caractères spéciaux
        $this->controllerName = $search_url;
        $fic = APPLICATION_PATH.'/controllers/'.$this->controllerName.'.controller.php';
       // require_once $fic;
        $controllerClass = APPLICATION_NAMESPACE.ucfirst($this->controllerName)."Controller" ;   
        //echo 'Application : '.$controllerClass ;
        $controller = new $controllerClass;
        $search_url = filter_input(INPUT_GET, "action", FILTER_SANITIZE_ENCODED);
        //if(isset($search_url) && !empty($search_url))
        if(filter_has_var(INPUT_GET,'action')&& !empty($search_url) )
        {
            $this->actionName = $search_url;
            $actionMethod = $this->actionName."Action" ;
            if(method_exists( $controller,$actionMethod))
            {
                $controller->$actionMethod();   
            }
            else
            {
                throw new ControllerError("Méthode inexistante ",$controllerClass,$actionMethod);
            }
        }
        else {
            // Action par défaut
            $actionMethod = $controller->getDefaultActionName() ;
            $controller->$actionMethod();   
        }
        // Appel de render de la page 
        $page= Page::getInstance();
        $page->render();
    }
    /**
         * Getter pour récupérer l'instance de la Page
         * Equivalent à Page::getInstance()
         * 
         * @return Page
         */
    public function getPage(){
        return Page::getInstance();
    }
    /**
         * Getter pour récupérer l'instance de la Configuration
         * Equivalent à Configuration::getInstance()
         * 
         * @return Configuration
         */
    public function getConfiguration(){
        return Configuration::getInstance();
    }
}
