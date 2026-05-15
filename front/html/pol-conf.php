<?php session_start(); ?>
<!DOCTYPE html>
    <html lang="fr">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Politique de confidentialité</title>
            <link rel="stylesheet" href="../css/pol-conf.css">
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
                    <img src="../img/route-7.jpg" alt="Trajet écoresponsable">
                </div>
            </section>

            <!-- CORPS -->            
            <main class="main-container">
                <div class="titre-page">
                    <h2>Politique de confidentialité - EcoVoit'</h2>
                </div>
                <div class="text-page">
                    <div class="intro">
                        <p><b>La présente politique de confidentialité a pour objectif d’informer 
                            les utilisateurs du site EcoVoit' sur la manière dont leurs données 
                            personnelles sont collectées et traitées.</b>
                        </p>
                    </div>
                    <h3>1. Responsable du traitement</h3>
                    <p>Le responsable du traitement est EcoVoit', entreprise spécialisée dans 
                        le covoiturage à préférence pour les trajets écologiques<br>
                        Adresse : Une adresse fictive<br>
                        Email : ecovoit.test@gmail.com<br>
                        Téléphone : 06 ** ** ** 85</p>

                    <h3>2. Données personnelles collectées</h3>
                    <p>Dans le cadre de l’utilisation du site, les données suivantes peuvent 
                        être collectées :
                        <ul>
                            <li>Nom</li>
                            <li>Prénom</li>
                            <li>Adresse e-mail</li>
                            <li>Message transmis via le formulaire de contact</li>
                        </ul>
                    </p>
                    <p>Aucune autre donnée personnelle n'est collectée sans votre consentement</p>

                    <h3>3. Finalités de la collecte</h3>
                    <p>Les données recueillies sont utilisées uniquement pour :
                        <ul>
                            <li>répondre à vos demandes de contact</li>
                            <li>assurer le suivi des échanges</li>
                            <li>améliorer la qualité de nos services et de notre site</li>
                        </ul>
                    </p>
                        <p><b>EcoVoit'</b> ne vend, ne loue et ne cède aucune donnée 
                        personnelle à des tiers.
                    </p>

                    <h3>4. Base légale du traitement</h3>
                    <p>Le traitement de vos données repose sur votre consentement, 
                        que vous exprimez en remplissant et en envoyant le formulaire 
                        de contact disponible sur le site
                    </p>

                    <h3>5. Durée de conservation</h3>
                    <p>Les données personnelles transmises via le formulaire de contact 
                        sont conservées uniquement pendant la durée nécessaire au 
                        traitement de la demande et à la relation commerciale qui peut 
                        en découler. Elles peuvent être supprimées à tout moment sur 
                        simple demande de l’utilisateur. Aucune donnée n’est stockée 
                        de manière permanente sur le site web EcoVoit'.
                    </p>

                    <h3>6. Hebergement et sécurité des données</h3>
                    <p>Le site EcoVoit' est hébergé par "iFastNet" 
                        dont le siège social est situé à Newcastle upon Tyne au 
                        Royaume-Uni. iFastNet assure la gestion technique et la 
                        diffusion des pages du site de manière sécurisée (certificat 
                        HTTPS, surveillance des accès, pare-feu, etc.). Bien que les 
                        serveurs puissent être situés en dehors de l’Union européenne, 
                        iFastNet applique les clauses contractuelles types de la 
                        Commission européenne garantissant un niveau de protection 
                        conforme au RGPD.</p>
                    <p>Les messages transmis via le formulaire de contact sont 
                        temporairement stockés sur les serveurs de iFastNet le temps 
                        de leur transfert, puis supprimés automatiquement.</p>

                    <h3>7. Droits des utilisateurs</h3>
                    <p>Conformément au Règlement Général sur la Protection des Données 
                        <b>(RGPD)</b> vous disposez des droits suivants :
                        <ul>
                            <li>Droit d'accès à vos données</li>
                            <li>Droit de rectification</li>
                            <li>Droit d'effacement</li>
                            <li>Droit de limiation du traitement</li>
                            <li>Droit d'opposition</li>
                            <li>Droit à la portabilité des données</li>
                        </ul>
                    </p>
                    <p>Pour exercer ces droits, vous pouverz adresser votre demande à 
                        l'adresse e-mail suivant : ecovoit-test@gmail.com<br>
                        Une réponse vous sera apporté dans un délai maximum de 30 jours.</p>

                    <h3>8. Cookies</h3>
                    <p>Le site <b>EcoVoit'</b> n’utilise aucun cookie de suivi, de mesure 
                        d’audience ou publicitaire. Seuls des cookies strictement techniques 
                        et temporaires peuvent être utilisés afin d’assurer le bon fonctionnement 
                        et la sécurité du site (par exemple, lors de l’envoi d’un formulaire).<br>
                        Ces cookies ne collectent aucune donnée personnelle et ne nécessitent donc 
                        pas de consentement préalable.</p>

                    <h3>9. Modifications de la politique de confidentialité</h3>
                    <p>EcoVoit' se réserve le droit de modifier la présente politique à tout 
                        moment, notamment pour se conformer aux évolutions législatives ou réglementaires. 
                        La date de la dernière mise à jour est indiquée ci-dessous.<br>
                    <b>Dernière mise à jour : 03 Avril 2026</b></p>
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
            <script src="../js/profil-user.js"></script>
            <script src="../js/navigation.js"></script>
            <script src="../js/menu-deroulant.js"></script>
        </body>
    </html>