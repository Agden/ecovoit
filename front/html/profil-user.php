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

$stmt = $pdo->prepare("SELECT * FROM preferences WHERE user_id = ?");
$stmt->execute([$_SESSION['user_id']]);
$prefs = $stmt->fetch();
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Profil conducteur</title>
        <link rel="stylesheet" href="../css/profil-user.css">
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
                            <p><b>Adresse :</b> <?= htmlspecialchars($user['adresse'] ?? 'Non renseignée') ?></p>
                        </div>
                    </div>

                    <div class="body-2">
                        <div class="titre-card-2">
                            <h3>Préférences</h3>
                        </div>
                        <div class="card-2-body">
                            <?php if ($prefs): ?>
                                <table class="tableau">
                                    <tr>
                                        <th>Fumeur</th>
                                        <td><?= $prefs['fumeur'] ? 'Oui' : 'Non' ?></td>
                                    </tr>
                                    <tr>
                                        <th>Animaux</th>
                                        <td><?= $prefs['animaux'] ? 'Oui' : 'Non' ?></td>
                                    </tr>
                                    <?php if ($prefs['commentaire']): ?>
                                    <tr>
                                        <th>Commentaire</th>
                                        <td><?= htmlspecialchars($prefs['commentaire']) ?></td>
                                    </tr>
                                    <?php endif; ?>
                                </table>
                            <?php else: ?>
                                <p><i>Aucune préférence renseignée.</i></p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="body-3">
                    <div class="les-boutons">
                        <a class="btn-slide-2" href="../html/propo-trajet.php">Proposer un trajet</a>
                        <a class="btn-slide-2" href="../html/propo-trajet.php#mes-trajets-en-cours">Trajets proposés</a>
                        <a class="btn-slide-2" href="../html/hist-conducteur.php">Historique</a>
                    </div>
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