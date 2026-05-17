<?php
session_start();
require "config.local.php";

// Vérifier que l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    header("Location: ../../index.php");
    exit;
}

// Récupérer et nettoyer les données du formulaire
$lieu_depart  = trim($_POST['lieu_depart'] ?? '');
$lieu_arrivee = trim($_POST['lieu_arrivee'] ?? '');
$date_depart  = trim($_POST['date_depart'] ?? '');
$heure_depart = trim($_POST['heure_depart'] ?? '');
$nb_place     = trim($_POST['nb_place'] ?? '');
$prix_personne = trim($_POST['prix_personne'] ?? '');
$marque       = trim($_POST['marque'] ?? '');
$modele       = trim($_POST['modele'] ?? '');
$energie      = trim($_POST['energie'] ?? '');
$couleur      = trim($_POST['couleur'] ?? '');
$commentaire  = trim($_POST['commentaire'] ?? '');
$chauffeur_id = $_SESSION['user_id'];

// Vérifier les champs obligatoires
if (empty($lieu_depart) || empty($lieu_arrivee) || empty($date_depart) || empty($heure_depart) || empty($nb_place) || empty($prix_personne)) {
    die("Tous les champs obligatoires doivent être remplis.");
}

// Vérifier si la marque existe, sinon la créer
$stmt = $pdo->prepare("SELECT marque_id FROM marque WHERE libelle = ?");
$stmt->execute([$marque]);
$marque_row = $stmt->fetch();

if ($marque_row) {
    $marque_id = $marque_row['marque_id'];
} else {
    $stmt = $pdo->prepare("INSERT INTO marque (libelle) VALUES (?)");
    $stmt->execute([$marque]);
    $marque_id = $pdo->lastInsertId();
}

// Créer la voiture
$stmt = $pdo->prepare("INSERT INTO voiture (modele, immatriculation, energie, couleur, nb_place, marque_id, user_id) VALUES (?, '', ?, ?, ?, ?, ?)");
$stmt->execute([$modele, $energie, $couleur, $nb_place, $marque_id, $chauffeur_id]);
$voiture_id = $pdo->lastInsertId();

// Créer le covoiturage
$stmt = $pdo->prepare("INSERT INTO covoiturage (date_depart, heure_depart, lieu_depart, date_arrivee, heure_arrivee, lieu_arrivee, nb_place, prix_personne, voiture_id, chauffeur_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->execute([
    $date_depart,
    $heure_depart,
    $lieu_depart,
    $date_depart,   // Pour l'instant date_arrivee = date_depart
    $heure_depart,  // Pour l'instant heure_arrivee = heure_depart
    $lieu_arrivee,
    $nb_place,
    $prix_personne,
    $voiture_id,
    $chauffeur_id
]);

// Redirection vers la page des trajets proposés
header("Location: ../front/html/propo-trajet.php");
exit;