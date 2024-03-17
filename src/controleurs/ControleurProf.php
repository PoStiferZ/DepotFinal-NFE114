<?php
require_once __DIR__ . '/../_core/DefaultController.php';

class ControleurProf extends DefaultController
{

    public function afficherAppel()
    {

        $idAppel = 1;
        $texteReq = " select lapala_etudiant.id_etudiant as idEtudiant, id_utilisateur, lapala_utilisateur.nom, prenom, present, libelle ";
        $texteReq .= " from lapala_feuille join lapala_etudiant ";
        $texteReq .= "           on lapala_etudiant.id_etudiant=lapala_feuille.id_etudiant ";
        $texteReq .= "      join lapala_utilisateur ";
        $texteReq .= "           on lapala_utilisateur.login=lapala_etudiant.id_utilisateur ";
        $texteReq .= "      join lapala_appel";
        $texteReq .= "           on lapala_appel.id_appel=lapala_feuille.id_appel ";
        $texteReq .= " where lapala_feuille.id_appel = :idApp";

        $req = $this->cnx->prepare($texteReq);
        $req->bindParam("idApp", $idAppel);
        $req->execute();



        $tabResults = $req->fetchAll(PDO::FETCH_ASSOC);

        $this->renderView(
            __DIR__ . "/../vues/vueAppels.php",
            [
                "tabAppels" => $tabResults,
                "message" => $idAppel
            ]

        );
    }
}
