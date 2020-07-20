<?php
    namespace F3il;
    defined('F3IL') or die('Erreur PAGE.PHP');
    class Error extends \Exception
    {
        const DEBUG="debug" ;
        const PRODUCTION = "production" ;
        
        protected $explanation ;
        protected $runMode ;
        
        public function __construct($message) {
            parent::__construct($message);   
            $this->explanation = $message;
           
            if(Configuration::isLoaded()==FALSE)
            {
                $this->runMode = self::PRODUCTION;
            }
            else {
                $config = Configuration::getInstance();
                if (strcmp($config->__get('run_mode'),self::DEBUG)!==0)
                {
                    $this->runMode = self::PRODUCTION;
                }
                else
                {
                    $this->runMode = self::DEBUG;
                }
            }
             
        }
       
        public function __toString(){
            ob_end_clean();
            if(strcmp($this->runMode,self::DEBUG)===0)
            {
                
                return $this->debugRender();
            }
            else
            {
                return $this->productionRender();
            }
            return "";
        }
        
        
    public function debugRender() {
        $trace = $this->getTrace();
    ?>
    <!DOCTYPE html>
    <html>
        <head>
            <title>Erreur dans l'application</title>
            <meta charset='utf-8'>
        </head>
        <body>
            <h1>Erreur</h1>
            <p><?php echo $this->message;?></p>
            <?php if($this->explanation):?>
            <p>Explications : <?php echo $this->explanation;?></p>
            <?php endif;?>
            <p>Fichier : <?php echo $this->file;?></p>
            <p>Ligne : <?php echo $this->line;?></p>
            <p>Fonction : <?php echo $trace[0]['class'].'::'.$trace[0]['function'];?></p>
            <pre><?php echo $this->getTraceAsString();?></pre>          
        </body>
    </html>
        <?php
    }

           
        
        private function productionRender()
        {
            return "OUPS !";
        }
    }