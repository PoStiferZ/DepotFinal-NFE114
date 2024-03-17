<?php
require_once __DIR__ . "/../_core/DefaultController.php";

class ControleurEtudiant extends DefaultController
{

    public function afficherAbsences($loginEtu)
    {
        $texteReq = " select lapala_etudiant.id_etudiant as idEtudiant, id_utilisateur as idUtilisateur, lapala_utilisateur.nom as nom, prenom, present, libelle ";
        $texteReq .= " from lapala_feuille join lapala_etudiant ";
        $texteReq .= "           on lapala_etudiant.id_etudiant=lapala_feuille.id_etudiant ";
        $texteReq .= "      join lapala_utilisateur ";
        $texteReq .= "           on lapala_utilisateur.login=lapala_etudiant.id_utilisateur ";
        $texteReq .= "      join lapala_appel";
        $texteReq .= "           on lapala_appel.id_appel=lapala_feuille.id_appel ";
        $texteReq .= " where id_utilisateur = :login";
        $req = $this->cnx->prepare($texteReq);
        $req->bindParam(":login", $loginEtu);
        $req->execute();

        $tabResults = $req->fetchAll(PDO::FETCH_ASSOC);

        $this->renderView(
            __DIR__ . "/../vues/vueAbsences.php",
            [
                "tabAbsences" => $tabResults,
                "message" => $loginEtu
            ]

        );
    }

    public function getEtudiantsJson()
    {
        header("contet-type:application/json");
        $sql = "SELECT * FROM lapala_etudiant";
        $req = $this->cnx->prepare($sql);
        $req->execute();

        $tabRes = $req->fetchAll(PDO::FETCH_ASSOC);

        echo json_encode($tabRes);
    }
}
