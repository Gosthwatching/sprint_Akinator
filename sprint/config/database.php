<?php

function getConnexion():object
{
    $pdo = new PDO('mysql:host=db.3wa.io;port=3306;dbname=yarnochedemail_sprintB;charset=utf8', 'yarnochedemail', '41d111c3f3f879c3db61a96eddfc8d3c');
    
    return $pdo;
}