# EcoVoit

## Présentation

EcoVoit est une application web de covoiturage permettant aux utilisateurs de proposer et rechercher des trajets dans une logique de mobilité durable.

L’application propose un système d’authentification, de gestion de profil et d’interaction via un formulaire de contact.

---

## Fonctionnalités

* Inscription utilisateur
* Connexion sécurisée
* Gestion du profil utilisateur
* Recherche de trajets
* Formulaire de contact avec enregistrement en base de données

---

## Stack technique

* Frontend : HTML, CSS, JavaScript
* Backend : PHP
* Base de données : MySQL
* Serveur local : XAMPP / WAMP / MAMP

---

## Prérequis

Avant installation, s’assurer de disposer de :

* PHP ≥ 8
* MySQL ≥ 5.7
* Serveur Apache (XAMPP recommandé)
* Navigateur web moderne

---

## Installation

### 1. Cloner le projet

git clone https://github.com/Agden/ecovoit.git

---

### 2. Placer le projet

Déplacer le dossier dans le répertoire du serveur web :

* XAMPP : `htdocs`
* WAMP : `www`

---

### 3. Création de la base de données

1. Ouvrir phpMyAdmin
2. Créer une base de données nommée :

ecovoit

---

### 4. Import de la base

Importer le fichier suivant :

database.sql

Ce fichier contient :

* la structure des tables
* les relations entre les entités

---

### 5. Configuration

Configurer les accès à la base de données dans le fichier :

config.local.php

```php
$host = "localhost";
$dbname = "ecovoit";
$user = "root";
$password = "";
```

---

## Lancement du projet

1. Démarrer Apache et MySQL
2. Accéder à l’application via :

http://localhost/ecovoit

---

## Structure du projet

* /assets → fichiers CSS, JavaScript, images
* /models → accès aux données (base de données)
* /controllers → logique métier
* /views → affichage (pages)
* /config → fichiers de configuration

---

## Base de données

### Table users

* id (INT, PK)
* email (VARCHAR)
* password (VARCHAR, hashé)
* created_at (DATETIME)
* nom (VARCHAR)
* prenom (VARCHAR)
* telephone (VARCHAR)
* adresse (VARCHAR)

### Table contact

* id (INT, PK)
* message (TEXT)
* created_at (DATETIME)

---

## Sécurité mise en place

* Mots de passe hashés (password_hash)
* Requêtes préparées (PDO)
* Validation des données côté serveur
* Gestion des sessions utilisateurs
* Protection des pages sensibles

---

## Axes d’amélioration

* Mise en place d’une base NoSQL (ex : MongoDB)
* Conteneurisation avec Docker
* Amélioration de l’architecture backend (POO avancée)
* Ajout de tests automatisés

---

Test workflow Git
## Conteneurisation

Une conteneurisation avec Docker a été envisagée pour améliorer la reproductibilité du projet.
Cependant, celle-ci n’a pas pu être finalisée en raison de contraintes d’environnement local.

Elle reste une amélioration future.

## Auteur

DENHAERYNCK Agathe