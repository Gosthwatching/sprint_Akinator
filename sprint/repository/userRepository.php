<?php
function createUser(string $email, string $username, string $password): void {
    $pdo = getConnexion();
    
    // Hacher le mot de passe
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
    $query = $pdo->prepare("INSERT INTO users (email, username, password) VALUES (?,?,?)");
    $query->execute([$email, $username, $hashedPassword]);
}

function getUserByUsername(string $username): ?array {
    $pdo = getConnexion();
    
    $query = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $query->execute([$username]);
    
    return $query->fetch();
}

function getPasswordByUserId(int $userId): ?array {
    $pdo = getConnexion();
    
    $query = $pdo->prepare("SELECT password FROM users WHERE id = ?");
    $query->execute([$userId]);
    
    return $query->fetch();
}

function updatePassword(int $userId, string $password): bool {
    $pdo = getConnexion();
    
    // Hacher le nouveau mot de passe
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
    $query = $pdo->prepare("UPDATE users SET password = ? WHERE id = ?");
    return $query->execute([$hashedPassword, $userId]);
}

function emailExists(string $email): ?array {
    $pdo = getConnexion();
    
    $query = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $query->execute([$email]);
    
    return $query->fetch(); 
}
