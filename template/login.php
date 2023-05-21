<?php
session_start();
require "connexion.php";

// on procède à une vérification des champs du formulaire de connexion
if (isset($_POST['mail']) && isset($_POST['password'])) {
    $mail = $_POST['mail'];
    $password = $_POST['password'];

    // Requête pour récupérer l'utilisateur correspondant aux identifiants fournis
    $query = $database->prepare("SELECT * FROM users WHERE mail = :mail AND my_password = :password");
    $query->execute([
        "mail" => $mail,
        "password" => $password
    ]);

    $user = $query->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        // Connexion réussie, enregistrement des informations de l'utilisateur dans la session
        $_SESSION['s_users_id'] = $user['users_id'];
        $_SESSION['s_nom'] = $user['nom'];
        $_SESSION['s_pseudo'] = $user['pseudo'];
        $_SESSION['s_mail'] = $user['mail'];
        $_SESSION['s_password'] = $user['my_password'];

        // Redirection vers la page d'accueil après la connexion
        header("Location: ../index.php");
        exit();
    } else {
        // Identifiants invalides, affichage d'un message d'erreur
        echo "Identifiants invalides";
        header("Location: ../reconnect.php");
    }
} else {
    // Redirection vers la page d'accueil si les champs ne sont pas présents
    header("Location: ../index.php");
    exit();
}
?>