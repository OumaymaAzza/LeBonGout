<?php
include "function.php";
headerFunction();
bodyFunction('accueil');
$conn = connexion();

$query = "SELECT * FROM recettes";
$statement = $conn->prepare($query);
$statement->execute();
$recettes = $statement->fetchAll(PDO::FETCH_ASSOC);
?>
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
<section class="bg-black">

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
            <?php for ($i = 0; $i < min(count($recettes), 3); $i++): ?>
                <div class="recette">
                    <div>
                        <img src="recette/<?php echo $recettes[$i]['url_image']; ?>">
                        <div>
                            <h5><?php echo $recettes[$i]['titre']; ?></h5>
                            <div class="divbg3 ">
                                    <a class="nav-link link3" href="larecette.php?id=<?php echo $recette['id_recette']; ?>">Voir la recettes</a>
                                </div>
                        </div>
                    </div>
                </div>
            <?php endfor; ?>
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
