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


$query = "SELECT * FROM recettes";
$statement = $conn->prepare($query);
$statement->execute();
$recettes = $statement->fetchAll(PDO::FETCH_ASSOC);





?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des recettes</title>
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
                                <a class="nav-link link" href="ajouter_recette.php">Ajouter une recette</a>
                            </li>
                            <li class="nav-item pe-4">
                                <a class="nav-link link" href="modifier_recette.php">Modifier une recette</a>
                            </li>
                            <li class="nav-item pe-4">
                                <a class="nav-link link" href="afficher_recette.php">tableau des recettes </a>
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
                <?php foreach ($recettes as $recette): ?>
                    <div class="recette ">
                        <div >
                            <img src="recette/<?php echo $recette['url_image']; ?>" >
                            <div>
                                <h5 ><?php echo $recette['titre']; ?></h5>
                                <a href="larecette.php?id=<?php echo $recette['id_recette']; ?>" class="btn bg-black text-white">Voir la recette</a>
                                <a href="supprimer_recette.php?id=<?php echo $recette['id_recette']; ?>" class="btn bg-black text-white mt-3">Supprimer la recette</a>
                                <a href="modifier_recette.php?id=<?php echo $recette['id_recette']; ?>" class="btn bg-black text-white mt-3">Modifier la recette</a>

                            
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        </div>
    </section>
</body>

</html>