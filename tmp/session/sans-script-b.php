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
        <h1>Sans session PHP - script B</h1>
        <p><?php echo __FILE__;?></p>
        <h2>But du fichier</h2>
        <p>Tester si la variable $tpWeb existe pour pas</p>
        <?php
            if(isset($tpWeb)):
        ?>
        <p>$tpWeb existe et vaut : <?php echo $tpWeb;?></p>
        <?php
            else:
        ?>
        <p>$tpWeb n'existe pas !</p>
        <?php
            endif;
        ?>        
        <a href="index.php">Revenir au début</a>
        </div>
        <div class="col">
            <h2>Code source de ce script</h2>
            <pre>
                <?php echo htmlentities(file_get_contents(__FILE__));?>
            </pre>
        </div>
    </body>
</html>
