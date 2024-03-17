<?php
// Session demarrée "une fois pour toute" 
// si on s'assure que toutes les requêtes http passent par là
session_start();

// Inclusion des contrôleurs
require_once 'controleurs/ControleurEtudiant.php';
require_once 'controleurs/ControleurHello.php';
require_once 'controleurs/ControleurProf.php';

// Routes : 
// nomDeLaRoute => droits, controleur, methode, paramètres
//                    0        1          2           3           
$routes =
    [
        'hello' => [['tous'], 'ControleurHello', 'sayHello', []],
        'helloProf' => [['tous'], 'ControleurHello', 'sayHelloProf', ["**get__message"]],
        'listerAbsencesEtu'  => [['etudiant'], 'ControleurEtudiant', 'afficherAbsences', ["**session__login"]],
        'afficherFormConnexion'  => [['tous'], 'ControleurHello', 'afficherFormConnexion', ["**get__message"]],
        'traiterCo'  => [['tous'], 'ControleurHello', 'traiterFormConnexion', ["**post__login", "**post__pass"]],
        'getEtudiantsJson' => [['tous'], 'ControleurEtudiant', 'getEtudiantsJson', []],
    ];


// Pas d'action demandée 
if (!isset($_GET['action'])) {
    // page par défaut : à choisir
    $ctHello = new ControleurHello();
    $ctHello->sayHello();
    exit();
}


// On cherche la route dans le tableau
if (array_key_exists($_GET["action"], $routes)) {
    $laRoute = $routes[$_GET["action"]];

    // droits 
    if (!in_array($_SESSION['droits'], $laRoute[0]) && !in_array('tous', $laRoute[0])) {
        header("Location:page666.html");
        exit();
    }

    // appel de la route
    $controleur = new $laRoute[1];
    // extraction des paramètres 
    $tabParams = [];
    foreach ($laRoute[3] as $unParam) {
        if (substr($unParam, 0, 2) == '**') {
            $tab = explode('__', $unParam);
            if ($tab[0] == '**session' && !empty($_SESSION[$tab[1]])) $tabParams[] = $_SESSION[$tab[1]];
            if ($tab[0] == '**get'     && !empty($_GET[$tab[1]]))     $tabParams[] = $_GET[$tab[1]];
            if ($tab[0] == '**post'    && !empty($_POST[$tab[1]]))    $tabParams[] = $_POST[$tab[1]];
        } else {
            $tabParams[] = $unParam;
        }
    }
    call_user_func_array(array($controleur, $laRoute[2]), $tabParams);
    exit();
}
