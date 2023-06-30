<?php
require "database.php";

if (isset($_POST['mail']) && isset($_POST['password'])) {
    $mail = $_POST['mail'];
    $password = $_POST['password'];

    // Récupération de l'utilisateur correspondant à l'adresse e-mail fournie
    $query = $database->prepare("SELECT * FROM users WHERE mail = :mail");
    $query->execute(["mail" => $mail]);
    $user = $query->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        // Vérification du mot de passe haché
        if (password_verify($password, $user['my_password'])) {
            // Connexion réussie, enregistrement des informations de l'utilisateur dans la session
            $_SESSION['s_users_id'] = $user['users_id'];
            $_SESSION['s_nom'] = $user['nom'];
            $_SESSION['s_pseudo'] = $user['pseudo'];
            $_SESSION['s_mail'] = $user['mail'];

            // Redirection vers la page d'accueil après la connexion
            header("Location: ../index.php");
            exit();
        } else {
            // Mot de passe incorrect
            echo "Identifiants invalides";
            header("Location: ../login.php");
            exit();
        }
    } else {
        // Utilisateur non trouvé
        echo "Identifiants invalides";
        header("Location: ../index.php");
        exit();
    }
} else {
    // Redirection vers la page d'accueil si les champs ne sont pas définis
    header("Location: ../index.php");
    exit();
}
?>