CREATE DATABASE NoteFlow;

USE NoteFlow;

CREATE TABLE users(
    id INT AUTO_INCREMENT PRIMARY KEY ,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    reset_token VARCHAR(255) DEFAULT NULL,
    reset_token_expiry DATETIME DEFAULT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    
);

CREATE TABLE notes(
    id INT AUTO_INCREMENT PRIMARY KEY ,
    user_id INT NOT NULL,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

-- Données de test

INSERT INTO users (name, email, password) VALUES
('Hajar Elmouhili', 'hajar@example.com', '$2b$12$NcZjrVlMITwXE9PesINaYOouSdkTGRr2MVa8KM/Gfm9FFPSI6s5IW'), -- mot de passe : password123
('Sara Bennani', 'sara@example.com', '$2b$12$7trnO9FM0NhjJ8HmdbeK5.QtahY7EVD0stTGYn//VDcX2KxpDsP8S'); -- mot de passe : azerty123

INSERT INTO notes (user_id, title, content) VALUES
(1, 'Idée de projet', 'Développer une application de gestion de tâches avec rappels automatiques.'),
(1, 'Liste de courses', 'Lait, oeufs, farine, sucre, café.'),
(1, 'Réunion client', 'Préparer le devis pour le client NovaTech avant vendredi.'),
(2, 'Recette de cuisine', 'Tajine de poulet aux olives : oignons, poulet, citron confit, olives, épices.'),
(2, 'Notes de cours', 'Réviser le chapitre sur les bases de données relationnelles pour l''examen.');
