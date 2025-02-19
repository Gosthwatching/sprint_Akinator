<?php
function getQuestions($order_question){
    
    $pdo = getConnexion();
    
    $query = $pdo -> prepare("SELECT * FROM questions WHERE order_question = ?");
    
    $query->execute([$order_questions]);
    
    return $query->fetch();
}

$order_question = 1
$first_question = getQuestions($order_question);
