# EcoVoit

Application de covoiturage responsable.

## Description
EcoVoit permet aux utilisateurs de proposer et rechercher des trajets en covoiturage.

## Fonctionnalités
- Création de compte
- Connexion utilisateur
- Gestion du profil
- Recherche de trajets
- Messagerie

## Technologies utilisées
- PHP
- MySQL
- HTML / CSS
- JavaScript

## Installation
Cloner le projet et configurer la base de données via le fichier config.local.php.

## Base de données

Le projet utilise une base de données MySQL.

### Table principale : users
- id
- email
- password (hashé)
- created_at
- nom
- prenom
- telephone
- adresse

### Autres tables
- contact : stockage des messages envoyés via le formulaire de contact

### Fonctionnement
Les utilisateurs peuvent créer un compte, se connecter, et leurs informations sont stockées en base de données de manière sécurisée (mot de passe hashé).
