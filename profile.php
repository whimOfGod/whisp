<?php
require "template/database.php";

# Si l'utilisateur n'est pas connecté, personne ne peut accéder à son profil
if (!isset($_SESSION['s_users_id'])) {
    header('Location: index.php');
    exit(); // Ajoutez cette ligne pour arrêter l'exécution du script après la redirection
}

$requete = $database->prepare("SELECT * FROM users WHERE users_id = :users_id");
$requete->execute([
    "users_id" => $_SESSION['s_users_id']

]);
$user = $requete->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>profile</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/c6879e030e.js" crossorigin="anonymous"></script>
</head>
<body id="profile-content-body">
    <?php include "template/header.php"; ?>

        <section class="d-flex justify-content-center ">
            
            <div class="d-flex flex-column border rounded-3 p-3 my-2 w-50  ">
                <?php
                    $requete = $database->prepare("SELECT * FROM whisps WHERE user_id = :user_id ORDER BY date DESC");
                    $requete->execute([
                        "user_id" => $_SESSION['s_users_id']
                    ]);
                    $whisps = $requete->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($whisps as $whisp) {
                ?>

                <div class="d-flex flex-column align-items-center justify-content-start">
                <div class="row"> 
                    <!-- avatar -->
                    <div class=" col-1 d-flex flex-column align-items-center justify-content-start">
                        <!-- if the user have an avatar, we display it, autherwise the default avatar will be displayed -->
                        <?php if (!empty($_SESSION['s_avatar']) && file_exists('images/avatar/' . $_SESSION['s_avatar'])) { ?>
                            <img src="images/avatar/<?php echo $_SESSION['s_avatar']; ?>" class="imgProfil" width="25" alt="Avatar">
                        <?php } else { ?>
                            <img class="border rounded-5 d-flex aligns-item-center" src="images/avatar/default-avatar.png" class="imgProfil" width="25" alt="Avatar">
                        <?php } ?>
                    </div>
                    <!-- pseudo -->
                    <div class="col d-flex align-items-center"> 
                        <h3 class="text-primary fs-6 p-1 fw-semibold">
                            @
                            <!-- <?= $whisp['pseudo'] ?> -->
                        </h3>
                    </div>
                    <!-- tag -->
                    <div class="col-1">
                        <i class="fa-solid fa-tags w-20 pt-2 cursor-pointer float-end 
                            <?php
                                echo 'icon-color-' . $whisp['tag'];
                                # if the user doesn't have a tag, we display the default tag with the class icon-color-gray
                                if ($whisp['tag'] == null) {
                                    echo ' icon-color-gray';
                                }
                            ?>">
                        </i>
                    </div>
                    <!-- the whisp content or the post content -->
                        <p>
                            <?= $whisp['tweet'] ?>
                        </p>
                </div>
                <!-- Image -->
                <?php if ($whisp['media']) { ?>
                    <figure class="border-top rounded cursor-pointer">
                        <img src="images/<?= $whisp['media'] ?>" alt="image" class="w-100 h-80">
                    </figure>
                <?php } ?>
                 <!-- Delete and post date -->
                 <form action="template/delete_whisp.php" method="POST">
                    <div class="d-flex justify-content-between align-items-center">
                        <button type="submit" class="border-0 bg-inherit">
                            <i class="fa-solid fa-trash icon-color-red ">
                                <input type="hidden" name="supp" value="<?= $whisp['whisps_id'] ?>">
                            </i>
                        </button>
                        
                        <span>
                            <?= $whisp['date'] ?>
                        </span>
                    </div>
                </form>
                </div>
                <?php
                    }
                ?>
            </div>
        </section>
    <?php include "template/footer.php"; ?>
</body>
</html>