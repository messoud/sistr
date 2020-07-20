<?php
    try {
        $db = new PDO('mysql:host=localhost;dbname=sistr','root','',
                array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8' ));
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $ex) {
        die('Erreur connexion');
    }
    
    $sql = "SELECT * FROM utilisateurs ORDER BY nom,prenom";
    try {
        $req = $db->prepare($sql);
        $req->execute();
    } catch (PDOException $ex) {
        die('Erreur SQL '.$ex->getMessage());
    }
    
    $data = $req->fetchAll(PDO::FETCH_ASSOC);    
    ?>
    <ul>
        <?php
        foreach($data as $U):
        ?>
        <li><?php echo $U['nom'].' '.$U['prenom'];?></li>
        <?php
        endforeach;
        ?>
    </ul>
    <pre>
     <?php print_r($data);?>   
    </pre>