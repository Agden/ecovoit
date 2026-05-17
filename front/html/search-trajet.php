<?php session_start(); ?>
<!DOCTYPE html>
    <html lang="fr">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Recherchez un trajet</title>
            <link rel="stylesheet" href="../css/search-trajet.css">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
            <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
            <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
            <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css"/>
        </head>
        <body>
            <?php include 'nav-top.php'; ?>

            <section class="bandeau-photo">
                <div class="img-bandeau">
                    <img src="../img/route-2.jpg" alt="Trajet écoresponsable">
                </div>
            </section>

            <main class="main-container">
                <div id="donnees-recherche" 
                    data-depart="<?= htmlspecialchars($_GET['lieu_depart'] ?? '') ?>" 
                    data-arrivee="<?= htmlspecialchars($_GET['lieu_arrivee'] ?? '') ?>">
                </div>
                <div class="titre">
                    <h1>Rechercher votre trajet</h1>
                </div>

                <form method="GET" action="">
                    <div class="recherche-container">
                        <div class="barre-depart">
                            <input type="text" id="depart" name="lieu_depart" placeholder="Départ..." class="barre-recherche">
                            <div id="suggestions-depart" class="suggestions-list"></div>
                        </div>
                        <div class="barre-arrivee">
                            <input type="text" id="arrivee" name="lieu_arrivee" placeholder="Arrivée..." class="barre-recherche">
                            <div id="suggestions-arrivee" class="suggestions-list"></div>
                        </div>
                        <div class="date-zone">
                            <input type="date" name="date_depart">
                        </div>
                    </div>

                    <div class="filtres">
                        <h4>Filtres</h4>
                        <div class="filtres-zone-1">
                            <fieldset>
                                <legend>Voyage écoresponsable</legend>
                                <label><input type="checkbox" name="eco" value="1"> Oui, absolument</label>
                            </fieldset>
                        </div>
                        <div class="filtres-zone-2">
                            <fieldset>
                                <legend>Note minimale conducteur</legend>
                                <select name="note_min">
                                    <option value="">Peu importe</option>
                                    <option value="1">1+</option>
                                    <option value="2">2+</option>
                                    <option value="3">3+</option>
                                    <option value="4">4+</option>
                                    <option value="5">5</option>
                                </select>
                            </fieldset>
                        </div>
                        <div class="prix-zone">
                            <label for="prix">Prix max / passager (€)</label>
                            <input type="number" id="prix" name="prix_max" min="0" step="0.5">
                        </div>
                    </div>

                    <div class="cadre-btn">
                        <button class="searchBtn" type="submit">Rechercher</button>
                    </div>
                </form>
                <div class="carte" id="carte"></div>

                <?php
                if (isset($_GET['lieu_depart']) && isset($_GET['lieu_arrivee'])) {
                    require '../../back/config.local.php';

                    $lieu_depart  = trim($_GET['lieu_depart']);
                    $lieu_arrivee = trim($_GET['lieu_arrivee']);
                    $date_depart  = trim($_GET['date_depart'] ?? '');
                    $prix_max     = $_GET['prix_max'] ?? null;
                    $eco          = isset($_GET['eco']) ? 1 : null;

                    $sql = "SELECT c.*, u.pseudo, u.photo,
                            v.modele, v.energie, m.libelle as marque
                            FROM covoiturage c
                            JOIN users u ON c.chauffeur_id = u.id
                            JOIN voiture v ON c.voiture_id = v.voiture_id
                            JOIN marque m ON v.marque_id = m.marque_id
                            WHERE c.lieu_depart LIKE ?
                            AND c.lieu_arrivee LIKE ?
                            AND c.nb_place > 0
                            AND c.statut = 'prévu'";

                    $params = ["%$lieu_depart%", "%$lieu_arrivee%"];

                    if (!empty($date_depart)) {
                        $sql .= " AND c.date_depart = ?";
                        $params[] = $date_depart;
                    }
                    if ($prix_max) {
                        $sql .= " AND c.prix_personne <= ?";
                        $params[] = $prix_max;
                    }
                    if ($eco) {
                        $sql .= " AND v.energie = 'électrique'";
                    }

                    $stmt = $pdo->prepare($sql);
                    $stmt->execute($params);
                    $resultats = $stmt->fetchAll();

                    if (empty($resultats)): ?>
                        <p>Aucun trajet disponible pour cette recherche.</p>
                    <?php else: ?>
                        <div class="zone-resultats">
                            <?php foreach ($resultats as $r): ?>
                                <div class="carte-trajet">
                                    <p><b>Départ :</b> <?= htmlspecialchars($r['lieu_depart']) ?></p>
                                    <p><b>Arrivée :</b> <?= htmlspecialchars($r['lieu_arrivee']) ?></p>
                                    <p><b>Date :</b> <?= date('d/m/Y', strtotime($r['date_depart'])) ?></p>
                                    <p><b>Heure :</b> <?= $r['heure_depart'] ?></p>
                                    <p><b>Places restantes :</b> <?= $r['nb_place'] ?></p>
                                    <p><b>Prix :</b> <?= $r['prix_personne'] ?>€</p>
                                    <p><b>Chauffeur :</b> <?= htmlspecialchars($r['pseudo'] ?? 'Anonyme') ?></p>
                                    <p><b>Véhicule :</b> <?= htmlspecialchars($r['marque']) ?> <?= htmlspecialchars($r['modele']) ?></p>
                                    <p><b>Énergie :</b> <?= htmlspecialchars($r['energie']) ?>
                                        <?php if (strtolower($r['energie']) === 'électrique'): ?>
                                            🌿 <span style="color:green">Voyage écologique</span>
                                        <?php endif; ?>
                                    </p>
                                    <a href="fiche-1.php?id=<?= $r['covoiturage_id'] ?>" class="btn-details">Détail</a>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif;
                } ?>
            </main>

            <?php include 'nav-bottom.php'; ?>

            <footer>
                <div class="container-footer">
                    <div class="all-cadre">
                        <section class="cadre-footer-1">
                            <a href="../html/mention.php" class="small-text-footer">Mentions Légales</a>
                            <a href="../html/pol-conf.php" class="small-text-footer">Politique de confidentialité</a>
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

            <script src="../js/recherche.js"></script>
            <script src="../js/navigation.js"></script>
            <script src="../js/menu-deroulant.js"></script>
        </body>
    </html>