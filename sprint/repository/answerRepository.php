<?php

function getPossibleAnswers($id_questions){
    
    $pdo = getConnexion();
    
    $query = $pdo -> prepare("SELECT * FROM answers WHERE id_questions = ?");
    
    $query->execute([$id_questions]);
    
    return $query->fetchAll();
}

function getAnswerById($id){
    
    $pdo = getConnexion();
    
    $query = $pdo -> prepare("SELECT * FROM answers WHERE id = ?");
    
    $query->execute([$id]);
    
    return $query->fetch();
}

function getAnswerByResult($id_result){
    
    $pdo = getConnexion();
    
    $query = $pdo -> prepare("SELECT * FROM answers WHERE id_result = ?");
    
    $query->execute([$id_result]);
    
    return $query->fetchAll();
}
