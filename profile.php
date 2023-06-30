<?php
require "template/database.php";

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['s_users_id'])) {
    // Rediriger l'utilisateur vers la page de connexion ou toute autre action appropriée
    header('Location: login.php');
    exit;
}

// Récupérer l'ID de l'utilisateur connecté depuis la session
$users_id = $_SESSION['s_users_id'];

// Récupération des whisps de l'utilisateur connecté
$whispsQuery = $database->prepare("SELECT * FROM whisps WHERE user_id = :users_id ORDER BY date DESC");
$whispsQuery->execute([
    "users_id" => $users_id
]);
$whisps = $whispsQuery->fetchAll(PDO::FETCH_ASSOC);
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

<section class="d-md-flex px-3 py-2 index_content">
            <!-- Menu -->
            <div class="d-none d-xl-block col-xl-2 pe-3">
                <?php include 'template/nav.php' ?>
            </div>

    <section class="col-xl-8 col-md-8 border p-2">
        <section class="border px-2 pt-2 pb-4 posts">
            <div class="row col-md-6 py-2 ">
                <!-- Avatar -->
                <div class="col d-flex justify-content-start">
                    <?php if (!empty($_SESSION['s_avatar']) && file_exists('images/avatar/' . $_SESSION['s_avatar'])) { ?>
                        <img src="images/avatar/<?php echo $_SESSION['s_avatar']; ?>" class="imgProfil" width="100" alt="Avatar">
                    <?php } else { ?>
                        <img class="border rounded-5 d-flex aligns-item-center" src="images/avatar/default-avatar.png" class="imgProfil" width="100" alt="Avatar">
                    <?php } ?>
                </div>

                <!-- Name and Pseudo -->
                <div class="col d-flex flex-column">
                    <!-- Name -->
                    <div class="">
                        <h2 class=" fs-6 p-1 fw-semibold text-primary">
                            <span class="text-dark-color"> Nom : </span>                            
                            <?= $_SESSION['s_nom'] ?>
                        </h2>
                    </div>
                    <!-- Pseudo -->
                    <div class=""> 
                        <h3 class=" fs-6 p-1 fw-semibold text-primary">
                            <span class="text-dark-color"> Pseudo :</span>  
                            <?= '@'.$_SESSION['s_pseudo']?>
                        </h3>
                    </div>
                </div>
            </div>

            <!-- Publication -->
            <?php foreach ($whisps as $element) { ?>
                <div class="bg-secondary-subtle mb-min d-flex justify-content-center p-2">
                    <article class=" zoom-animation w-75 bg-white rounded-4 px-3 py-2 ">
                        <!-- that div have a row class that will display the information pf the connected user,it'll be divide in three -->
                        <div class="row"> 
                            <!-- avatar -->
                            <div class="  col-1 d-flex flex-column align-items-center justify-content-start">
                                <!-- if the user have an avatar, we display it, autherwise the default avatar will be displayed -->
                                <?php if (!empty($_SESSION['s_avatar']) && file_exists('images/avatar/' . $_SESSION['s_avatar'])) { ?>
                                    <img src="images/avatar/<?php echo $_SESSION['s_avatar']; ?>" class="imgProfil" width="25" alt="Avatar">
                                <?php } else { ?>
                                    <img class="border rounded-5 d-flex aligns-item-center" src="images/avatar/default-avatar.png" class="imgProfil" width="25" alt="Avatar">
                                <?php } ?>
                            </div>
                            <!-- pseudo -->
                            <div class=" image-render col d-flex align-items-center"> 
                                <h3 class="text-primary fs-6 p-1 fw-semibold">
                                    @
                                    <?= $_SESSION['s_pseudo'] ?>
                                </h3>
                            </div>
                            <!-- tag -->
                            <div class="col-1">
                                <i class="fa-solid fa-tags w-20 pt-2 cursor-pointer float-end 
                                    <?php
                                        echo 'icon-color-' . $element['tag'];
                                        # if the user doesn't have a tag, we display the default tag with the class icon-color-gray
                                        if ($element['tag'] == null) {
                                            echo ' icon-color-gray';
                                        }
                                    ?>">
                                </i>
                            </div>
                            <!-- the whisp content or the post content -->
                                <p>
                                    <?= $element['tweet'] ?>
                                </p>
                        </div>
                        <!-- Image -->
                        <?php if ($element['media']) { ?>
                            <figure class="border-top rounded cursor-pointer ">
                                <img src="images/<?= $element['media'] ?>" alt="image" class="w-100 h-50">
                            </figure>
                        <?php } ?>

                        <!-- Delete and post date -->               
                        <form action="template/delete_whisp.php" method="POST">
                            <div class="d-flex justify-content-between align-items-center">
                            <button type="submit" class="border-0 bg-inherit">
                                <?php if (isset($_SESSION['s_pseudo']) && $_SESSION['s_users_id'] == $users_id) { ?>
                                    <i class="fa-solid fa-trash icon-color-red "></i>
                                <?php } ?>
                                <input type="hidden" name="supp" value="<?= $element['whisps_id'] ?>">
                            </button>
                                <span>
                                    <?= $element['date'] ?>
                                </span>
                            </div>
                        </form>
                    </article>
                </div>
                <?php } ?>
                <!-- si la variable de session existe, on affiche le formulaire de suppression -->
                <?php
                    if (isset($_SESSION['whisps_id'])) {
                        include 'template/confirm_delete.php';
                    }
                ?>
        </section>
    </section>
</section>


    <?php include "template/footer.php"; ?>
    <script src="js/script.js"></script>
</body>
</html>