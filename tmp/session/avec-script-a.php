<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Sessions PHP : sans-script-b.php</title>
        <style type="text/css">
            .col {
                width:50%;
                float:left;
            }
        </style>
    </head>
    <body>
        <div class="col">
        <h1>Avec session PHP - script A</h1>
        <p><?php echo __FILE__;?></p>
        <h2>But du fichier</h2>
        <p>Créer une variable $tpWeb="SisTR"</p>
        <p>Enristrer dans $_SESSION une variable annee valant 2016</p>
        <p>Notez le session_start() en haut du fichier</p>
        <?php
            $tpWeb = "SisTR";
            $_SESSION['annee'] = 2016;
        ?>
        <a href="avec-script-b.php">Cliquez ici</a>
        </div>
        <div class="col">
            <h2>Code source de ce script</h2>
            <pre>
                <?php echo htmlentities(file_get_contents(__FILE__));?>
            </pre>
        </div>
    </body>
</html>


