<?php
session_start();
require "template/database.php";
    $requete = $database->prepare("SELECT * FROM users WHERE users_id = :users_id");
    $requete->execute([
        "users_id" => $_SESSION['s_users_id']
    ]);
    $user = $requete->fetch(PDO::FETCH_ASSOC);
    #si l'utilisateur n'est pas connecté, personne ne peut accéder à son profil
    if (!isset($_SESSION['s_pseudo'])) {
        header('Location: index.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>profile</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body id="profile-content-body">
    <?php include "template/header.php"; ?>

        <section>
            <h2 class="text-primary">Mes whisps</h2>
            <div class="d-flex flex-column align-items-center justify-content-start">
                <?php
                    $requete = $database->prepare("SELECT * FROM whisps WHERE user_id = :user_id ORDER BY date DESC");
                    $requete->execute([
                        "user_id" => $_SESSION['s_users_id']
                    ]);
                    $whisps = $requete->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($whisps as $whisp) {
                ?>
                <div class="d-flex flex-column align-items-center justify-content-start">
                    <div class="d-flex flex-column align-items-center justify-content-start">
                    <?php if (!empty($_SESSION['s_avatar']) && file_exists('images/avatar/' . $_SESSION['s_avatar'])) { ?>
                            <img src="images/avatar/<?php echo $_SESSION['s_avatar']; ?>" class="imgProfil" width="50" alt="Avatar">
                        <?php } else { ?>
                            <img class="border rounded-5" src="images/avatar/default-avatar.png" class="imgProfil" width="50" alt="Avatar">
                        <?php } ?>
                    </div>
                    <div class="d-flex flex-column align-items-center justify-content-start">
                        <p class="text-primary"><?= $whisp['tweet'] ?></p>
                        <p class="text-primary"><?= $whisp['date'] ?></p>
                    </div>
                </div>
                <?php
                    }
                ?>
            </div>
        </section>
    <?php include "template/footer.php"; ?>
</body>
</html>