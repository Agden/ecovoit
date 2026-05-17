<?php
session_start();
?>
<!DOCTYPE html>
    <html lang="fr">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Connexion / Inscription</title>
            <link rel="stylesheet" href="front/css/index.css">
                <!-- Lien vers Bootstrap Icons -->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
                <!--Intégrer la carte en CSS-->
            <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
                <!--Intégrer la carte en JS-->
            <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
                <!--Routing  machine CSS-->
            <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css"/>
        </head>
        <body>
            <div class="page">
                <div class="card-accueil">
                    <!-- LOGO -->
                    <img src="front/img/arbre.jpg" class="logo-ecv" alt="Logo EcoVoit">
                    <div class="card-body">
                        <h1 class="card-titre">EcoVoit'</h1>
                        <p class="slogan">Le covoiturage responsable</p>
                        <!-- Bouton Création / Connexion -->
                        <button class="btn-creation" id="btn-creation">Créer un compte</button>
                        <button class="btn-connexion" id="btn-connexion">Se connecter</button>
                        <a href="front/html/accueil.php">Continuer sans compte</a>

                        <!-- Form créer un compte -->
                        <div class="form-creation" id="form-creation" style="display: none;">
                            <form action="back/register.php" method="post"> <!--vers fiche d'inscription-->
                                <h3>Créer un compte</h3>
                                <input type="email" name="email" class="form-control" placeholder="Email" required>
                                <input type="password" name="password" class="form-control" placeholder="Mot de passe" required>
                                <button type="submit" class="submit-creation">Créer un compte</button>
                            </form>
                        </div> 

                        <!-- Formulaire Se connecter -->
                        <div class="form-connexion" id="form-connexion" style="display: none;">                        
                            <form action="/back/login.php" method="post">
                                <h3>Se connecter</h3>
                                <input type="email" name="email" class="form-control" placeholder="Email" required>
                                <input type="password" name="password" class="form-control" placeholder="Mot de passe" required>
                                <button type="submit" class="submit-connexion">Se connecter</button>
                            </form>
                            <!-- Btn mot de passe oublié -->
                            <a href="#" id="mdp-oublie" class="mdp-oublie">Mot de passe oublié ?</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Script -->
            <script src="front/js/formulaire-index.js"></script>
        </body>
    </html>