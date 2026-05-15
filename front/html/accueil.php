<?php session_start(); ?>
<!DOCTYPE html>
    <html lang="fr">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Page d'accueil</title>
            <link rel="stylesheet" href="../css/accueil.css">
            <!-- Lien vers Bootstrap Icons -->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
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
                    <img src="../img/bandeau-2.jpg" alt="Trajet écoresponsable">
                </div>
            </section>

            <!-- CORPS -->
            <main>
                <div class="cadre-1">
                    <h1>Choisir <b>EcoVoit'</b> c'est ...</h1>
                    <section class="explain">
                        <div class="partie-1">
                            <img src="../img/recharge.jpg">
                            <div class="bandeau-1">                                  
                                <div class="text-1">
                                    <h2> Écologie</h2>                                                                    
                                </div>                                
                            </div>
                            <div class="sous-text-1">
                                <p>Réduisez votre emprunte carbone en favorisant les vehicules écoresponsables</p>
                                <i class="bi bi-leaf-fill"></i>
                            </div>
                        </div>

                        <div class="partie-2">
                            <img src="../img/piece.jpg">
                            <div class="bandeau-2">                                
                                <div class="text-2">
                                    <h2> Économie</h2>                                    
                                </div>
                            </div>
                            <div class="sous-text-2">
                                <p>Réduisez le poids de vos dépenses. Payez moins cher vos trajets avec EcoVoit'</p>
                                <i class="bi bi-currency-euro"></i>
                            </div>
                        </div>
                        
                        <div class="partie-3">
                            <img src="../img/pied-voiture.jpg">
                            <div class="bandeau-3">                                
                                <div class="text-3">
                                    <h2> Facilité</h2>                                    
                                </div>
                            </div>
                            <div class="sous-text-3">
                                <p>Allez où vous voulez en toute simplicité dans une ambiance qui vous convient</p>
                                <i class="bi bi-check2-circle"></i>
                            </div>
                        </div>
                    </section>
                </div>

                <div class="cadre-2">
                    <h2>Où souhaitez-vous aller ?</h2>
                    <!-- Cadre Recherche de trajet -->
                    <div class="recherche-container">          
                        <!-- Champ d'arrivée -->
                        <input type="text" id="arrivee" placeholder="Destination ..." class="barre-recherche">
                        <div id="suggestions-arrivee" class="suggestions-list"></div>
                    </div>          
                        <a href="../html/search-trajet.php" class="searchBtn" id="searchBtn">Allons-y !</a> <!--Page rechercher un trajet-->
                </div>                
            </main> 

            <!--Barre de navigation BAS mobile / Tablette-->
            <nav class="nav-b-mob">
                <a href="../html/search-trajet.php" class="nav-b-btn"><i class="bi bi-search"></i></a><!--Page rechercher un trajet-->
                <a href="../html/propo-trajet.php" class="nav-b-btn"><i class="fas fa-road"></i></a><!--Page proposition de trajet-->
            </nav>

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
             <script src="../js/autocompletion-ville.js"></script>
            <script src="../js/navigation.js"></script>
            <script src="../js/menu-deroulant.js"></script>
        </body>
    </html>