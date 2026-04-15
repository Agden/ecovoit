<?php session_start(); ?>
<!DOCTYPE html>
    <html lang="fr">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Recherchez un trajet</title>
            <link rel="stylesheet" href="../css/fiche.css">
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
                <!-- Barre de navigation mobile/tablette (haut) -->
            <nav class="nav-h-mob">    
                <button class="nav-h-btn-profil"><i class="bi bi-plus-circle-fill"></i></button>
                <!-- Menu déroulant quand on clique sur le cercle + -->
                <div class="profil-mob-deroulant" id="profil-menu">
                    <ul class="deroulage-services">
                        <li><a href="../html/profil-user.php">Mon profil</a></li>
                        <li><a href="../html/propo-trajet.php">Proposer un trajet</a></li>
                        <li><a href="/html/proposition-trajet.php#mes-trajets-en-cours">Trajets proposés</a></li>
                        <li><a href="../html/hist-conducteur.php">Historique conducteur</a></li>
                        <li><a href="../html/hist-passager.php">Historique passager</a></li>
                        <li><a href="../html/parametre.php">Paramètres</a></li>
                    </ul>
                </div>
        
                <a href="../html/profil-user.php" class="nav-h-btn"><!--Page profil-->
                    <i class="bi bi-person-fill"></i>
            </nav>

            <!--Barre de navigation Web-->
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
                    <li class="accueil">
                        <a href="#">
                            Autres services
                            <div class="souligne"></div>
                        </a>
                        <!--menu deroulant-->
                        <div class="deroulant-services">
                            <ul class="deroulage-services">
                                <li><a href="../html/profil-user.php">Mon profil</a></li>
                                <li><a href="../html/propo-trajet.php">Proposer un trajet</a></li>
                                <li><a href="/html/proposition-trajet.php#mes-trajets-en-cours">Trajets proposés</a></li>
                                <li><a href="../html/hist-conducteur.php">Historique conducteur</a></li>
                                <li><a href="../html/hist-passager.php">Historique passager</a></li>
                                <li><a href="../html/parametre.php">Paramètres</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="connexion">
                        <?php if(isset($_SESSION["user_id"])): ?>
                            <a href="profil-user.php">Mon profil</a>
                        <?php else: ?>
                            <a href="/index.php">Se connecter</a>
                        <?php endif; ?>
                    </li>
                </ul>
            </nav>

            <section class="bandeau-photo">
                <div class="img-bandeau">
                    <img src="../img/route-2.jpg" alt="Trajet écoresponsable">
                </div>
            </section>

            <!-- CORPS -->
            <main class="maini-container">
                <div class="fiche-info-profil">
                    <a href="#" class="link-retour">RETOUR</a>
                    <h1>Fiche détails</h1>
                    <div class="card-profil">                        
                        <section class="section-1">
                            <img src="../img/photo-profil-1.jpg">                          
                                <h3>Maxence D.</h3>
                                ⭐️⭐️⭐️⭐️⭐️                                                    
                        </section>
                        <section class="section-2">
                            <h4>Vehicule</h4>
                            <p><b>Marque :</b> Volkswagen</p>
                            <p><b>Modèle :</b> ID.3</p>
                            <p><b>Couleur :</b> Rouge</p>
                            <p><b>Plaque d'IM :</b>GS-104-HH </p>
                        </section>
                        <section class="section-3">
                            <h3>Description personnelle</h3>
                            <p><i>L'utilisateur n'a pas ajouté de 
                                description.</i></p>
                        </section>
                    </div>

                    <div class="card-preference">
                        <h3>Préférences</h3>
                        <p><b>Musique :</b> Oui <i class="bi bi-check"></i></p>
                        <p><b>Animaux :</b> Non <i class="bi bi-x"></i></p>
                        <p><b>Bavardage :</b> Oui <i class="bi bi-check"></i></p>
                        <p><b>Fumeur :</b> Oui <i class="bi bi-check"></i></p>
                    </div>

                    <div class="card-info-trajet">
                        <h3>Infos trajet</h3>
                        <div class="all">
                            <div class="gauche">
                                <p><b>Départ :</b> Argentan - 14h30</p>
                                <p><b>Arrivée :</b> Lille - 19h00</p>
                                <p><b>Date :</b> 24 / 07 / 2025</p>
                            </div>
                            <div class="droite">
                                <p><b>Places restantes :</b> 2</p>
                                <p><b>Prix :</b> 27.5 €</p>
                                <p><b>Voyage Eco :</b> Oui</p>
                            </div>
                        </div>
                        <button type="submit">RESERVER</button>
                        <a class="btn-retour" href="../html/recherche.php">RETOUR</a>                        
                    </div>

                    <div class="card-note-avis">                        
                        <h3>Notes & Avis</h3>

                        <section class="commentaire">
                            <h4>Martine J.</h4>                            
                            <div class="etoile-titre">
                                <p>⭐️⭐️⭐️⭐️⭐️ - <b>Super trajet !! </b></p>
                            </div>
                            <div class="text-commentaire">
                                <p>Un super trajet qui m'a semblé plus rapide grâce à la bonne humeur
                                du conducteur. Je recommande. Conduite très fluide et agréable. Ses choix
                                de musique sont bon, et on peut mêeme mettre notre propre musique. Je recommande.</p>
                            </div>
                        </section>
                        

                        <section class="commentaire">                            
                            <h4>Claire H.</h4>                            
                            <div class="etoile-titre">
                                <p>⭐️⭐️⭐️⭐️⭐️ - <b>Rien à redire</b></p>
                            </div>
                            <div class="text-commentaire">
                                <p>Trajet très agréable avec Maxence, ponctuel et super sympa. 
                                    On a discuté tout le long, et il a même fait une petite 
                                    pause café à mi-chemin. Je recommande à 100% !</p>
                            </div>
                        </section>

                        <section class="commentaire">
                            <div class="prenom">
                                <h4>Michel 63</h4>
                            </div>
                            <div class="etoile-titre">
                                <p>⭐️⭐️⭐️⭐️⭐️ - <b>Très bien</b></p> 
                            </div>
                            <div class="text-commentaire">
                                <p>Bon trajet dans l'ensemble. Voiture confortable et conduite prudente. 
                                    Juste un peu de musique un peu forte au début, mais Maxence a baissé 
                                    le son dès que je lui ai demandé. Très correct.</p>
                            </div>
                        </section>
                    </div>
                </div>
            </main>

            <!-- FOOTER-->
            <footer>
                <div class="container-footer">
                    <div class="all-cadre">
                        <section class="cadre-footer-1">
                            <a href="../html/mention.php" class="small-text-footer"> Mentions Légales </a><!--Page mention-->
                            <a href="../html/pol-conf.php" class="small-text-footer">Politique de confidentialité</a><!--Page polDConf-->
                        </section>

                        <section class="cadre-footer-2">
                            <ul class="contact-footer">
                                <li class="telephone">
                                    <i class="bi bi-telephone-fill"></i>
                                    06 34 48 41 06
                                </li>
                                <li class="mail">
                                    <i class="bi bi-envelope"></i>
                                    ecovoit.test@gmail.com
                                </li>
                            </ul>
                        </section>

                        <section class="logo-footer">
                            <img src="../img/arbre.jpg" alt="logo">
                        </section>
                    </div>
                </div>
            </footer>
            <!-- Scripts JS-->
            <script src="../js/menu-deroulant.js"></script>
        </body>
    </html>