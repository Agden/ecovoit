<?php 
session_start();
require '../../back/config.local.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../../index.php");
    exit;
}

$stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([$_SESSION['user_id']]);
$user = $stmt->fetch();

$stmt = $pdo->prepare("
    SELECT c.*, v.modele, v.energie, m.libelle as marque
    FROM participe p
    JOIN covoiturage c ON p.covoiturage_id = c.covoiturage_id
    JOIN voiture v ON c.voiture_id = v.voiture_id
    JOIN marque m ON v.marque_id = m.marque_id
    WHERE p.user_id = ?
    ORDER BY c.date_depart DESC
");
$stmt->execute([$_SESSION['user_id']]);
$trajets = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Profil passager</title>
        <link rel="stylesheet" href="../css/profil-user-passager.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    </head>
    <body>
        <?php include 'nav-top.php'; ?>

        <section class="bandeau-photo">
            <div class="img-bandeau">
                <img src="../img/route-3.jpg" alt="Trajet écoresponsable">
            </div>
        </section>

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
                            <?php if ($user['photo']): ?>
                                <img src="../img/<?= htmlspecialchars($user['photo']) ?>" alt="Photo de profil">
                            <?php else: ?>
                                <img src="../img/vapilo.jpg" alt="Photo de profil">
                            <?php endif; ?>
                            <h3>Bienvenue, <?= htmlspecialchars($user['prenom'] ?? $user['pseudo'] ?? 'utilisateur') ?> !</h3>
                            <p><b>Crédits :</b> <?= $user['credits'] ?></p>
                        </div>
                        <hr>
                        <div class="card-1-body">
                            <p><b>Pseudo :</b> <?= htmlspecialchars($user['pseudo'] ?? 'Non renseigné') ?></p>
                            <p><b>N° Téléphone :</b> <?= htmlspecialchars($user['telephone'] ?? 'Non renseigné') ?></p>
                            <p><b>E-mail :</b> <?= htmlspecialchars($user['email']) ?></p>
                        </div>
                    </div>
                </div>

                <div class="body-3">
                    <div class="titre-card-3">
                        <h3>Mes trajets réservés</h3>
                    </div>
                    <?php if (empty($trajets)): ?>
                        <p><i>Vous n'avez pas encore réservé de trajet.</i></p>
                    <?php else: ?>
                        <?php foreach ($trajets as $t): ?>
                            <div class="carte-trajet">
                                <p><b>Départ :</b> <?= htmlspecialchars($t['lieu_depart']) ?></p>
                                <p><b>Arrivée :</b> <?= htmlspecialchars($t['lieu_arrivee']) ?></p>
                                <p><b>Date :</b> <?= date('d/m/Y', strtotime($t['date_depart'])) ?></p>
                                <p><b>Prix :</b> <?= $t['prix_personne'] ?>€</p>
                                <p><b>Statut :</b> <?= htmlspecialchars($t['statut']) ?></p>
                            </div>
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