<?php
namespace F3il;
defined('F3IL') or die('Acces interdit');

class AutoloaderError extends \F3il\Error {
    
    public function __construct($message,$classe) {
        parent::__construct($message);
        $this->explanation = "L'autoloader n'a pa pu trouver le fichier correspondant à la classe $classe <br/>";                
    }
    
    /*
     * Méthode d'affichage du message d'erreur en mode debug
     */
    public function debugRender() {
        $trace = $this->getTrace();
        $file = $trace[2]['file'];
        $line = $trace[2]['line'];
        if($trace[2]['function']==='spl_autoload_call' && count($trace)>3){
            $function = $trace[3]['function'].'()';
        } else {
            $function = "{main}";
        }
    ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Erreur Autoloader</title>
        <meta charset='utf-8'>
    </head>
    <body>
        <h1>Autoloader : erreur de nom de classe ou de fichier</h1>
        <h2><?php echo $this->message;?></h2>
        <?php if($this->explanation):?>
        <p>Explications : <?php echo $this->explanation;?></p>
        <?php endif;?>
        <p>Fichier : <?php echo $file;?></p>
        <p>Ligne : <?php echo $line;?></p>
        <p>Fonction : <?php echo $function;?></p>
        <pre><?php echo $this->getTraceAsString();?></pre>          
    </body>
</html>
    <?php
    }
}

