<?php
include "../config/database.php";
include "../repository/userRepository.php";
include "../repository/gameRepository.php";

session_start(); 

if (!isset($_SESSION['user'])) {
    $_SESSION['user'] = null; // Définit une valeur par défaut
}

if (!isset($_SESSION['users'])) {
    header("Location: index.php");
    exit;
}

$username = $_SESSION['users'];
$user = getUserByUsername($username);

if (!$user) {
    die("Erreur : utilisateur non trouvé dans la base de données.");
}

$userId = (int) $user['id'];
$dataPassword = getPasswordByUserId($userId);

if (!$dataPassword) {
    die("Erreur : Accès interdit.");
}

$regex = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_])[A-Za-z\d\W_]{8,16}$/";
        
if (!empty($_POST) && isset($_POST['thenpassword'], $_POST['newpassword'])) {
    $thenPassword = (string) $_POST['thenpassword'];
    $newPassword = (string) $_POST['newpassword'];
        
    if (!password_verify($thenPassword, $dataPassword["password"])) {
        die("Erreur : Mot de passe actuel incorrect.");
    }

    if (!preg_match($regex, $newPassword)) {
        die("Erreur : Le nouveau mot de passe ne respecte pas les critères.");
    }

    $passwordHash = password_hash($newPassword, PASSWORD_DEFAULT);

    if (updatePassword($userId, $passwordHash)) {
        header("Location: account.php");
        exit;
    } else {
        die("Erreur : Échec de la modification du mot de passe.");
    }
}

$template = "account";
include "layout.phtml";