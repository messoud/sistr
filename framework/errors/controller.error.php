<?php
namespace F3il;
defined('F3IL') or die('Acces interdit');

class ControllerError extends \F3il\Error {
    
    public function __construct($message,$controller,$action) {
        parent::__construct($message);
        $this->explanation = "L'URL précise une action ($action) dont le contrôleur ($controller) ne dispose pas. <br/>".
                             "Vérifiez que nous ne précisez que la racine du nom de la méthode (ex : par exemple pour exécuter listerAction, il faut écrire action=lister) <br/>".
                             "Vérifiez aussi que le nom de la méthode de le code de la classe est correctement écrit";                
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
        <title>Erreur de contrôleur</title>
        <meta charset='utf-8'>
    </head>
    <body>
        <h1>Erreur de contrôleur</h1>
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

