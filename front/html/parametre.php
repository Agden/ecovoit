<?php session_start(); ?>
<!DOCTYPE html>
    <html lang="fr">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Paramètres</title>
            <link rel="stylesheet" href="../css/parametre.css">
            <!-- Lien vers Bootstrap Icons -->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
        </head>
        <body>
                <!-- Barre de navigation mobile/tablette (haut) -->
            <?php include 'nav-top.php'; ?>

            <section class="bandeau-photo">
                <div class="img-bandeau">
                    <img src="../img/route-3.jpg" alt="Trajet écoresponsable">
                </div>
            </section>

            <!-- CORPS -->            
            <main class="main-container">
                <div class="titre">
                    <h1>Paramètres</h1>
                </div>

                <div class="container-parametre">
            <!--Notifs-->
                    <div class="notification">
                        <div class="titre-notification">
                            <h4>Notifications</h4>
                        </div>

                        <div class="text-notification">
                            <label class="coche-chat">
                                <input type="checkbox" id="notif-chat">
                            <span class="slider"></span>                 
                                Chat
                            </label>

                            <label class="coche-passager">
                                <input type="checkbox" id="notif-passager">
                                <span class="slider"></span>                 
                                Nouveau passager <i>(si vous êtes conducteur)</i>
                            </label>
                            <label class="coche-trajet">
                                <input type="checkbox" id="notif-trajet">
                                <span class="slider"></span>                 
                                Nouveau trajet ajouté <i>(si un trajet correspond à vos recherches)</i>
                            </label>
                        </div>
                    </div>

            <!--Sécurité-->
                    <div class="securite">
                        <div class="titre-securite">
                            <h4>Sécurité</h4>
                        </div>
                        <div class="btn-securite">
                            <button type="submit" class="modifier-mdp">Modifier le mot de passe</button>
                        </div>
                    </div>

            <!--Compte-->
                    <div class="compte">
                        <div class="titre-compte">
                            <h4>Compte</h4>
                        </div>
                        <div class="btn-compte">
                            <form action="../../back/logout.php" method="post">
                                <button type="submit" class="btn-deconnexion">Se déconnecter</button>
                            </form>
                            <form action="../../back/delete-account.php" method="post">
                                <button type="submit" class="btn-supprimer">Supprimer le compte</button>
                            </form>
                        </div>
                    </div>
                </div>
            </main>
            <!--Barre de navigation BAS mobile / Tablette-->
            <?php include 'nav-bottom.php'; ?>

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