<?php session_start(); ?>
<!DOCTYPE html>
    <html lang="fr">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Messagerie</title>
            <link rel="stylesheet" href="../css/messagerie.css">
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
                    <img src="../img/route-7.jpg" alt="Trajet écoresponsable">
                </div>
            </section>

            <!-- CORPS -->            
            <main class="main-container">
                <a class="retour" href="../../index.php">  RETOUR  </a>
                <div class="titre">
                    <h2>Mes messages</h2>
                </div>
    
                <div class="messagerie-container">
                <!-- Liste des contacts -->
                    <div class="contacts">
                        <h2>Mes conversations</h2>
                        <ul>
                            <li class="contact actif">Alice</li>
                            <li class="contact">Bob</li>
                            <li class="contact">Charlie</li>
                        </ul>
                    </div>

                    <!-- Zone de discussion -->
                    <div class="discussion">
                        <button class="back-btn"><i class="bi bi-arrow-left"></i> Retour</button>
                        <div class="messages">
                            <div class="message-recu">Salut, comment ça va ?</div>
                            <div class="message-envoye">Très bien et toi ?</div>
                        </div>

                        <form class="zone-saisie">
                            <input type="text" placeholder="Tape ton message...">
                            <button class="btn-envoie" type="submit">Envoyer</button>
                        </form>
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
            <script src="../js/menu-deroulant.js"></script>
            <script src="../js/messagerie.js"></script>
        </body>
    </html>