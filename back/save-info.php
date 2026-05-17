<?php
session_start();
require "config.local.php";

if (!isset($_SESSION["user_id"])) {
    die("Non autorisé");
}

$user_id = $_SESSION["user_id"];

$nom       = trim($_POST["nom"] ?? '');
$prenom    = trim($_POST["prenom"] ?? '');
$pseudo    = trim($_POST["pseudo"] ?? '');
$telephone = trim($_POST["telephone"] ?? '');
$email     = trim($_POST["email"] ?? '');
$adresse   = trim($_POST["adresse"] ?? '');

$stmt = $pdo->prepare("UPDATE users 
        SET nom = ?, prenom = ?, pseudo = ?, telephone = ?, email = ?, adresse = ?
        WHERE id = ?");
$stmt->execute([$nom, $prenom, $pseudo, $telephone, $email, $adresse, $user_id]);

header("Location: ../front/html/accueil.php");
exit;