<?php
include "function.php";

$conn = connexion();


if (isset($_GET['id'])) {
    $id_recette = $_GET['id'];

    $query = "SELECT * FROM recettes WHERE id_recette = :id_recette";
    $statement = $conn->prepare($query);
    $statement->bindParam(':id_recette', $id_recette);
    $statement->execute();
    $recette = $statement->fetch(PDO::FETCH_ASSOC);

    if (!$recette) {
        echo "Aucune recette trouvée avec cet identifiant.";
        exit;
    }
} else {
    echo "Identifiant de recette non spécifié.";
    exit;
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style6.css">
    <title>recette</title>
</head>


<body>
    <div class="container justify-content-center mt-5">
        <div class="row ">
            <div class="col-md-12    recette ">
                <h3><?php echo $recette['titre']; ?></h3>
                <img  src="recette\<?php echo $recette['url_image']; ?>" alt="">
                <p><strong>Description :</strong> <?php echo $recette['description']; ?></p>
                <p><strong>Ingrédients :</strong> <?php echo $recette['ingredients']; ?></p>
                <p><strong>Instructions :</strong> <?php echo $recette['instructions']; ?></p>

            </div>
        </div>
    </div>
</body>

</html>