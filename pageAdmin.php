<?php
include "function.php";
session_start();

$error = ""; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['admin']) && isset($_POST['password']) && !empty($_POST['admin']) && !empty($_POST['password'])) {
        $conn = connexion();
        if ($conn) {
            $query = "SELECT id_admin FROM admin WHERE nom_admin = :admin AND motdepasse_admin = :password";
            $statement = $conn->prepare($query);
            $statement->bindParam(':admin', $_POST['admin']);
            $statement->bindParam(':password', $_POST['password']);
            $statement->execute();
            $admin = $statement->fetch(PDO::FETCH_ASSOC);
            if ($admin) {
                $_SESSION["admin_id"] = $admin["id_admin"];
                header("Location: pageAccueil.php");
                exit;
            } else {
                $error = "Nom d'utilisateur ou mot de passe incorrect.";
            }
        } else {
            $error = "Erreur de connexion à la base de données.";
        }
    } else {
        $error = "Veuillez saisir votre nom d'utilisateur et votre mot de passe.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style6.css">
    <title>Page d'authentification admin</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Connexion Admin</h2>
                <div>
                <?php if (!empty($error)): ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $error; ?>
                    </div>
                <?php endif; ?>
                </div>
                <form method="post" action="">
                    <input type="text" name="admin" placeholder="Nom d'utilisateur" required>
                    <input type="password" name="password" placeholder="Mot de passe" required>
                    <button type="submit">Se connecter</button>
                </form>
            </div>

        </div>

    </div>

</body>

</html>