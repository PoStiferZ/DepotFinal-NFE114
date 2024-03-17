<nav class="navbar navbar-expand-lg bg-body-tertiary " style="background-color: #FF5098;">
    <div class="container-fluid">
        <a class="navbar-brand text-light   " href="#">Bienvenue <?php if (isset($_SESSION['login'])) {
                                                                        echo $_SESSION['login'];
                                                                    } ?></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">

                <li class="nav-item">
                    <a class="nav-link text-light" href="index.php">Accueil</a>
                </li>
                <?php
                if (isset($_SESSION['login']) && isset($_SESSION['droits']) && $_SESSION['droits'] == "etudiant") {
                ?>
                    <li class="nav-item">
                        <a class="nav-link active text-light" aria-current="page" href="?action=listerAbsencesEtu">Mes absences</a>
                    </li>
                <?php
                } else {
                ?>
                    <li class="nav-item">
                        <a class="nav-link active text-light" aria-current="page" href="?action=listerAppels">Ma liste d'appel</a>
                    </li>
                <?php
                }
                ?>
            </ul>
        </div>

        <?php
        if (isset($_SESSION['login']) && isset($_SESSION['droits'])) {
        ?>
            <li class="nav-item list-unstyled mx-3">
                <a class="btn btn-light text-dark">Rôle : <?= $_SESSION['droits']; ?></a>
            </li>
            <li class="nav-item list-unstyled">
                <a class="btn btn-danger text-light" href="?action=seDeconnecter">Se déconnecter</a>
            </li>
        <?php
        } else {
        ?>
            <li class="nav-item list-unstyled">
                <a class="btn btn-light text-dark" href="?action=afficherFormConnexion">Se connecter</a>
            </li>
        <?php
        }
        ?>

    </div>
</nav>