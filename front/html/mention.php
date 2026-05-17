<?php session_start(); ?>
<!DOCTYPE html>
    <html lang="fr">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Mentions légales</title>
            <link rel="stylesheet" href="../css/mention.css">
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
                <section class="mentions-legales">
                    <h2>Mentions légales</h2>
                    <p><strong>Nom du site :</strong> EcoVoit’ (Projet fictif dans le cadre d’un examen)</p>

                    <p><strong>Responsable de publication :</strong> DENHAERYNCK Agathe (étudiante - projet formation)</p>

                    <p><strong>Hébergement :</strong> Ce site est un prototype local hébergé temporairement à des fins de test. Il n’est pas mis en ligne publiquement.</p>

                    <p><strong>Nature du projet :</strong> Cette application web et mobile sont des créations fictives, conçues exclusivement dans le cadre d’un projet pédagogique.  
                        Aucune mise en service réelle n’est prévue à ce jour.</p>

                    <p><strong>Données personnelles :</strong> Aucune donnée personnelle réelle n’est collectée, traitée ni enregistrée.  
                        Les formulaires et entrées utilisateurs sont simulés pour des tests uniquement.</p>

                    <p><strong>Propriété intellectuelle :</strong> Tous les contenus, images et textes utilisés dans ce prototype sont soit des créations personnelles et images libres de droits, soit utilisés à des fins non commerciales dans un cadre pédagogique.  
                        Les logos et images appartiennent à leurs propriétaires respectifs.</p>

                    <p><strong>Utilisation des services :</strong> Aucune fonctionnalité de covoiturage réelle n’est active. Les trajets affichés, les cartes, les comptes ou les messages sont fictifs et ne doivent pas être utilisés à des fins réelles.</p>

                    <p><strong>Contact :</strong> Pour toute question relative à ce projet fictif, vous pouvez contacter l’étudiante en charge à l’adresse suivante :  
                        <a href="mailto:ecovoit.test@gmail.com">ecovoit.test@gmail.com</a></p>
                </section>
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