<?php
session_start();
require "config.php";

// Vérifie que la requête vient bien du formulaire
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: /front/html/contact.php");
    exit;
}

// Nettoyage des données
$nom = trim($_POST['nom'] ?? '');
$email = trim($_POST['email'] ?? '');
$motif = trim($_POST['motif'] ?? '');
$message = trim($_POST['message'] ?? '');

// Validation
$errors = [];

if (empty($nom)) {
    $errors[] = "Nom requis";
}

if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Email invalide";
}

if (empty($message)) {
    $errors[] = "Message requis";
}

// Si erreurs → retour avec message
if (!empty($errors)) {
    header("Location: /front/html/contact.php?error=1");
    exit;
}

try {
    // Préparation requête sécurisée
    $stmt = $pdo->prepare("
        INSERT INTO contact (nom, email, motif, message)
        VALUES (:nom, :email, :motif, :message)
    ");

    $stmt->execute([
        ':nom' => $nom,
        ':email' => $email,
        ':motif' => $motif,
        ':message' => $message
    ]);

    // Succès
    header("Location: /front/html/contact.php?success=1");
    exit;

} catch (PDOException $e) {
    // Erreur BDD
    header("Location: /front/html/contact.php?error=2");
    exit;
}