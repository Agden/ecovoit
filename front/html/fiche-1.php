<?php 
session_start();
require '../../back/config.local.php';

// Récupérer l'ID du covoiturage
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if (!$id) {
    header("Location: search-trajet.php");
    exit;
}

// Récupérer les infos du trajet
$stmt = $pdo->prepare("
    SELECT c.*, u.pseudo, u.photo, u.id as chauffeur_id,
    v.modele, v.energie, v.couleur, v.immatriculation, m.libelle as marque
    FROM covoiturage c
    JOIN users u ON c.chauffeur_id = u.id
    JOIN voiture v ON c.voiture_id = v.voiture_id
    JOIN marque m ON v.marque_id = m.marque_id
    WHERE c.covoiturage_id = ?
");
$stmt->execute([$id]);
$trajet = $stmt->fetch();

if (!$trajet) {
    header("Location: search-trajet.php");
    exit;
}

// Récupérer les préférences du chauffeur
$stmt = $pdo->prepare("SELECT * FROM preferences WHERE user_id = ?");
$stmt->execute([$trajet['chauffeur_id']]);
$prefs = $stmt->fetch();

// Récupérer les avis validés du chauffeur
$stmt = $pdo->prepare("
    SELECT a.*, u.pseudo 
    FROM avis a
    JOIN users u ON a.user_id = u.id
    WHERE a.covoiturage_id IN (
        SELECT covoiturage_id FROM covoiturage WHERE chauffeur_id = ?
    )
    AND a.statut = 'validé'
");
$stmt->execute([$trajet['chauffeur_id']]);
$avis = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Détail du trajet</title>
        <link rel="stylesheet" href="../css/fiche.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    </head>
    <body>
        <?php include 'nav-top.php'; ?>

        <section class="bandeau-photo">
            <div class="img-bandeau">
                <img src="../img/route-2.jpg" alt="Trajet écoresponsable">
            </div>
        </section>

        <main class="maini-container">
            <div class="fiche-info-profil">
                <a href="search-trajet.php" class="link-retour">RETOUR</a>
                <h1>Fiche détails</h1>

                <!-- Profil chauffeur -->
                <div class="card-profil">
                    <section class="section-1">
                        <?php if ($trajet['photo']): ?>
                            <img src="../img/<?= htmlspecialchars($trajet['photo']) ?>" alt="photo profil">
                        <?php else: ?>
                            <img src="../img/default-profil.jpg" alt="photo profil">
                        <?php endif; ?>
                        <h3><?= htmlspecialchars($trajet['pseudo'] ?? 'Anonyme') ?></h3>
                    </section>
                    <section class="section-2">
                        <h4>Véhicule</h4>
                        <p><b>Marque :</b> <?= htmlspecialchars($trajet['marque']) ?></p>
                        <p><b>Modèle :</b> <?= htmlspecialchars($trajet['modele']) ?></p>
                        <p><b>Couleur :</b> <?= htmlspecialchars($trajet['couleur']) ?></p>
                        <p><b>Énergie :</b> <?= htmlspecialchars($trajet['energie']) ?></p>
                    </section>
                </div>

                <!-- Préférences -->
                <div class="card-preference">
                    <h3>Préférences</h3>
                    <?php if ($prefs): ?>
                        <p><b>Fumeur :</b> <?= $prefs['fumeur'] ? 'Oui <i class="bi bi-check"></i>' : 'Non <i class="bi bi-x"></i>' ?></p>
                        <p><b>Animaux :</b> <?= $prefs['animaux'] ? 'Oui <i class="bi bi-check"></i>' : 'Non <i class="bi bi-x"></i>' ?></p>
                        <?php if ($prefs['commentaire']): ?>
                            <p><b>Commentaire :</b> <?= htmlspecialchars($prefs['commentaire']) ?></p>
                        <?php endif; ?>
                    <?php else: ?>
                        <p><i>Aucune préférence renseignée.</i></p>
                    <?php endif; ?>
                </div>

                <!-- Infos trajet -->
                <div class="card-info-trajet">
                    <h3>Infos trajet</h3>
                    <div class="all">
                        <div class="gauche">
                            <p><b>Départ :</b> <?= htmlspecialchars($trajet['lieu_depart']) ?> - <?= $trajet['heure_depart'] ?></p>
                            <p><b>Arrivée :</b> <?= htmlspecialchars($trajet['lieu_arrivee']) ?></p>
                            <p><b>Date :</b> <?= date('d/m/Y', strtotime($trajet['date_depart'])) ?></p>
                        </div>
                        <div class="droite">
                            <p><b>Places restantes :</b> <?= $trajet['nb_place'] ?></p>
                            <p><b>Prix :</b> <?= $trajet['prix_personne'] ?> €</p>
                            <p><b>Voyage Eco :</b> 
                                <?= strtolower($trajet['energie']) === 'électrique' ? '🌿 Oui' : 'Non' ?>
                            </p>
                        </div>
                    </div>

                    <?php if ($trajet['nb_place'] > 0): ?>
                        <?php if (isset($_SESSION['user_id'])): ?>
                            <form action="../../back/participer.php" method="POST">
                                <input type="hidden" name="covoiturage_id" value="<?= $trajet['covoiturage_id'] ?>">
                                <button type="submit">RÉSERVER</button>
                            </form>
                        <?php else: ?>
                            <a href="../../index.php" class="btn-reserver">Se connecter pour réserver</a>
                        <?php endif; ?>
                    <?php else: ?>
                        <p style="color:red">Plus de places disponibles</p>
                    <?php endif; ?>

                    <a class="btn-retour" href="search-trajet.php">RETOUR</a>
                </div>

                <!-- Avis -->
                <div class="card-note-avis">
                    <h3>Notes & Avis</h3>
                    <?php if (empty($avis)): ?>
                        <p><i>Aucun avis pour ce chauffeur.</i></p>
                    <?php else: ?>
                        <?php foreach ($avis as $a): ?>
                            <section class="commentaire">
                                <h4><?= htmlspecialchars($a['pseudo']) ?></h4>
                                <div class="etoile-titre">
                                    <p><?= str_repeat('⭐️', $a['note']) ?> - <b><?= htmlspecialchars($a['commentaire']) ?></b></p>
                                </div>
                            </section>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>

            </div>
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

        <script src="../js/menu-deroulant.js"></script>
    </body>
</html>