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

$stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
$stmt->execute([$email]);
$user = $stmt->fetch();

if (!$user) {
    echo "Email incorrect";
    exit;
}

if (!password_verify($password, $user["password"])) {
    echo "Mot de passe incorrect";
    exit;
}

$_SESSION["user_id"] = $user["id"];
header("Location: /front/html/accueil.php");
exit;