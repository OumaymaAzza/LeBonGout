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





</section>
<section>
    <div class="container">
        <div class="m-5 pt-3 text-center">
            <h1> NOTRE RECETTES POUR VOUS</h1>
            <p class="paragr">Explorez notre sélection de recettes minutieusement concoctées pour émerveiller vos papilles et nourrir votre passion pour la cuisine. De plats traditionnels à des créations innovantes, chaque recette est une invitation à découvrir de nouveaux horizons culinaires et à créer des moments inoubliables autour de la table.</p>
        </div>
        <div class="row">
        <?php foreach ($recettes as $recette): ?>
                    <div class="recette ">
                        <div>
                            <img src="recette/<?php echo $recette['url_image']; ?>">
                            <div>
                                <h5><?php echo $recette['titre']; ?></h5>
                                <div class="divbg3 ">
                                    <a class="nav-link link3" href="larecette.php?id=<?php echo $recette['id_recette']; ?>">Voir la recettes</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
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