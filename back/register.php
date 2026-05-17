<?php
session_start();
require "config.local.php";

$email = trim($_POST["email"] ?? '');
$password = trim($_POST["password"] ?? '');

if (empty($email) || empty($password)) {
    echo "Champs manquants";
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Email invalide";
    exit;
}

// Vérifier email existant
$stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
$stmt->execute([$email]);

if ($stmt->fetch()) {
    echo "Email déjà utilisé";
    exit;
}

// Hash
$hash = password_hash($password, PASSWORD_DEFAULT);

// Insert
$stmt = $pdo->prepare("INSERT INTO users (email, password) VALUES (?, ?)");
$stmt->execute([$email, $hash]);

// Récupérer ID
$user_id = $pdo->lastInsertId();

// Session
$_SESSION["user_id"] = $user_id;

// Redirection
header("Location: /front/html/fiche-info.php");
exit;