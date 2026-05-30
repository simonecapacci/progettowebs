CREATE DATABASE IF NOT EXISTS studytogether;
USE study_groups;

CREATE TABLE IF NOT EXISTS user (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('user', 'admin') NOT NULL DEFAULT 'user',
    name VARCHAR(50),
    surname VARCHAR(50),
    active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS subject (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL UNIQUE
);

CREATE TABLE IF NOT EXISTS study_group (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    subject_id INT NOT NULL,
    date DATE NOT NULL,
    time TIME NOT NULL,
    creator_id INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (subject_id) REFERENCES subject(id) ON DELETE CASCADE,
    FOREIGN KEY (creator_id) REFERENCES user(id) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS subscription (
    group_id INT NOT NULL,
    user_id INT NOT NULL,
    subscribed_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (group_id, user_id),
    FOREIGN KEY (group_id) REFERENCES study_group(id) ON DELETE CASCADE,
    FOREIGN KEY (user_id) REFERENCES user(id) ON DELETE CASCADE
);

-- Insert dummy subjects
INSERT INTO subject (name) VALUES 
('Analisi'),
('Programmazione'),
('Architettura degli Elaboratori'),
('Sistemi Operativi'),
('Basi di Dati'),
('Ingegneria del Software'),
('Tecnologie Web');

-- Insert an admin
INSERT INTO user (username, password, role, name, surname) VALUES 
('admin', 'admin', 'admin', 'Admin', 'Istrator');

-- Insert some users
INSERT INTO user (username, password, role, name, surname) VALUES 
('mario', 'mario', 'user', 'Mario', 'Rossi'),
('luigi', 'luigi', 'user', 'Luigi', 'Verdi');
