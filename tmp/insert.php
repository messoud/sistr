<?php
    try {
        $db = new PDO('mysql:host=localhost;dbname=sistr','root','',
                array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8' ));
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $ex) {
        die('Erreur connexion');
    }
    
    $utilisateur = array(
        'nom' => 'Chervy',
        'prenom' => 'Benjamin',
        'login' => 'lecreusois',
        'email' => 'chervy@3il.fr',
        'motdepasse' => 'xxx'
    );
    
    $sql = "INSERT INTO utilisateurs SET nom=:nom, prenom=:prenom, login=:login, email=:email, motdepasse=:mdp ";
    try {
        $req = $db->prepare($sql);
        $req->bindValue(':nom', $utilisateur['nom']);
        $req->bindValue(':prenom', $utilisateur['prenom']);
        $req->bindValue(':login', $utilisateur['login']);
        $req->bindValue(':email', $utilisateur['email']);
        $req->bindValue(':mdp', $utilisateur['motdepasse']);
        $req->execute();
    } catch (PDOException $ex) {
        die('Erreur SQL '.$ex->getMessage());
    }
    echo "Insertion effectuée";

    


    

