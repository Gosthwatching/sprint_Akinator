<?php
include "../config/database.php";
include "../repository/userRepository.php";
include "../repository/gamelogRepository.php";

if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}

if (isset($_POST["delete_account"])) {
    session_start();
    
    if (!isset($_SESSION["user"])) {
        die("Erreur : utilisateur non connecté.");
    }

    $user = getUserByUsername($_SESSION["user"]);
    
    if ($user) {
    deleteGamelogByUserId($user["id"]); 
    deleteUser($user["id"]); 
    
    session_destroy();
    header("Location: index.php");
    exit;
}
}

