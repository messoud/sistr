<?php namespace F3il;
    defined('F3IL') or die('Erreur configuration.PHP');
    class Configuration {
        private static $_instance;
        protected $iniFile;
        protected $data = array();
        /**
         * Constructeur
         * 
         * @param string $iniFile : chemin du fichier INI de configuration
         */
        private function __construct($iniFile)
        {
             if(!is_readable($iniFile))
            {
                //die('Fichier '.$iniFile.' non  trouvé !');
                throw new Error('Fichier '.$iniFile.' non  trouvé !');
            }
            $this->data = parse_ini_file($iniFile);
            if(!$this->data) {
                //die('Fichier non lisible !');
               throw new Error('Fichier non lisible !');
            }
            $this->iniFile = $iniFile;
        }
        /**
         * Retourne TRUE si l'instance existe, FALSE sinon
         * @return boolean
         */
        public static function isLoaded()
        {
            return is_null(self::$_instance)?FALSE:TRUE;
        }
         /**
         * Méthode de récupération de l'instance         *
         * 
         * @param string $iniFile : chemin du fichier INI de configuration
         * @return Configuration
         */
        public static function getInstance($iniFile="")
        {
            if(is_null(self::$_instance))
            {
               
                self::$_instance = new Configuration($iniFile);
            }
            return self::$_instance;
        }
        /**
         * Getter pour les propriétés dynamiques de la configuration.
         * @param string $name : nom de la propriété dynamique
         * @return mixed
         */
        public function __get($name){
            if(!array_key_exists($name, $this->data))
            {
                // die('La variable '.$name." n'existe pas")   ;   
                throw new Error('La variable '.$name." n'xiste pas")   ; 
            }
            return $this->data[$name];
        }
    }
    


