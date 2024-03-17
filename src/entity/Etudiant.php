<?php

require_once __DIR__ . "/../DAO/UtilisateurDAO.php";
class Etudiant
{
    public $idEtudiant;
    public $idGroupe;
    public $infos;
    public $idUtilisateur;

    public function getUtilisateur()
    {
        $utilisateurDAO = new utilisateurDAO();
        $utilisateur = $utilisateurDAO->find($this->idUtilisateur);
        return $utilisateur;
    }
}
