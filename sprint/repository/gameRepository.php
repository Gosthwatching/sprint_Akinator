<?php


function gameHistorySave(int $game_id, int $id_users, string $result): void {
    $pdo = getConnexion();
    
    $query = $pdo->prepare("INSERT INTO game_history (game_id, id_users, result) VALUES (?, ?, ?)");
    
    $query->execute([$game_id, $id_users, $result]);
}

function getGameHistory(): array {
    $pdo = getConnexion();
    
    $query = $pdo->prepare("SELECT * FROM game_history ORDER BY date_played DESC");
   
    $query->execute();
    
    return $query->fetchAll();
}

