<?php

function getResultById(int $id): ?array {
    $pdo = getConnexion();
    
    $query = $pdo->prepare("SELECT
    characters.id,
    characters.pictures_id,
    characters.name,
    characters.description, 
    pictures.alt,
    pictures.url
    FROM
    characters
    INNER JOIN pictures
    ON characters.pictures_id = pictures.id 
    WHERE 
    characters.id = ?");
    
    $query->execute([$id]);
    
    $result = $query->fetch(PDO::FETCH_ASSOC);
    
    return $result ?: null;
}
