<?php namespace F3il;
defined('F3IL') or die('Erreur PAGE.PHP');

class Page{
    public static $_instance;
    
    protected $templateFile;
    protected $viewFile;
    protected $data = array();//['val1' => 'Bonjour','val2' => 'Bonsoir' ];
    
    protected $pageTitle;
    protected $viewHTML;
    protected $cssFiles = array();
    /**
         * Constructeur 
         * 
         */
    private   function __construct() {
        
    }
    public function setPageTitle($pageTitle)
    {
        $this->pageTitle = $pageTitle ;
    }
    
    public function getPageTitle()
    {
        return $this->pageTitle ;
    }
    /**
         * Méthode de récupération de l'instance de Page
         * 
         * @return Page
         */
    public static function getInstance() {
      if(is_null(self::$_instance)){
          self::$_instance = new Page();
      }
      return self::$_instance;
    }
    /**
         * Précise le template à utiliser
         * 
         * @param string $templateName : racine du nom du template à utiliser
         * @return $this
         */
    public function setTemplate($templateName){
        $templateF = APPLICATION_PATH.'templates/'.$templateName.'.template.php';
        if(!is_readable($templateF)){
            //die($templateName.' non trouvé !');   
             throw new Error($templateName.' non trouvé !');
        }
        $this->templateFile = $templateF;
        return $this;
    }
    /**
         * Précise la vue à utiliser
         * 
         * @param string $viewName : racine du nom de la vue à utiliser
         * @return $this
         */
    public function setView($viewName){
        $viewF = APPLICATION_PATH.'views/'.$viewName.'.view.php';
         if(!is_readable($viewF)){
            //die($viewF.' non trouvé !');   
             throw new Error($viewF.' non trouvé !');
        }
        $this->viewFile = $viewF ;
        return $this;
    }
   /**
         * Permet d'insérer la vue dans le template
         */
    private function insertView()
    {
        
         //require $this->viewFile;
        // echo $this->viewHTML;
        return $this->viewHTML;
    }
     /**
         * Effectue le rendu du template et de la vue
         * 
         */
    public function render(){
        if(!isset($this->templateFile) || !isset($this->viewFile))
        {
           // die('Il faut renseigner le nom du template');
            throw new Error('Il faut renseigner le nom du template');
        }
        ob_start();
        require $this->viewFile;
        $this->viewHTML = ob_get_clean();
        $this->viewHTML =preg_replace_callback('/\[%\w+\%]/is',array($this,'renderCallback'),$this->viewHTML);
       // echo $this->viewHTML;
        ob_start();
        require $this->templateFile;
        $template = ob_get_clean();
       
        $res = preg_replace_callback('/\[%\w+\%]/is',array($this,'renderCallback'),$template);
        echo $res;
    }
     /**
         * Getter pour les propriétés dynamiques de Page
         * 
         * @param string $name : nom de la propriété dynamique
         * @return mixed
         */
    public function __get($name){
        if(!isset($this->data[$name]))
        {
            //die('La variable '.$name." n'xiste pas")   ;   
            throw new Error('La variable '.$name." n'xiste pas");
        }
        return $this->data[$name];
    }
    /**
         * Setter pour les propriétés dynamiques de Page
         * 
         * @param string $name : nom de la propriété dynamique
         * @param mixed $value : valeur de la propriété dynamique
         */
    public function __set($name, $value)
    {
        $this->data[$name]=$value;
    }
     /**
         * Méthode permettant d'appeler la fonction isset() sur les prorpriétés dynamiques
         * 
         * @param string $name : nom de la propriété dynamique
         * @return boolean
         */
    public function __isset($name) {
        return array_key_exists($name, $this->data);
    }
    
    public function addStyleSheet($cssFile)
    {
        if(!is_readable($cssFile))
        {
            throw new PageError('Fichier non trouvé !', $cssFile);
        }
    else {
        if(in_array($cssFile,$this->cssFiles))
                return $cssFile ;
        
        else
        {
            $this->cssFiles[]=$cssFile;
            echo $this->cssFiles[0];
       }
    }
    }
    public function insertStyleSheets()
    {
        //$link = '';
        ob_start();
        foreach ($this->cssFiles as $cssFile)
        {
           // $link = $link . '<link href="'.$this->cssFiles[0].'" rel="stylesheet" type="text/css"> ';
            require $cssFile ;
        }
        $link = ob_get_clean();
        return $link;
    }
    public function renderCallback($matches)
    {
       // echo $matches[0];
         switch($matches[0]){
            case '[%VIEW%]': return $this->viewHTML ;
            case '[%STYLESHEET%]' : return $this->insertStyleSheets(); 
            case '[%TITLE%]': return $this->insertPageTitle();
            case '[%MESSAGES%]' : return Messages::render();
            default: 
                return '';
        }
    }
    public function insertPageTitle()
    {
        return '<title>'.$this->getPageTitle().'</title>';
    }
}