<?php
include "function.php";
bodyFunction('Votre profile');
$conn = connexion();
$query = "SELECT * FROM recettes";
$statement = $conn->prepare($query);
$statement->execute();
$recettes = $statement->fetchAll(PDO::FETCH_ASSOC);
?>

<header>
    <div class="container">
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="row mt-3">
                    <div class="col-md-12 d-flex flex-row ">
                        <div class="navbar-header  d-flex ">
                            <a class="navbar-brand logo " href="accueil.php">LeBonGout</a>
                            <ul class="nav navbar-nav d-flex flex-row bd-highlight  ">
                                <li><a class=" nav-link links pe-5" href="profilclient.php">Accueil</a></li>
                                <li><a class="nav-link  links pe-5" href="#">Blog</a></li>
                                <li><a class="nav-link links pe-5" href="#">Recettes</a></li>
                            </ul>
                            <div class=" div1">
                                <a href="profilclient.php"> <img src="images/user.png" alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</header>
<section>
    <div class="container">
        <div class="row m-5">

            <div class="col-md-12 m-5 col-12 ">
                <div class="text">
                    <div class="parag">
                        <p class="p1">Les meilleures recettes du monde.</p>
                    </div>

                </div>
                <div class="text">
                    <div class="parag">
                        <h1 class="titre">
                            Goûtez aux saveurs riches des recettes nouvelles et savoureuses.
                        </h1>
                    </div>

                </div>
                <div class="text">
                    <div class="parag">
                        <p class="p2">
                            Nous n'utilisons que des ingrédients de qualité cinq étoiles pour nos recettes. Venez
                            découvrir la richesse dans chaque plat que nous proposons sur notre site web.
                        </p>
                    </div>


                </div>

            </div>
            <div class="col-md-12  ">
                <div class="divbg2  ">
                    <a class="nav-link link2" href="lesrecettes.php">Voir les recettes</a>
                </div>

            </div>
        </div>
    </div>
</section>

<section class="section3 bg-black">
    <div class="container ">
        <div class="row m-5">
            <div class="col-md-12 m-5">
                <div class="text">
                    <div class="parag">
                        <h1 class="titre2">
                            des recettes spéciales
                        </h1>
                    </div>

                </div>
                <div class="text">
                    <div class="parag">
                        <p class="p2">
                            Explorez nos recettes spéciales du jour, une sélection unique pour chaque jour, vous offrant
                            une expérience culinaire variée à chaque visite.
                        </p>
                    </div>


                </div>
            </div>


        </div>
        <div class="row">
            <?php foreach ($recettes as $recette): ?>
                <div class="recette ">
                    <div>
                        <img src="recette/<?php echo $recette['url_image']; ?>">
                        <div>
                            <h5><?php echo $recette['titre']; ?></h5>
                            <div class="divbg3 ">
                                <a class="nav-link link3" href="larecette.php?id=<?php echo $recette['id_recette']; ?>">Voir
                                    la recettes</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    </div>
    </div>
</section>
<footer>
    <div class="footer">
        <div class="contain">
            <div class="col">
                <h1>Entreprise</h1>
                <ul>
                    <li>À propos</li>
                    <li>Mission</li>
                    <li>Services</li>
                    <li>Réseaux sociaux</li>
                    <li>Nous contacter</li>
                </ul>
            </div>
            <div class="col">
                <h1>Produits</h1>
                <ul>
                    <li>À propos</li>
                    <li>Mission</li>
                    <li>Services</li>
                    <li>Réseaux sociaux</li>
                    <li>Nous contacter</li>
                </ul>
            </div>
            <div class="col">
                <h1>Comptes</h1>
                <ul>
                    <li>À propos</li>
                    <li>Mission</li>
                    <li>Services</li>
                    <li>Réseaux sociaux</li>
                    <li>Nous contacter</li>
                </ul>
            </div>
            <div class="col">
                <h1>Ressources</h1>
                <ul>
                    <li>Courrier web</li>
                    <li>Code de remboursement</li>
                    <li>Recherche WHOIS</li>
                    <li>Plan du site</li>
                    <li>Modèles web</li>
                    <li>Modèles d'email</li>
                </ul>
            </div>
            <div class="col">
                <h1>Support</h1>
                <ul>
                    <li>Nous contacter</li>
                    <li>Chat web</li>
                    <li>Ouvrir un ticket</li>
                </ul>
            </div>

            <div class="clearfix"></div>
        </div>
    </div>
</footer>
</body>

</html>