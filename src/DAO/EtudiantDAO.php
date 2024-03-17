<?php

require_once __DIR__ . "/../entity/Etudiant.php";
require_once __DIR__ . "/../_core/DBCnx.php";


class EtudiantDAO
{
    private $cnx;

    public function __construct()
    {
        $this->cnx = DBCnx::getInstance();
    }

    public function findAll()
    {
        $sql = "SELECT * FROM lapala_etudiant;";

        $req = $this->cnx->prepare("$sql");
        $req->execute();

        $tabRes = $req->fetchAll(PDO::FETCH_ASSOC);

        $tabObj = [];
        foreach ($tabRes as $res) {
            // Créer une instance d'Etudiant
            $etu = new Etudiant();
            $etu->idEtudiant = $res['id_etudiant'];
            $etu->idGroupe = $res['id_groupe'];
            $etu->infos = $res['infos'];
            $etu->idUtilisateur = $res['id_utilisateur'];
            $tabObj[] = $etu;
        }
        return $tabObj;
    }
}
