<?php
// Session demarrée "une fois pour toute" 
// si on s'assure que toutes les requêtes http passent par là
session_start();

// Inclusion des contrôleurs
require_once 'src/controleurs/ControleurEtudiant.php';
require_once 'src/controleurs/ControleurHello.php';
require_once 'src/controleurs/ControleurProf.php';


// Pas d'action demandée 
if (!isset($_GET['action'])) {
    // page par défaut : à choisir
    $ctHello = new ControleurHello();
    $ctHello->sayHello();
    exit();
}


// Action demandée
if ($_GET["action"] == 'afficherFormConnexion') {
    $msg = "";
    if (!empty($_GET["message"])) $msg = $_GET["message"];
    $ctHello = new ControleurHello();
    $ctHello->afficherFormConnexion($msg);
    exit();
}

if ($_GET["action"] == 'traiterCo') {
    $ctHello = new ControleurHello();
    $ctHello->traiterFormConnexion($_POST["login"], $_POST["pass"]);
    exit();
}


if ($_GET["action"] == 'listerAbsencesEtu') {
    // Vérif des droits
    if ($_SESSION["droits"] != 'etudiant') {
        header("Location:page666.php");
        exit();
    }

    // "Si on est là, c'est qu'on en a le droit !"
    $ctEtu = new ControleurEtudiant();
    $ctEtu->afficherAbsences($_SESSION['login']);
    exit();
}

if ($_GET["action"] == 'listerAppels') {
    // Vérif des droits
    if ($_SESSION["droits"] != 'prof') {
        header("Location:page666.php");
        exit();
    }

    // "Si on est là, c'est qu'on en a le droit !"
    $ctProf = new ControleurProf();
    $ctProf->afficherAppel();
    exit();
}


if ($_GET["action"] == 'seDeconnecter') {
    $ctHello = new ControleurHello();
    $ctHello->seDeconnecter();
    exit();
}

if ($_GET["action"] == 'getEtudiantsJson') {
    $ctEtudiantJson = new ControleurEtudiant();
    $ctEtudiantJson->getEtudiantsJson();
    exit();
}
