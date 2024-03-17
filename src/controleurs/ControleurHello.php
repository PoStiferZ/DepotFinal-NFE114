<?php
require_once __DIR__ . "/../_core/DefaultController.php";

class ControleurHello extends DefaultController
{

    public function sayHello()
    {
        $this->renderView(
            __DIR__ . "/../vues/vueMessage.php",
            [
                "message" => 'Ceci est la page d\'accueil'
            ]
        );
    }

    // réservé aux profs
    public function sayHelloProf($msg = "")
    {
        $this->renderView(
            __DIR__ . "/../vues/vueMessage.php",
            [
                "message" => 'Bonjour les Jeans <br>' . $msg
            ]
        );
    }


    public function afficherFormConnexion($msg)
    {
        $this->renderView(
            __DIR__ . "/../vues/vueFormConnexion.php",
            [
                "message" => $msg
            ]
        );
    }

    public function seDeconnecter()
    {
        session_start();
        session_unset();
        session_destroy();
        $this->renderView(
            __DIR__ . "/../vues/vueFormConnexion.php",
        );
    }

    public function traiterFormConnexion($login, $pass)
    {
        // Création du texte de la requête
        $txtReq  = " Select droits, pass";
        $txtReq .= " from lapala_utilisateur";
        $txtReq .= " where upper(login)=upper(:zeLogin);";

        // Préparation
        $req = $this->cnx->prepare($txtReq);
        $req->bindParam(":zeLogin", $login);

        // Exécution
        $identifiant = $login;
        $req->execute();

        // Récupération des données dans un tableau associatif
        $tabRes = $req->fetchAll(PDO::FETCH_ASSOC);

        if (!password_verify($pass, $tabRes[0]["pass"])) {
            echo "Erreur d'identifiants à la connexion";
            header("location:index.php");
            exit();
        }

        // Exploitation du résultat 
        if (count($tabRes) == 1) {
            $ligneRes = $tabRes[0];
            $droits = $ligneRes["droits"];
            $_SESSION["login"] = $login;
            $_SESSION["droits"] = $droits;

            // on redirige vers une page d'accueil différente en fonction des droits :
            if ($droits == "etudiant") {
                header("location:index.php?action=listerAbsencesEtu");
                exit();
            } else {
                header("location:index.php"); // à traiter plus tard, selon les droits...
                exit();
            }
        } else {
            // redirection vers l'accueil, en passant un message en GET
            header("location:index.php?action=afficherFormConnexion&message=erreur d'identification");
            exit();
        }
    }
}
