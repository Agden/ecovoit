<?php
session_start();
require "config.php";

// sécurité : vérifier si connecté
if (!isset($_SESSION["user_id"])) {
    die("Non autorisé");
}

$user_id = $_SESSION["user_id"];

// récupérer les données
$nom = $_POST["nom"];
$prenom = $_POST["prenom"];
$telephone = $_POST["telephone"];
$email = $_POST["email"];
$adresse = $_POST["adresse"];

// mise à jour
$sql = "UPDATE users 
        SET nom = ?, prenom = ?, telephone = ?, email = ?, adresse = ?
        WHERE id = ?";

$stmt = $pdo->prepare($sql);
$stmt->execute([$nom, $prenom, $telephone, $email, $adresse, $user_id]);

// redirection
header("Location: ../front/html/accueil.php");
exit;