<?php

function getResult(){
    
    $pdo = getConnexion();
    
    $query = $pdo -> prepare("SELECT * FROM result");
    
    $query->execute();
    
    return $query->fetch();
}