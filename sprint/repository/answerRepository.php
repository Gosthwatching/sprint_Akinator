<?php
function getAnswer($answer){
    
    $pdo = getConnexion();
    
    $query = $pdo -> prepare("SELECT possible_responses FROM answers WHERE id_character IS NOT NULL;");
    
    $query->execute([$order_questions]);
    
    return $query->fetchAll();
}