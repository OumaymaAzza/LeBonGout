<?php
function connexion()
{
    $serveur = 'localhost';
    $utilisateur = 'root';
    $mot_de_passe = '';
    $base_de_donnees = 'lebongout';
    try {
        $connexion = new PDO("mysql:host=$serveur;dbname=$base_de_donnees", $utilisateur, $mot_de_passe);
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $connexion;
    } catch (PDOException $e) {
        return null;
    }
}
function bodyFunction($title)
{
    ?>
<!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="style1.css">
        <title><?php echo $title ?> </title>
    </head>

    <body>
    <?php
}
?>
<?php
function body2Function($title)
{
    ?>
<!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
        <title><?php echo $title ?> </title>
    </head>

    <body>
    <?php
}
?>
    <?php
    function headerFunction()
    {
        ?>
        <header>
            <div class="container">
                <nav class="navbar navbar-inverse">
                    <div class="container-fluid">
                        <div class="row mt-3">
                            <div class="col-md-12 d-flex flex-row col-12">
                                <div class="navbar-header  d-flex ">
                                    <a class="navbar-brand logo" href="#">LeBonGout</a>
                                    <ul class="nav navbar-nav d-flex flex-row bd-highlight  ">
                                        <li><a class=" nav-link links pe-5" href="accueil.php">Accueil</a></li>
                                        <li><a class="nav-link  links pe-5" href="#">Blog</a></li>
                                        <li><a class="nav-link links pe-5" href="lesrecettes.php">Recettes</a></li>
                                    </ul>
                                    <div class="divbg  "><a class="nav-link link" href="connecter.php">Se connecter</a>
                                    </div>
                                    <div class="divbg  "><a class="nav-link link" href="inscrire.php">S'inscrire</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </header>
        <?php
    }
    ;
    ?>