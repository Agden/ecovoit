<?php session_start(); ?>
<!DOCTYPE html>
    <html lang="fr">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Proposer un trajet</title>
            <link rel="stylesheet" href="../css/propo-trajet.css">
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
                    <img src="../img/route-7.jpg" alt="Trajet écoresponsable">
                </div>
            </section>

            <!-- CORPS -->            
            <main class="main-container">                
                    <a href="../html/profil-user.php">Retour à mon profil</a>                

                <section class="trajet-form">
                    <h2>Proposer un trajet</h2>

                    <form action="../../back/save-trajet.php" method="POST"> 
                        <div class="form-partie-1">   
                            <div class="depart-zone">
                                <label for="depart">Départ</label>
                                <input type="text" id="depart" name="lieu_depart" placeholder="Ville de départ" class="barre-recherche" required>
                            <div id="suggestions-depart" class="suggestions-list"></div>
                            </div>

                            <div class="arrivee-zone">
                                <label for="arrivee">Arrivée</label>
                                <input type="text" id="arrivee" name="lieu_arrivee" placeholder="Ville d'arrivée" class="barre-recherche" required>
                                <div id="suggestions-arrivee" class="suggestions-list"></div>
                            </div>

                            <div class="cadre-btn">
                                <button class="searchBtn" id="searchBtn">Rechercher</button>
                            </div> 
                            <div class="carte" id="carte"></div>                    
                        </div>
                        <div class="form-partie-2">
                            <div class="date-zone">
                                <label for="date">Date</label>
                                <input type="date" id="date" name="date_depart" required>
                            </div>

                            <div class="heure-zone">
                                <label for="heure">Heure</label>
                                <input type="time" id="heure" name="heure_depart" required>
                            </div>

                            <div class="place-dispo-zone">
                                <label for="places">Places disponibles</label>
                                <input type="number" id="places" name="nb_place" min="1" max="4" required>
                            </div>

                            <div class="prix-zone">
                                <label for="prix">Prix par passager (€)</label>
                                <input type="number" id="prix" name="prix_personne" min="1" step="0.5">
                            </div>

                            <div class="marque-zone">
                                <label for="marque">Marque du vehicule</label>
                                <input type="text" id="marque" name="marque">
                            </div>

                            <div class="modele-zone">
                                <label for="modele">Modèle du Vehicule</label>
                                <input type="text" id="modele" name="modele">
                            </div>

                            <div class="energie-zone">
                                <label for="energie">Energie du véhicule</label>
                                <input type="text" id="energie" name="energie">
                            </div>

                            <div class="couleur-zone">
                                <label for="couleur">Couleur du véhicule</label>
                                <input type="text" id="couleur" name="couleur">
                            </div>
                    
                            <div class="option-zone">
                                <fieldset>
                                    <legend>Options</legend>
                                    <label><input type="checkbox"> Bagages acceptés</label>
                                    <label><input type="checkbox"> Animaux acceptés</label>
                                </fieldset>
                            </div>

                            <div class="commentaire-zone">
                                <label for="commentaire">Commentaire</label>
                                <textarea id="commentaire" name="commentaire" placeholder="Infos complémentaires…"></textarea>
                            </div>

                            <div class="cadre-btn-proposer">
                                <button class="btn-proposer" type="submit">Proposer le trajet</button>
                            </div>
                        </div>
                    </form>
                </section>

                <section class="mes-trajets">
                    <h3 id="mes-trajets-en-cours">Mes trajets proposés</h3>
                    <div class="cadre-mes-propositions">
                    <?php
                        require '../../back/config.local.php';
                        $stmt = $pdo->prepare("
                            SELECT c.*, v.modele, v.energie, m.libelle as marque
                            FROM covoiturage c
                            JOIN voiture v ON c.voiture_id = v.voiture_id
                            JOIN marque m ON v.marque_id = m.marque_id
                            WHERE c.chauffeur_id = ?
                            ORDER BY c.date_depart DESC
                        ");
                        $stmt->execute([$_SESSION['user_id']]);
                        $trajets = $stmt->fetchAll();

                        if (empty($trajets)): ?>
                            <p>Vous n'avez pas encore proposé de trajet.</p>
                        <?php else: ?>
                            <?php foreach ($trajets as $trajet): ?>
                                <div class="proposition-1">
                                    <p><b>Départ :</b> <?= htmlspecialchars($trajet['lieu_depart']) ?></p>
                                    <p><b>Arrivée :</b> <?= htmlspecialchars($trajet['lieu_arrivee']) ?></p>
                                    <p><b>Le :</b> <?= date('d/m/Y', strtotime($trajet['date_depart'])) ?></p>
                                    <p><b>Heure :</b> <?= $trajet['heure_depart'] ?></p>
                                    <p><b>Nb place :</b> <?= $trajet['nb_place'] ?></p>
                                    <p><b>Prix / personne :</b> <?= $trajet['prix_personne'] ?>€</p>
                                    <p><b>Véhicule :</b> <?= htmlspecialchars($trajet['marque']) ?> <?= htmlspecialchars($trajet['modele']) ?></p>
                                    <p><b>Énergie :</b> <?= htmlspecialchars($trajet['energie']) ?></p>
                                    <div class="btn-bas-propo">
                                        <button class="btn-modifier" type="button">Modifier</button>
                                        <button class="btn-supprimer" type="button">Supprimer</button>
                                        <button class="btn-covoiturage" type="button">Démarrer</button>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
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
            <script src="../js/recherche.js"></script>
            <script src="../js/navigation.js"></script>
            <script src="../js/menu-deroulant.js"></script>
            <script src="../js/btn-covoiturage.js"></script>
        </body>
    </html>