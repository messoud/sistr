<?php
namespace F3il;
defined('F3IL') or die('Acces interdit');

class PageError extends \F3il\Error {
    
    public function __construct($message,$fichier) {
        parent::__construct($message);
        $this->explanation = "La classe Page n'a pas pu trouver le fichier indiqué : $fichier";                
    }
    
    /*
     * Méthode d'affichage du message d'erreur en mode debug
     */
    public function debugRender() {
        $trace = $this->getTrace();
        $file = $trace[0]['file'];
        $line = $trace[0]['line'];
        $function = $trace[0]['function'].'()';        
    ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Erreur de Page</title>
        <meta charset='utf-8'>
    </head>
    <body>
        <h1>Erreur de Page</h1>
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

