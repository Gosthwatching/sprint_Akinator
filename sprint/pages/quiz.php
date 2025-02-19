<?php
include "../config/database.php";
include "../repository/userRepository.php";
include "../repository/answerRepository.php";
include "../repository/resultRepository.php";
include "../repository/questionsRepository.php";
include "../repository/gameRepository.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $questionId = $_POST['questionId'];
    $response = $_POST['response'];
    
    //chercher en bdd dans answers toutes les infos nécessaires sur la question et la réponse choisie
    
    //récupérer l'id de la question suivante : la chercher en bdd pour afficher ce qu'elle contient
    
    //etape suivante : rajoute une condition, si id_characters n'est pas null, on affiche le résultat
    
    
    
        switch ($questionId) {
            case '1':
                if ($response == 'oui') {
                    $questionText = "Vit-il sur l'Olympe ?";
                    $nextId = '2';
                } else {
                    $questionText = "Est-ce que ce dieu réside dans les enfers ?";
                    $nextId = '3';
                }
                break;
            case '2':
                if ($response == 'oui') {
                    $questionText = "Est-ce le roi des Dieux ?";
                    $nextId = '4';
                } else {
                    $questionText = "Est-ce une déesse ?";
                    $nextId = '5';
                }
                break;
            case '3':
                if ($response == 'oui') {
                    $questionText = "Est-ce le roi des Dieux ?";
                    $nextId = '4';
                } else {
                    $questionText = "Est-ce une déesse ?";
                    $nextId = '5';
                }
                break;
            // Ajoutez d'autres cas selon vos besoins
            default:
                $questionText = "Question inconnue.";
                $nextId = '';
                break;
        }
    } else {
        $questionText = "Est-ce que votre personnage est un dieu ?";
        $nextId = '1';
    }


$template = "quiz";
include "layout.phtml";