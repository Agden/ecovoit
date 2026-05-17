<?php
session_start();
require "config.local.php";

// Vérifier que l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    header("Location: ../front/html/fiche-1.php");
    exit;
}

$user_id = $_SESSION['user_id'];
$covoiturage_id = (int)($_POST['covoiturage_id'] ?? 0);

if (!$covoiturage_id) {
    header("Location: ../front/html/search-trajet.php");
    exit;
}

// Vérifier que le trajet existe et a des places
$stmt = $pdo->prepare("SELECT * FROM covoiturage WHERE covoiturage_id = ? AND nb_place > 0 AND statut = 'prévu'");
$stmt->execute([$covoiturage_id]);
$trajet = $stmt->fetch();

if (!$trajet) {
    die("Ce trajet n'est plus disponible.");
}

// Vérifier que l'utilisateur a assez de crédits
$stmt = $pdo->prepare("SELECT credits FROM users WHERE id = ?");
$stmt->execute([$user_id]);
$user = $stmt->fetch();

if ($user['credits'] < $trajet['prix_personne']) {
    die("Vous n'avez pas assez de crédits pour réserver ce trajet.");
}

// Vérifier que l'utilisateur ne participe pas déjà
$stmt = $pdo->prepare("SELECT * FROM participe WHERE user_id = ? AND covoiturage_id = ?");
$stmt->execute([$user_id, $covoiturage_id]);
if ($stmt->fetch()) {
    die("Vous participez déjà à ce trajet.");
}

// Vérifier que le chauffeur ne réserve pas son propre trajet
if ($trajet['chauffeur_id'] == $user_id) {
    die("Vous ne pouvez pas réserver votre propre trajet.");
}

// Enregistrer la participation
$stmt = $pdo->prepare("INSERT INTO participe (user_id, covoiturage_id) VALUES (?, ?)");
$stmt->execute([$user_id, $covoiturage_id]);

// Déduire les crédits du passager
$stmt = $pdo->prepare("UPDATE users SET credits = credits - ? WHERE id = ?");
$stmt->execute([$trajet['prix_personne'], $user_id]);

// Mettre à jour le nombre de places
$stmt = $pdo->prepare("UPDATE covoiturage SET nb_place = nb_place - 1 WHERE covoiturage_id = ?");
$stmt->execute([$covoiturage_id]);

// Redirection vers le profil passager
header("Location: ../front/html/profil-user-passager.php");
exit;