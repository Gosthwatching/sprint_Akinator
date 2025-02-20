<?php

function getPossibleAnswers(int $id_questions): array {
    $pdo = getConnexion();
    
    $query = $pdo->prepare("SELECT * FROM answers WHERE id_questions = ?");
    
    $query->execute([$id_questions]);
    
    return $query->fetchAll();
}

function getAnswerById(int $id): ?array {
    $pdo = getConnexion();
    
    $query = $pdo->prepare("SELECT * FROM answers WHERE id = ?");
    
    $query->execute([$id]);
    
    return $query->fetch() ;
}

function getAnswerByResult(int $id_result): array {
    $pdo = getConnexion();
    
    $query = $pdo->prepare("SELECT * FROM answers WHERE id_result = ?");
    
    $query->execute([$id_result]);
    
    return $query->fetchAll();
}
