<?php
namespace Sistr;
defined('SISTR') or die('Acces interdit');

class UtilisateursModel {
    public function lister() {
        $db = \F3il\Database::getInstance();
        $sql = "SELECT * FROM utilisateurs ORDER BY nom, prenom";
        try {
            $req  = $db->prepare($sql);
            $req->execute();
        } catch (\PDOException $ex) {
            throw new \F3il\SqlError($sql,$req,$ex);
        }
        return $req->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function supprimer($id)
    {
        $db = \F3il\Database::getInstance();
        $sql = "DELETE FROM utilisateurs WHERE id=:id ";
        try {
            $req = $db->prepare($sql);
            $req->bindValue(':id',$id);
            $req->execute();
        } catch (PDOException $ex) {
            throw new \F3il\SqlError($sql,$req,$ex);
        }
    }
}

