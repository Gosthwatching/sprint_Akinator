<?php

session_start(); 

include "../config/database.php";
include "../repository/userRepository.php";
include "../repository/answerRepository.php";
include "../repository/resultRepository.php";
include "../repository/questionsRepository.php";

if (!empty($_POST)) {
    $choix = (int)$_POST["answer"];
    $answer = getAnswerById($choix);
    
    if (isset($answer["id_characters"])) {
        $_SESSION["id_characters"] = (int) $answer["id_characters"];
        header("Location: result.php");
        exit;
    } else {
        $id_questions = (int) $answer["id_next_question"];
        $possibleanswers = getPossibleAnswers($id_questions);
        $questions = getQuestionsById($id_questions);
    }
} else {
    $questions = getFirstQuestions(1);
    if (isset($questions["id"])) {
        $possibleanswers = getPossibleAnswers($questions["id"]);
    } else {
        die("Erreur : Impossible de récupérer la première question.");
    }
}

$template = "quiz";
include "layout.phtml";