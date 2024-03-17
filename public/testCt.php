<?php
    // On simule une connexion
    session_start();
    $_SESSION['droits']="etudiant";
    $_SESSION['login']="barduche";

    require_once "controleurs/ControleurEtudiant.php";
    
    $ct = new ControleurEtudiant();
    $ct->afficherAbsences("barduche");