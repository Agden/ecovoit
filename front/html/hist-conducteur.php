<?php 
session_start();
require '../../back/config.local.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../../index.php");
    exit;
}

$stmt = $pdo->prepare("
    SELECT c.*, v.modele, m.libelle as marque
    FROM covoiturage c
    JOIN voiture v ON c.voiture_id = v.voiture_id
    JOIN marque m ON v.marque_id = m.marque_id
    WHERE c.chauffeur_id = ?
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
        <title>Historique conducteur</title>
        <link rel="stylesheet" href="../css/hist-conducteur.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    </head>
    <body>
        <?php include 'nav-top.php'; ?>

        <section class="bandeau-photo">
            <div class="img-bandeau">
                <img src="../img/route-7.jpg" alt="Trajet écoresponsable">
            </div>
        </section>

        <main class="main-container">
            <a href="../html/profil-user.php">Retour au profil</a>
            <div class="historique">
                <h1 class="titre">Historique de vos trajets</h1>
                <div class="container-historique">
                    <?php if (empty($trajets)): ?>
                        <p><i>Vous n'avez pas encore proposé de trajet.</i></p>
                    <?php else: ?>
                        <?php foreach ($trajets as $t): ?>
                            <div class="ville">
                                <div class="ville-titre">
                                    <i class="bi bi-arrow-right-circle-fill"></i>
                                    <h4><?= htmlspecialchars($t['lieu_depart']) ?> → <?= htmlspecialchars($t['lieu_arrivee']) ?></h4>
                                </div>
                                <p><b>Date :</b> <?= date('d/m/Y', strtotime($t['date_depart'])) ?></p>
                                <p><b>Heure :</b> <?= $t['heure_depart'] ?></p>
                                <p><b>Places restantes :</b> <?= $t['nb_place'] ?></p>
                                <p><b>Prix :</b> <?= $t['prix_personne'] ?>€</p>
                                <p><b>Statut :</b> <?= htmlspecialchars($t['statut']) ?></p>
                                <?php if ($t['statut'] === 'prévu'): ?>
                                    <form action="../../back/annuler-trajet.php" method="POST">
                                        <input type="hidden" name="covoiturage_id" value="<?= $t['covoiturage_id'] ?>">
                                        <button class="btn-annuler" type="submit">Annuler</button>
                                    </form>
                                <?php endif; ?>
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