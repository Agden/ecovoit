<?php
session_start();

// vérifier si connecté
if (!isset($_SESSION["user_id"])) {
    header("Location: ../index.php");
    exit;
}

// redirection vers accueil
header("Location: ../front/html/accueil.php");
exit;