<?php
// Utilisation de fonctions pour favoriser la réutilisabilité du code
function calculate_sum($numbers) {
    // Utilise array_sum pour une somme efficace
    return array_sum($numbers);
}

// Code principal
$numbers = range(1, 100); // Création d'un tableau de nombres de 1 à 100
$total = calculate_sum($numbers);

// Affichage du résultat avec une impression concise
echo "La somme des nombres de 1 à 100 est : $total\n";
?>
