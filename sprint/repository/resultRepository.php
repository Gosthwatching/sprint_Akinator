<?php

function getResultById(int $id): ?array {
    $pdo = getConnexion();
    
    $query = $pdo->prepare("SELECT
    characters.id,
    `pictures_id`,
    `name`,
    description, 
    alt,
    url
    FROM
    `characters`
    INNER JOIN pictures
    ON characters.pictures_id = pictures.id 
    WHERE 
    characters.id = ?");
    
    $query->execute([$id]);
    
    return $query->fetch();
}
