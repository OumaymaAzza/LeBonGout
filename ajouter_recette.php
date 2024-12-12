<?php
include "function.php";


session_start();


$conn = connexion();
$query = "SELECT nom_admin FROM admin WHERE id_admin = :admin_id";
$statement = $conn->prepare($query);
$statement->bindParam(':admin_id', $_SESSION['admin_id']);
$statement->execute();
$admin = $statement->fetch(PDO::FETCH_ASSOC);

if ($admin && isset($admin['nom_admin'])) {
    $nom_admin = $admin['nom_admin'];
} else {

    $nom_admin = "Admin";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $titre = $_POST["titre"];
    $description = $_POST["description"];
    $ingredients = $_POST["ingredients"];
    $instructions = $_POST["instructions"];
    $url_image = $_POST["url_image"];

   
    $conn = connexion();
    $query = "INSERT INTO recettes (titre, description, ingredients, instructions, url_image) VALUES (:titre, :description, :ingredients, :instructions, :url_image)";
    $statement = $conn->prepare($query);

    $statement->bindParam(':titre', $titre);
    $statement->bindParam(':description', $description);
    $statement->bindParam(':ingredients', $ingredients);
    $statement->bindParam(':instructions', $instructions);
    $statement->bindParam(':url_image', $url_image);
    $statement->execute();
}

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil de l'administrateur</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style5.css">

</head>

<body>
    <header class="bg-black">
        <nav class="navbar navbar-expand-lg navbar-black bg-black">
            <div class="container">
                <div class="row">
                    <div class="col-md-2 div1">
                        <a class="navbar-brand  logo" href="accueil.php">LeBonGout</a>
                    </div>
                    <div class="col-md-8 collapse navbar-collapse mb-3   div1 " id="navbarNav">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item pe-4">
                                <a class="nav-link" href="ajouter_recette.php">Ajouter une recette</a>
                            </li>
                            <li class="nav-item pe-4">
                                <a class="nav-link" href="modifier_recette.php">Modifier une recette</a>
                            </li>
                            <li class="nav-item pe-4">
                                <a class="nav-link" href="afficher_recette.php">tableau des recettes </a>
                            </li>
                           
                        </ul>
                    </div>
                    <div class="col-md-2 div1">
                        <h5 class='text-white'><img class="img" src="images/admin.png" alt=""> <?php echo $nom_admin; ?>
                        </h5>
                    </div>

                </div>

            </div>
        </nav>
    </header>
    <section>
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mb-4">Ajouter une recette</h2>
                    <form   action="ajouter_recette.php" method="POST">
                        <div class="mb-3">
                            <label for="titre" class="form-label">Titre de la recette</label>
                            <input type="text" class="form-control" id="titre" name="titre" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3"
                                required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="ingredients" class="form-label">Ingrédients</label>
                            <textarea class="form-control" id="ingredients" name="ingredients" rows="5"
                                required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="instructions" class="form-label">Instructions</label>
                            <textarea class="form-control" id="instructions" name="instructions" rows="5"
                                required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="url_image" class="form-label">URL de l'image</label>
                            <input type="file" class="form-control" id="url_image" name="url_image">
                        </div>
                        <button type="submit" class="btn btn-dark">Ajouter la recette</button>
                    </form>

                </div>
            </div>

        </div>
    </section>





</body>

</html>