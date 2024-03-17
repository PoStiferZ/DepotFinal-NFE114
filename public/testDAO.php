<?php

require_once __DIR__ . "/../src/DAO/EtudiantDAO.php";

$etuDAO = new EtudiantDAO();

$tab = $etuDAO->findAll();



echo $tab[1]->getUtilisateur()->login;
echo "<br>";
echo $tab[1]->getUtilisateur()->pass;
echo "<br>";
echo $tab[1]->getUtilisateur()->nom;
echo "<br>";
echo $tab[1]->getUtilisateur()->droits;
