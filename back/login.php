<?php
session_start();
require "config.php";

$email = $_POST["email"];
$password = $_POST["password"];

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