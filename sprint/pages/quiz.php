<?php

session_start(); 

include "../config/database.php";
include "../repository/userRepository.php";
include "../repository/answerRepository.php";
include "../repository/resultRepository.php";
include "../repository/questionsRepository.php";


if(!empty($_POST)){
    $choix = (int)$_POST["answer"];
    var_dump($choix);
    $answer = getAnswerById($choix);
    if(isset($answer["id_characters"])){
        var_dump($answer["id_characters"]);
        $_SESSION["id_characters"] = $answer["id_characters"];
      header ("Location: result.php");
    }
    else{
        $id_questions = $answer["id_next_question"];
        $possibleanswers = getPossibleAnswers($id_questions);
        $questions = getQuestionsById($id_questions);
    }
}
else{
    $questions = getFirstQuestions(1);
    $possibleanswers = getPossibleAnswers($questions["id"]);
}

$template = "quiz";
include "layout.phtml";