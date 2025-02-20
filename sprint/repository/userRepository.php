<?php

function createUser(string $email, string $username, string $password) {
    $pdo = getConnexion();
    
    // Hacher le mot de passe
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
    $query = $pdo->prepare("INSERT INTO users (email, username, password) VALUES (?,?,?)"); // Création d'un compte utilisateur
    $query->execute([$email, $username, $password]);
}

function getUserByUsername(string $username) {
    $pdo = getConnexion();
    
    $query = $pdo->prepare("SELECT * FROM users WHERE username = ?"); // Connexion au bon utilisateur par son nickname
    $query->execute([$username]);
    
    return $query->fetch();
}

function getPasswordByUserId($userId) {
    $pdo = getConnexion();
    
    $query = $pdo->prepare("SELECT password FROM users WHERE id = ?"); // Mot de passe de base
    $query->execute([$userId]);
    
    return $query->fetch();
}

function updatePassword($userId, $password) {   // Modification du mot de passe
    $pdo = getConnexion();
    
    // Hacher le nouveau mot de passe
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
    $query = $pdo->prepare("UPDATE users SET password = ? WHERE id = ?");
    return $query->execute([$hashedPassword, $userId]);
}