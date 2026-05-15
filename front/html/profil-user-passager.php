<?php session_start(); ?>
<!DOCTYPE html>
    <html lang="fr">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Profil passager</title>
            <link rel="stylesheet" href="../css/profil-user-passager.css">
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
                <div class="profil-complet">
                    <div class="type-passager">
                        <div class="conducteur">
                            <a href="../html/profil-user.php">Profil conducteur</a>
                        </div>
                        <div class="passager">
                            <a href="../html/profil-user-passager.php">Profil passager</a>
                        </div>                            
                    </div>
                    <div class="body-1et2">
                        <div class="body-1">
                            <div class="photo-profil">
                                <img src="../img/vapilo.jpg" alt="Photo de profil">                    
                                <h3>Bienvenue, <span id="user-prenom"></span> <span id="user-nom"></span> !
                            </div>
            <hr>
                            <div class="card-1-body">                                
                                <i class="bi bi-pencil-fill"><small>Modifier</small></i> </a>
                                <p><b>N° Téléphone </b>: <span id="user-telephone"></span></p>
                                <p><b>Email : </b><span id="user-email"></span></p>
                                <p><b>Crédits </b>: 17 </p>
                            </div>
                        </div>

                        <div class="body-2">
                            <div class="titre-card-2">
                                <h3>Préférences</h3>
                            </div>
                            <div class="card-2-body">
                                <table class="tableau">
                                    <tr>
                                        <th>Musique</th>
                                        <td class="editable">Genre préféré</td>
                                        <td><small><button class="btn-modifier">Modifier</button></small></td>
                                    </tr>
                                    <tr>
                                        <th>Animaux</th>
                                        <td class="editable">Non</td>
                                        <td><small><button class="btn-modifier">Modifier</button></small></td>
                                    </tr>
                                    <tr>
                                        <th>Bavardage</th>
                                        <td class="editable">Oui</td>
                                        <td><small><button class="btn-modifier">Modifier</button></small></td>
                                    </tr>
                                    <tr>
                                        <th>Fumeur</th>
                                        <td class="editable">Oui</td>
                                        <td><small><button class="btn-modifier">Modifier</button></small></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="body-3">            
                        <div class="titre-card-3">
                            <h3>A propos de moi</h3>
                        </div>
        
                        <form id="description-form" class="description-form">                                              
                            <label for="description">Votre description personnelle :</label>
                            <br>
                            <textarea id="description" name="description" rows="4" cols="50" maxlength="500">Description...</textarea>
                            <button class="btn-slide" type="submit">C'est OK</button>
                        </form>

                        <div class="les-boutons">
                            <a class="btn-mes-trajets" href="#">Tout mes trajets</a><!--Page historique-->
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
            <script src="../js/menu-deroulant.js"></script>
            <script src="../js/profil-user.js"></script>
        </body>
    </html>