<?php
session_start();
require "config.local.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: ../front/html/index.php");
    exit;
}

$user_id = $_SESSION['user_id'];
$covoiturage_id = (int)($_POST['covoiturage_id'] ?? 0);

if (!$covoiturage_id) {
    header("Location: ../front/html/hist-passager.php");
    exit;
}

// Récupérer le prix du trajet
$stmt = $pdo->prepare("SELECT prix_personne FROM covoiturage WHERE covoiturage_id = ?");
$stmt->execute([$covoiturage_id]);
$trajet = $stmt->fetch();

if (!$trajet) {
    header("Location: ../front/html/hist-passager.php");
    exit;
}

// Supprimer la participation
$stmt = $pdo->prepare("DELETE FROM participe WHERE user_id = ? AND covoiturage_id = ?");
$stmt->execute([$user_id, $covoiturage_id]);

// Rembourser les crédits
$stmt = $pdo->prepare("UPDATE users SET credits = credits + ? WHERE id = ?");
$stmt->execute([$trajet['prix_personne'], $user_id]);

// Remettre une place disponible
$stmt = $pdo->prepare("UPDATE covoiturage SET nb_place = nb_place + 1 WHERE covoiturage_id = ?");
$stmt->execute([$covoiturage_id]);

header("Location: ../front/html/hist-passager.php");
exit;