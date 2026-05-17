<?php if (session_status() === PHP_SESSION_NONE) session_start(); ?>

<!-- Barre de navigation mobile/tablette (haut) -->
<nav class="nav-h-mob">    
    <button class="nav-h-btn-profil"><i class="bi bi-plus-circle-fill"></i></button>
    <?php if(isset($_SESSION["user_id"])): ?>
    <div class="profil-mob-deroulant" id="profil-menu">
        <ul class="deroulage-services">
            <li><a href="../html/profil-user.php">Mon profil</a></li>
            <li><a href="../html/propo-trajet.php">Proposer un trajet</a></li>
            <li><a href="../html/propo-trajet.php#mes-trajets-en-cours">Trajets proposés</a></li>
            <li><a href="../html/hist-conducteur.php">Historique conducteur</a></li>
            <li><a href="../html/hist-passager.php">Historique passager</a></li>
            <li><a href="../html/parametre.php">Paramètres</a></li>
        </ul>
    </div>
    <?php endif; ?>
    <a href="../html/profil-user.php" class="nav-h-btn">
        <i class="bi bi-person-fill"></i>
    </a>
</nav>

<!-- Barre de navigation Web -->
<nav class="container-nav">
    <div class="logo-text">
        <div class="logo">
            <a href="../html/accueil.php">
                <img src="../img/arbre.jpg" alt="Logo">
            </a>
        </div>
        <p class="text-titre">EcoVoit'</p>
    </div>
    <ul class="lien-nav">
        <li class="trajet">
            <a href="../html/search-trajet.php">
                Trouver un trajet
                <div class="souligne"></div>
            </a>
        </li>
        <li class="contact">
            <a href="../html/contact.php">
                Contact
                <div class="souligne"></div>
            </a>
        </li>
        <?php if(isset($_SESSION["user_id"])): ?>
        <li class="accueil">
            <a href="#">
                Autres services
                <div class="souligne"></div>
            </a>
            <div class="deroulant-services">
                <ul class="deroulage-services">
                    <li><a href="../html/profil-user.php">Mon profil</a></li>
                    <li><a href="../html/propo-trajet.php">Proposer un trajet</a></li>
                    <li><a href="../html/propo-trajet.php#mes-trajets-en-cours">Trajets proposés</a></li>
                    <li><a href="../html/hist-conducteur.php">Historique conducteur</a></li>
                    <li><a href="../html/hist-passager.php">Historique passager</a></li>
                    <li><a href="../html/parametre.php">Paramètres</a></li>
                </ul>
            </div>
        </li>
        <?php endif; ?>
        <li class="connexion">
            <?php if(isset($_SESSION["user_id"])): ?>
                <a href="profil-user.php">Mon profil</a>
            <?php else: ?>
                <a href="../../index.php">Se connecter</a>
            <?php endif; ?>
        </li>
    </ul>
</nav>