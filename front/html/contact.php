<?php session_start(); ?>
<!DOCTYPE html>
    <html lang="fr">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Nous contacter</title>
            <link rel="stylesheet" href="../css/contact.css">
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
                    <img src="../img/route-1.jpg" alt="Trajet écoresponsable">
                </div>
            </section>

            <!-- CORPS -->
            <main>
                <h1>Nous contacter</h1>
                <section class="card-contact">
                    <img src="../img/image-contact.jpg">
                    <div class="formulaire">
                        <form action="/back/data-contact.php" method="POST">
                            <div class="nom">
                                <label for="nom">Nom complet</label>
                                <input type="text" id="nom" name="nom" placeholder="Nom - Prénom" required>
                            </div>
                            <div class="email">
                                <label for="email">Adresse e-mail</label>
                                <input type="email" id="email" name="email" placeholder="Email" required>
                            </div>
                            <div class="motif">
                                <label for="motif">Motif du contact</label>
                                <input type="text" id="motif" name="motif" placeholder="Motif" required>
                            </div>
                            <div class="message">
                                <label for="message">Message</label>
                                <textarea id="message" name="message" placeholder="Entrez votre message ici..."></textarea>
                            </div>
                            <div class="bouton-form">
                                <button class="btnEnvoie" type="submit">Envoyer</button>
                            </div>
                        </form>
                    </div>
                </section>

                <section class="card-reseau">
                    <div class="cadre-telephone">
                        <i class="bi bi-telephone-fill"></i>
                        <p>06.**.**.**.25</p>
                    </div>

                    <div class="cadre-siege">
                        <i class="bi bi-geo-alt-fill"></i>
                        <p>7 rue d'une adresse quelconque</p>
                    </div>

                    <div class="cadre-mail">
                        <i class="bi bi-envelope-fill"></i>
                        <p>ecovoit.test@gmail.com</p>
                    </div>
                </section>

                <!--Barre de navigation BAS mobile / Tablette-->
                <?php include 'nav-bottom.php'; ?>
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