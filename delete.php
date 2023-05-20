<?php
session_start();
require "template/connexion.php";

// Récupérer le chemin du fichier à supprimer
$fetchMedia = $database->prepare("SELECT media FROM whisps WHERE whisps_id = :whisps_id");
$fetchMedia->execute([
    "whisps_id" => $_POST['supp'],
]);
$mediaPath = $fetchMedia->fetchColumn();

// Supprimer l'enregistrement de la base de données
$deleteWhisp = $database->prepare("DELETE FROM whisps WHERE whisps_id = :whisps_id");
$deleteWhisp->execute([
    "whisps_id" => $_POST['supp'],
]);

// Supprimer le fichier média du dossier
if (!empty($mediaPath)) {
    $filePath = 'whisp' . $mediaPath; // Remplacez par le chemin réel de votre dossier
    if (file_exists($filePath)) {
        unlink($filePath);
    }
}

header("Location: index.php")
?>