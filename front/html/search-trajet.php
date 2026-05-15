<?php session_start(); ?>
<!DOCTYPE html>
    <html lang="fr">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Recherchez un trajet</title>
            <link rel="stylesheet" href="../css/search-trajet.css">
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
                        <li><a href="/html/propo-trajet.php#mes-trajets-en-cours">Trajets proposés</a></li>
                        <li><a href="../html/hist-conducteur.php">Historique conducteur</a></li>
                        <li><a href="../html/hist-passager.php">Historique passager</a></li>
                        <li><a href="../html/parametre.php">Paramètres</a></li>
                    </ul>
                </div>
        
                <a href="../html/profil-user.html" class="nav-h-btn"><!--Page profil-->
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
                                <li><a href="/html/propo-trajet.php#mes-trajets-en-cours">Trajets proposés</a></li>
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
            <main class="main-container">
                <div class="titre">
                    <h1>Rechercher votre trajet</h1>
                </div>
                <div class="recherche-container">
                    <!-- Champ de départ -->
                     <div class="barre-depart">
                        <input type="text" id="depart" placeholder="Départ..." class="barre-recherche">
                        <div id="suggestions-depart" class="suggestions-list"></div>
                    </div>
          
                    <!-- Champ d'arrivée -->
                     <div class="barre-arrivee">
                        <input type="text" id="arrivee" placeholder="Arrivée..." class="barre-recherche">
                        <div id="suggestions-arrivee" class="suggestions-list"></div>
                    </div>
                </div>
                                    
                <div class="filtres">
                    <h4>Filtres</h4>
                    <div class="filtres-zone-1">
                        <fieldset>
                            <legend>Voyage écoresponsable</legend>
                            <label><input type="checkbox"> oui, absolument</label>
                            <label><input type="checkbox"> pas obligatoirement</label>
                        </fieldset>
                    </div>

                    <div class="filtres-zone-2">
                        <fieldset>
                            <legend>Note minimale conducteur</legend>
                            <label><input type="checkbox"> 1</label>
                            <label><input type="checkbox"> 2</label>
                            <label><input type="checkbox"> 3</label>
                            <label><input type="checkbox"> 4</label>
                            <label><input type="checkbox"> 5</label>
                        </fieldset>
                    </div>

                    <div class="prix-zone">
                        <label for="prix">Prix max / passager (€)</label>
                        <input type="number" id="prix" min="0" step="0.5">
                    </div>                    
                </div>

                <div class="cadre-btn">
                    <button class="searchBtn" id="searchBtn">Rechercher</button>
                </div>
                
                <div class="carte" id="carte"></div>
                <div class="zone-resultats" id="zone-resultats"></div>
            </main>

            <!--Barre de navigation BAS mobile / Tablette-->
            <nav class="nav-b-mob">
                <a href="../html/search-trajet.html" class="nav-b-btn"><i class="bi bi-search"></i></a><!--Page rechercher un trajet-->
                <a href="../html/propo-trajet.html" class="nav-b-btn"><i class="fas fa-road"></i></a><!--Page proposition de trajet-->
            </nav>

            <!-- FOOTER-->
            <footer>
                <div class="container-footer">
                    <div class="all-cadre">
                        <section class="cadre-footer-1">
                            <a href="../html/mention.html" class="small-text-footer"> Mentions Légales </a><!--Page mention-->
                            <a href="../html/pol-conf.html" class="small-text-footer">Politique de confidentialité</a><!--Page polDConf-->
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
            <script src="../js/recherche.js"></script>
            <script src="../js/navigation.js"></script>
            <script src="../js/menu-deroulant.js"></script>
        </body>
    </html>