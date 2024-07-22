-- Création de la base de données
CREATE DATABASE IF NOT EXISTS ecf;
USE ecf;

-- Création de la table `animals`
CREATE TABLE IF NOT EXISTS animals (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    species VARCHAR(50) NOT NULL,
    habitat_id INT DEFAULT NULL,
    INDEX (habitat_id)
);

-- Création de la table `comments`
CREATE TABLE IF NOT EXISTS comments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    comment TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    approved TINYINT(1) DEFAULT 0
);

-- Création de la table `habitats`
CREATE TABLE IF NOT EXISTS habitats (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    description TEXT DEFAULT NULL
);

-- Création de la table `schedule`
CREATE TABLE IF NOT EXISTS schedule (
    id INT AUTO_INCREMENT PRIMARY KEY,
    vet_id INT DEFAULT NULL,
    start_time DATETIME DEFAULT NULL,
    end_time DATETIME DEFAULT NULL,
    description TEXT DEFAULT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Création de la table `services`
CREATE TABLE IF NOT EXISTS services (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    description TEXT DEFAULT NULL
);

-- Création de la table `users`
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    role ENUM('admin', 'vet', 'employee', 'user') NOT NULL DEFAULT 'user'
);

-- Création de la table `veterinary_reports`
CREATE TABLE IF NOT EXISTS veterinary_reports (
    id INT AUTO_INCREMENT PRIMARY KEY,
    animal_id INT DEFAULT NULL,
    vet_id INT DEFAULT NULL,
    report_date DATE DEFAULT NULL,
    health_status TEXT DEFAULT NULL,
    food_provided TEXT DEFAULT NULL,
    food_quantity INT DEFAULT NULL,
    visit_details TEXT DEFAULT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insertion des utilisateurs par défaut
INSERT INTO users (username, password, role) VALUES 
('admin', '$2y$10$7dO6sKjAq9z5YXZ/o8Zj8uLVlZiA1T3hfs6BcMBfbNH7hDAaLDzfe', 'admin'),  -- admin123
('vet', '$2y$10$W7jQb6wq1sxdoy/n2DQy1OwTpF5yPZR4EdCTO03UM29/2H3z4B.8O', 'vet'),     -- vet123
('employee', '$2y$10$mtUJQcbSsoSPkHhNnp6BeO3JqCC2WxL7tlHSK4IHgk95O1Z3X0qcy', 'employee'); -- employee123

-- Insertion des habitats
INSERT INTO habitats (name, description) VALUES
('Savane', 'La savane est un vaste écosystème caractérisé par des prairies ouvertes et des arbres épars.'),
('Jungle', 'La jungle est une forêt dense et luxuriante avec une grande biodiversité.'),
('Marais', 'Les marais sont des zones humides où l’eau est omniprésente.'),
('Antarctique', 'L’Antarctique est un habitat polaire caractérisé par des températures extrêmement froides.');

-- Insertion des animaux
INSERT INTO animals (name, species, habitat_id) VALUES
('Leo', 'Lion', 1),
('Manny', 'Éléphant', 1),
('George', 'Gorille', 2),
('Kaa', 'Serpent', 2),
('Swampy', 'Crocodile', 3),
('Pengu', 'Pingouin', 4);

-- Insertion des services
INSERT INTO services (name, description) VALUES
('Restauration', 'Offre de restauration variée pour tous les goûts.'),
('Visite guidée', 'Visite des habitats avec un guide (gratuit).'),
('Petit train', 'Visite du zoo en petit train.');

-- Insertion des plannings
INSERT INTO schedule (vet_id, start_time, end_time, description) VALUES
(2, '2024-07-23 09:00:00', '2024-07-23 12:00:00', 'Visite de routine des animaux de la savane.'),
(2, '2024-07-24 13:00:00', '2024-07-24 16:00:00', 'Contrôle de santé des animaux de la jungle.');

-- Insertion des rapports vétérinaires
INSERT INTO veterinary_reports (animal_id, vet_id, report_date, health_status, food_provided, food_quantity, visit_details) VALUES
(1, 2, '2024-07-22', 'Bonne santé', 'Viande', 10, 'Contrôle de routine, tout va bien.'),
(3, 2, '2024-07-22', 'Bonne santé', 'Fruits', 5, 'Contrôle de routine, tout va bien.');
