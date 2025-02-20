<?php
include "../config/database.php";
include "../repository/userRepository.php";

session_start();
if (!empty($_POST)) {
    $password = (string) $_POST["password"];
    $regex = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_])[A-Za-z\d\W_]{8,16}$/";
    
    try {
        if (preg_match($regex, $password)) {
            if (isset($_POST["email"])) {
                $email = (string) $_POST["email"];
                
                if (emailExists($email)) {
                    throw new Exception("Cet email est déjà utilisé. Veuillez en choisir un autre.");
                }
            } else {
                throw new Exception("Email non fourni.");
            }

            $passwordHash = password_hash($password, PASSWORD_DEFAULT);

            // Création de l'utilisateur
            if (isset($_POST["username"])) {
                $username = (string) $_POST["username"];
                createUser($email, $username, $passwordHash);
            } else {
                throw new Exception("Nom d'utilisateur non fourni.");
            }

            $_SESSION["users"] = $username;

            // Redirection vers la page account
            header("Location: account.php");
            exit;

        } else {
            throw new Exception('Les points ("."), slash ("/") ne sont pas tolérés');
        }
    } catch (Exception $e) {
        $error_message = $e->getMessage();
    }
}


$template = "register";
include "layout.phtml";
