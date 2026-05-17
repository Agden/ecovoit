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
    header("Location: ../front/html/hist-conducteur.php");
    exit;
}

// Vérifier que le trajet appartient bien à ce chauffeur
$stmt = $pdo->prepare("SELECT * FROM covoiturage WHERE covoiturage_id = ? AND chauffeur_id = ?");
$stmt->execute([$covoiturage_id, $user_id]);
$trajet = $stmt->fetch();

if (!$trajet) {
    header("Location: ../front/html/hist-conducteur.php");
    exit;
}

// Rembourser les passagers
$stmt = $pdo->prepare("SELECT user_id FROM participe WHERE covoiturage_id = ?");
$stmt->execute([$covoiturage_id]);
$passagers = $stmt->fetchAll();

foreach ($passagers as $passager) {
    $stmt = $pdo->prepare("UPDATE users SET credits = credits + ? WHERE id = ?");
    $stmt->execute([$trajet['prix_personne'], $passager['user_id']]);
}

// Annuler le trajet
$stmt = $pdo->prepare("UPDATE covoiturage SET statut = 'annulé' WHERE covoiturage_id = ?");
$stmt->execute([$covoiturage_id]);

header("Location: ../front/html/hist-conducteur.php");
exit;