<?php
include "../config/database.php";
include "../repository/userRepository.php";
include "../repository/gamelogRepository.php";


session_start(); 

if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}

if (isset($_POST["delete_account"])) {
    if (!isset($_SESSION["user"])) {
        die("Erreur : utilisateur non connecté.");
    }

    $username = (string) $_SESSION["user"];
    $user = getUserByUsername($username);

    if ($user) {
        $userId = (int) $user["id"];
        deleteGamelogByUserId($userId); 
        deleteUser($userId); 
        
        session_destroy();
        header("Location: index.php");
        exit;
    }
}

