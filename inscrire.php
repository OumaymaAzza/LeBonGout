<?php
include "function.php";
body2Function('inscription');


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $conn = connexion();
    $demande = $conn->prepare('INSERT INTO utilisateur (nom_utilisateur, email_utilisateur, mot_depasse) VALUES (?,?,?)');
    $success = $demande->execute([$nom, $email ,$password]);
    if($success){
        header('location:profilclient.php');
    }
    else{
        echo 'echec';
    }
}



?>

?>
<div class="maForm">
    <div class="form-maForm login">
        <form action="" method="post">
            <h2>S'inscrire</h2>
            <div class="input-group">
                <input id="nom"  name='nom' type="text" required>
                <label for="nom">Votre nom</label>
            </div>
            <div class="input-group">
                <input id="email"  name='email' type="email" required>
                <label for="email">Votre email</label>
            </div>
            <div class="input-group">
                <input id="password"  name='password' type="password" required>
                <label for="password">Mot de passe</label>
            </div>
            <button type="submit">S'inscrire</button>
            <div class="signUp-link">
                <p> Vous avez déjà un compte ?</p>
                <a href='connecter.php' class="signUpBtn-link">Se connecter </a></div>
        </form>
    </div>
</div>

</body>
</html>
