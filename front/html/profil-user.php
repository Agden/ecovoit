<?php session_start(); ?>
<!DOCTYPE html>
    <html lang="fr">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Profil conducteur</title>
            <link rel="stylesheet" href="../css/profil-user.css">
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
                                <p><b>Crédits :</b> 13</p>
                            </div>
<hr>
                            <div class="card-1-body">
                                <button id="modifierInfos" class="btn-edit"><i class="bi bi-pencil-fill"></i> Modifier</button>
                                <form class="form-modif" id="infosForm" style="display: none;">
                                    <label>Nom - Prénom : <input type="text" name="nomPrenom" id="inputNomPrenom" /></label><br>
                                    <label>N° Téléphone : <input type="tel" name="telephone" id="inputTel" /></label><br>
                                    <label>Email : <input type="email" name="email" id="inputEmail" /></label><br>
                                    <label>N° Permis : <input type="text" name="permis" id="inputPermis" /></label><br>
                                    <label>Marque voiture : <input type="text" name="marque" id="inputMarque" /></label><br>
                                    <label>Modèle voiture : <input type="text" name="modele" id="inputModele" /></label><br>
                                    <label>Plaque d'IM : <input type="text" name="plaque" id="inputPlaque" /></label><br>
                                    <label>Date 1ère immatriculation : <input type="month" name="dateImmat" id="inputDateImmat" /></label><br>
                                    <button type="submit">Sauvegarder</button>
                                </form>

                                <div id="infosDisplay">
                                    <p><b>N° Téléphone </b>: <span id="tel">06 ** ** ** 25</span></p>
                                    <p><b>E-mail </b>: <span id="email">ecovoit-test@gmail.com</span></p>
                                    <p><b>N° Permis </b>: <span id="permis">120359600511</span></p>
                                    <p><b>Marque voiture </b>: <span id="marque">Toyota</span></p>
                                    <p><b>Modèle voiture </b>: <span id="modele">CHR</span></p>
                                    <p><b>Plaque d'IM </b>: <span id="plaque">CS-596-GD</span></p>
                                    <p><b>Date 1ère immatriculation </b>: <span id="dateImmat">05/2023</span></p>
                                </div>
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
        
                        <div class="modif-3">
                            <a href="#"><i class="bi bi-pencil-fill"><small>Modifier</small></i></a>
                        </div>
                        <form id="description-form" class="description-form">                                              
                            <label for="description">Votre description personnelle :</label>
                            <br>
                            <textarea id="description" name="description" rows="4" cols="50" maxlength="500">Description...</textarea>
                            <button class="btn-slide" type="submit">C'est OK</button>
                        </form>
                            
                        <div class="les-boutons">
                                <a class="btn-slide-2" href="../html/propo-trajet.php">Proposer un trajet</a>
                                <a class="btn-slide-2" href="../html/propo-trajet.php#mes-trajets-en-cours">Trajets proposés</a>
                                <a class="btn-slide-2" href="../html/hist-conducteur.php">Historique</a>                            
                        </div>
                    </div>
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