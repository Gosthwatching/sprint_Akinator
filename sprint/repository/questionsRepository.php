<?php
function getFirstQuestions(int $order_question): ?array {
    $pdo = getConnexion();
    
    $query = $pdo->prepare("SELECT * FROM questions WHERE order_question = ?");
    
    $query->execute([$order_question]);
    
    return $query->fetch();
}

function getQuestionsById(int $id_questions): ?array {
    $pdo = getConnexion();
    
    $query = $pdo->prepare("SELECT * FROM questions WHERE id = ?");
    
    $query->execute([$id_questions]);
    
    return $query->fetch();
}
