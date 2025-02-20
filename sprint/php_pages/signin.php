<?php
include "../config/database.php";
include "../repository/userRepository.php";

session_start();

if (!empty($_POST)) {
    if (isset($_POST["username"], $_POST["password"])) {
        $username = (string) $_POST["username"];
        $password = (string) $_POST["password"];
        
        $user = getUserByUsername($username);
        
        if ($user) {
            if (password_verify($password, $user["password"])) {
                // Création d'une session
                $_SESSION["users"] = $user["username"];
                
                // Redirection vers la page top secrète
                header("Location: account.php");
                exit;
            } else {
                $error = "Identifiant ou mot de passe incorrect";
            }
        } else {
            $error = "Identifiant ou mot de passe incorrect";
        }
    } else {
        $error = "Veuillez remplir tous les champs.";
    }
}

$template = "signin";
include "layout.phtml";