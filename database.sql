SET FOREIGN_KEY_CHECKS=0;

-- Table role
CREATE TABLE role (
    role_id INT AUTO_INCREMENT PRIMARY KEY,
    libelle VARCHAR(50) NOT NULL
);

INSERT INTO role (libelle) VALUES ('administrateur'), ('employe'), ('chauffeur'), ('passager');

-- Table users
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    nom VARCHAR(50),
    prenom VARCHAR(50),
    telephone VARCHAR(20),
    adresse VARCHAR(100),
    date_naissance DATE,
    photo VARCHAR(255),
    pseudo VARCHAR(50),
    credits INT DEFAULT 20,
    role_id INT DEFAULT 4,
    statut VARCHAR(20) DEFAULT 'actif',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (role_id) REFERENCES role(role_id)
);

-- Table marque
CREATE TABLE marque (
    marque_id INT AUTO_INCREMENT PRIMARY KEY,
    libelle VARCHAR(50) NOT NULL
);

INSERT INTO marque (libelle) VALUES 
('Renault'), ('Peugeot'), ('Citroën'), ('Tesla'), 
('Volkswagen'), ('Toyota'), ('BMW'), ('Mercedes');

-- Table voiture
CREATE TABLE voiture (
    voiture_id INT AUTO_INCREMENT PRIMARY KEY,
    modele VARCHAR(50) NOT NULL,
    immatriculation VARCHAR(20) NOT NULL,
    energie VARCHAR(50) NOT NULL,
    couleur VARCHAR(50),
    date_premiere_immatriculation DATE,
    nb_place INT NOT NULL,
    marque_id INT NOT NULL,
    user_id INT NOT NULL,
    FOREIGN KEY (marque_id) REFERENCES marque(marque_id),
    FOREIGN KEY (user_id) REFERENCES users(id)
);

-- Table preferences
CREATE TABLE preferences (
    preferences_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL UNIQUE,
    fumeur TINYINT(1) DEFAULT 0,
    animaux TINYINT(1) DEFAULT 0,
    commentaire VARCHAR(255),
    FOREIGN KEY (user_id) REFERENCES users(id)
);

-- Table covoiturage
CREATE TABLE covoiturage (
    covoiturage_id INT AUTO_INCREMENT PRIMARY KEY,
    date_depart DATE NOT NULL,
    heure_depart TIME NOT NULL,
    lieu_depart VARCHAR(100) NOT NULL,
    date_arrivee DATE NOT NULL,
    heure_arrivee TIME NOT NULL,
    lieu_arrivee VARCHAR(100) NOT NULL,
    statut VARCHAR(20) DEFAULT 'prévu',
    nb_place INT NOT NULL,
    prix_personne FLOAT NOT NULL,
    voiture_id INT NOT NULL,
    chauffeur_id INT NOT NULL,
    FOREIGN KEY (voiture_id) REFERENCES voiture(voiture_id),
    FOREIGN KEY (chauffeur_id) REFERENCES users(id)
);

-- Table participe
CREATE TABLE participe (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    covoiturage_id INT NOT NULL,
    statut VARCHAR(20) DEFAULT 'confirmé',
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (covoiturage_id) REFERENCES covoiturage(covoiturage_id)
);

-- Table avis
CREATE TABLE avis (
    avis_id INT AUTO_INCREMENT PRIMARY KEY,
    commentaire VARCHAR(255),
    note INT NOT NULL,
    statut VARCHAR(20) DEFAULT 'en attente',
    user_id INT NOT NULL,
    covoiturage_id INT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (covoiturage_id) REFERENCES covoiturage(covoiturage_id)
);

-- Table contact
CREATE TABLE contact (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    motif VARCHAR(50),
    message TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

SET FOREIGN_KEY_CHECKS=1;