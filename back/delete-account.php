<?php
session_start();
require "config.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: /index.php");
    exit;
}

$user_id = $_SESSION['user_id'];

// Supprimer l'utilisateur
$stmt = $pdo->prepare("DELETE FROM users WHERE id = ?");
$stmt->execute([$user_id]);

// Détruire la session
session_unset();
session_destroy();

// Redirection
header("Location: /front/html/accueil.php");
exit;