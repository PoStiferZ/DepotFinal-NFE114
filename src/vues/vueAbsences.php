<!DOCTYPE html>
<html>

<head>
    <title>Récap absences</title>
    <link rel="stylesheet" href="public/css/bootstrap.min.css">

</head>

<body class="container">

    <?php require_once("vueNavigation.php") ?>

    <h1>Etat de vos absences <?= $message ?></h1>
    <table class='table table-hover'>
        <thead>
            <tr>
                <th>id</th>
                <th>login</th>
                <th>nom</th>
                <th>prenom</th>
                <th>présence ?</th>
                <th>libellé</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($tabAbsences as $abs) {
                echo "<tr>";
                echo "<td>" . $abs['idEtudiant'] . "</td>";
                echo "<td>" . $abs['idUtilisateur'] . "</td>";
                echo "<td>" . $abs['nom'] . "</td>";
                echo "<td>" . $abs['prenom'] . "</td>";
                if ($abs['present'] == 1) $valeur = "OK";
                else $valeur = "abs";
                echo "<td>" . $valeur . "</td>";
                echo "<td>" . $abs['libelle'] . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>

</html>