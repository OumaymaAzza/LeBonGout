<?php
function connexion() {
    $serveur = 'localhost';
    $utilisateur = 'root';
    $mot_de_passe = '';
    $base_de_donnees = 'lebongout';
    try {
        $connexion = new PDO("mysql:host=$serveur;dbname=$base_de_donnees", $utilisateur, $mot_de_passe);
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $connexion;
    } catch (PDOException $e) {
        // Handle the exception, e.g., log or display an error message
        echo "Connection failed: " . $e->getMessage();
        return null;
    }
}

function bodyFunction($title) {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="style2.css">
        <title><?php echo $title ?> </title>
    </head>
    <body>
    <?php 
}

function headerFunction() {
    ?>
    <header>
        <div class="container">
            <nav class="navbar navbar-inverse">
                <div class="container-fluid">
                    <div class="row mt-3">
                        <div class="col-md-12 d-flex flex-row col-12" >
                            <div class="navbar-header  d-flex ">
                                <a class="navbar-brand logo" href="#">LeBonGout</a>
                                <ul class="nav navbar-nav d-flex flex-row bd-highlight  ">
                                    <li><a  class="nav-link links pe-5" href="#">Accueil</a></li>
                                    <li><a class="nav-link  links pe-5" href="#">Blog</a></li>
                                    <li><a  class="nav-link links pe-5" href="#">Recettes</a></li>
                                </ul>
                                <div class="divbg"><a class="nav-link link"  href="connecter.php">Se connecter</a></div>
                                <div class="divbg"><a class="nav-link link" href="inscrire.php">S'inscrire</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <?php
}

bodyFunction('connection');
$conn = connexion();
?>
<div class="maForm">
    <div class="form-maForm login">
        <form action="login_process.php" method="post">
            <h2>Login</h2>
            <div class="input-group">
                <span class="icon"></span>
                <input id="nom" name='nom' type="text" required>
                <label for="nom">Nom d'utilisateur</label>
            </div>
            <div class="input-group">
                <span class="icon"></span>
                <input id="password" name='password' type="password" required>
                <label for="password">Mot de passe</label>
            </div>
            <div class="remember">
                <label for="remember"><input id="remember" name="remember" type="checkbox"> Rememeber me</label>
            </div>
            <button type="submit">Se connecter</button>
            <div class="signUp-link">
                <p>Don't have an account?</p>
                <a href='inscrire.php' class="signUpBtn-link">S'incrire</a>
            </div>
        </form>
    </div>
</div>

</body>
</html>
