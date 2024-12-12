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




</body>

</html>