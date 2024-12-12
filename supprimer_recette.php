<?php


include "function.php";


session_start();


$conn = connexion();
function supprimerRecette($id_recette, $conn) {
    $query = "DELETE FROM recettes WHERE id_recette = :id_recette";
    $statement = $conn->prepare($query);
    $statement->bindParam(':id_recette', $id_recette);
    $statement->execute();
    
}
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id_recette = $_GET['id'];
    supprimerRecette($id_recette, $conn);

    header("Location: afficher_recette.php");
    exit();
} else {
    
}



?>