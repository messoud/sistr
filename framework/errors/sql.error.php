<?php
namespace F3il;
defined('F3IL') or die('Acces interdit');

class SqlError extends \F3il\Error {
    protected $sql;
    protected $req;
    protected $exception;
    
    public function __construct($sql,\PDOStatement $req,\PDOException $exception) {
        parent::__construct($exception->getMessage());
        $this->sql = $sql;
        $this->req = $req;
        $this->exception = $exception;
    }
    
    /*
     * Méthode d'affichage du message d'erreur en mode debug
     */
    public function debugRender() {
        $trace = $this->getTrace();
        $file =  $this->file;
        $line = $this->line;
        $function = $trace[0]['class'].'::'.$trace[0]['function'];         
    ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Erreur SQL</title>
        <meta charset='utf-8'>
    </head>
    <body>
        <h1>Erreur SQL</h1>
        <p><?php echo $this->message;?></p>        
        <p>Fichier : <?php echo $file;?></p>
        <p>Ligne : <?php echo $line;?></p>
        <p>Fonction : <?php echo $function;?></p>
        <h2>Paramètres</h2>
        <?php $this->req->debugDumpParams(); ?>
        <pre><?php echo $this->getTraceAsString();?></pre>          
    </body>
</html>
    <?php
    }
}

