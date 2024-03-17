<?php

require_once __DIR__ . "/../entity/Utilisateur.php";
require_once __DIR__ . "/../_core/DBCnx.php";


class UtilisateurDAO
{
    private $cnx;

    public function __construct()
    {
        $this->cnx = DBCnx::getInstance();
    }

    public function find($idUtilisateur)
    {
        $sql = "SELECT * FROM lapala_utilisateur WHERE login = :login;";

        $req = $this->cnx->prepare($sql);
        $req->bindParam(":login", $idUtilisateur);
        $req->execute();

        $tabRes = $req->fetchAll(PDO::FETCH_ASSOC);

        // Créer une instance d'Etudiant
        $obj = new Utilisateur();
        $obj->login = $tabRes[0]['login'];
        $obj->pass = $tabRes[0]['pass'];
        $obj->nom = $tabRes[0]['nom'];
        $obj->droits = $tabRes[0]['droits'];

        return $obj;
    }
}
