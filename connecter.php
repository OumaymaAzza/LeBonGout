<?php

include "function.php";
body2Function('connexion');
$error_message = "";
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nom']) && isset($_POST['password'])) {
    $nom = $_POST['nom'];
    $password = $_POST['password'];

    $connexion = connexion();

    $sql = "SELECT * FROM utilisateur WHERE nom_utilisateur = ? AND mot_depasse = ?";
    $stmt = $connexion->prepare($sql);
    $stmt->execute([$nom, $password]);
    $utilisateur = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($utilisateur) {
        header("Location:profilclient.php");
        exit();
    } else {
        $error_message  = "Nom d'utilisateur ou mot de passe incorrect.";
    }
}
?>

<div class="maForm">
    <div class="form-maForm login">
        <form action="" method="POST">
            <h2>Se connecter</h2>
            <?php if(isset($error_message)) { ?>
                <p style="color: red;"><?php echo $error_message; ?></p>
            <?php } ?>
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
            <div>
                <button type="submit">Se connecter</button>
            </div>
            
            <div class="signUp-link">
                <p>Vous n'avez pas de compte ?</p>
                <a href='inscrire.php' class="signUpBtn-link"> S'incrire</a>
            </div>
        </form>
    </div>
</div>


