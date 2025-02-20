<?php

function getResultById($id){
    
    $pdo = getConnexion();
    
    $query = $pdo -> prepare("SELECT * FROM characters WHERE id = ?");
    
    $query->execute([$id]);
    
    return $query->fetch();
}