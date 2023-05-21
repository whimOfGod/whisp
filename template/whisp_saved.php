<?php
session_start();
require "connexion.php";

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['s_users_id'])) {
    // Redirection vers la page d'accueil ou une page d'erreur
    header("Location: ../index.php");
    exit();
}
// Vérification si un fichier a été envoyé
if(isset($_FILES['media']) && $_FILES['media']['error'] === UPLOAD_ERR_OK) {
    $media = $_FILES['media']['name'];
    $media_tmp = $_FILES['media']['tmp_name'];

    // Déplacer le fichier vers l'emplacement souhaité
    move_uploaded_file($media_tmp, "images/" . $media);
} else {
    $media = null;
}

// Préparation de la requête SQL d'insertion qui insère les valeurs du whisp dans la table whisps
$insert = $database->prepare("INSERT INTO whisps (whisps_id, tweet, user_id, media) VALUES (null, :tweet, :user_id, :media)");
$insert->execute([
    "tweet" => $_POST['tweet'],
    "user_id" => $_SESSION['s_users_id'],
    "media" => $media
]);

header("Location: ../index.php");
?>
