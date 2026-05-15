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
            <?php include 'nav-top.php'; ?>

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
                            <img src="../img/photo-profil-2.jpg">                            
                                <h3>Gauthier R.</h3>
                                ⭐️⭐️⭐️⭐️                                                    
                        </section>
                        <section class="section-2">
                            <h4>Vehicule</h4>
                            <p><b>Marque :</b> Citroën</p>
                            <p><b>Modèle :</b> C4</p>
                            <p><b>Couleur :</b> Noire</p>
                            <p><b>Plaque d'IM :</b>DD-355-AX </p>
                        </section>
                        <section class="section-3">
                            <h3>Description personnelle</h3>
                            <p><i>Ici, c'est comme chez McDo, venez comme vous êtes !</i></p>
                        </section>
                    </div>

                    <div class="card-preference">
                        <h3>Préférences</h3>
                        <p><b>Musique :</b> Oui <i class="bi bi-check"></i></p>
                        <p><b>Animaux :</b> Oui <i class="bi bi-check"></i></p>
                        <p><b>Bavardage :</b> Oui <i class="bi bi-check"></i></p>
                        <p><b>Fumeur :</b> Oui <i class="bi bi-check"></i></p>
                    </div>

                    <div class="card-info-trajet">
                        <h3>Infos trajet</h3>
                        <div class="all">
                            <div class="gauche">
                                <p><b>Départ :</b> Argentan - 13h00</p>
                                <p><b>Arrivée :</b> Lille - 17h45</p>
                                <p><b>Date :</b> 24 / 07 / 2025</p>
                            </div>
                            <div class="droite">
                                <p><b>Places restantes :</b> 1</p>
                                <p><b>Prix :</b> 30 €n</p>
                                <p><b>Voyage Eco :</b> Non</p>
                            </div>
                        </div>
                        <button type="submit">RESERVER</button>
                        <a class="btn-retour" href="../html/recherche.php">RETOUR</a>                      
                    </div>

                    <div class="card-note-avis">                        
                        <h3>Notes & Avis</h3>

                        <section class="commentaire">
                            <h4>Sarah.</h4>                            
                            <div class="etoile-titre">
                                <p>⭐️⭐️⭐️⭐️⭐️ - <b>Avec un chat en caisse de transport </b></p>
                            </div>
                            <div class="text-commentaire">
                                <p>Très bon covoiturage. Gauthier a été très compréhensif 
                                    avec mon petit chat et a roulé tout en douceur. Merci 
                                    pour ta gentillesse !</p>
                            </div>
                        </section>
                        

                        <section class="commentaire">                            
                            <h4>Léo Poppy</h4>                            
                            <div class="etoile-titre">
                                <p>⭐️⭐️⭐️⭐️ - <b>Vive le GPS</b></p>
                            </div>
                            <div class="text-commentaire">
                                <p>Le trajet s’est bien passé, conducteur sympa, 
                                    on a eu un petit détour à cause du GPS mais 
                                    rien de grave. Bonne ambiance et bonne musique, 
                                    je referai un trajet avec lui sans souci.</p>
                            </div>
                        </section>

                        <section class="commentaire">
                            <div class="prenom">
                                <h4>Yasmine 45</h4>
                            </div>
                            <div class="etoile-titre">
                                <p>⭐️⭐️⭐️⭐️⭐️ - <b>Merci</b></p> 
                            </div>
                            <div class="text-commentaire">
                                <p>Conducteur très courtois, bonne communication 
                                    avant le départ. Voiture propre, conduite fluide, 
                                    tout s’est déroulé comme prévu. Parfait !</p>
                            </div>
                        </section>

                        <section class="commentaire">
                            <div class="prenom">
                                <h4>Hugo K.</h4>
                            </div>
                            <div class="etoile-titre">
                                <p>⭐️⭐️⭐️⭐️ - <b>Gauthier était fatigué</b></p> 
                            </div>
                            <div class="text-commentaire">
                                <p>Trajet super cool. J’aurais juste aimé un peu 
                                    plus discuter pendant le voyage mais Gauthier avait l'air fatigué 
                                    sinon tout nickel. À refaire !</p>
                            </div>
                        </section>

                        <section class="commentaire">
                            <div class="prenom">
                                <h4>Monique 70</h4>
                            </div>
                            <div class="etoile-titre">
                                <p>⭐️⭐️⭐️⭐️ - <b>Merci</b></p> 
                            </div>
                            <div class="text-commentaire">
                                <p>Chauffeur respectueux et agréable. Il m’a aidée avec ma 
                                    valise. Un petit peu rapide sur l’autoroute à mon goût, 
                                    mais très bon trajet dans l’ensemble.</p>
                            </div>
                        </section>
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
        </body>
    </html>