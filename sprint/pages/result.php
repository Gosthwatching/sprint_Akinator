<?php
 
session_start();

include "../config/database.php";
include "../repository/resultRepository.php";
include "../repository/answerRepository.php";
include "../repository/gameRepository.php";

if (!isset($_SESSION['users'])) {
    header("Location: index.php");
    exit;
}
// $answer = getAnswerByResult("IS NOT NULL");
$id =  $_SESSION["id_characters"];
$result = getResultById($id);

// if($answer === $result){
//     echo $result["name"];
// }

$template = "result";
include "layout.phtml";