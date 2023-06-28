<?php 
session_start();
    //initialisation de la variable $order
    $order = '';
    //vérification de l'existence la variable dans l'URL 
        if (isset($_GET['order'])) {
            if ($_GET['order'] == 'asc') {
            // faire un Tri du plus ancien au plus récent
                $order = 'ORDER BY date ASC'; 
            } elseif ($_GET['order'] == 'desc') {
            // faire un Tri du plus récent au plus ancien
                $order = 'ORDER BY date DESC'; 
            }
        };
        // connexion à la base de donnée
        require "template/database.php";
        //ligne (17) préparation , ligne (18):exécution, ligne(20) récupérer tous les résultats sous forme d'un tableau associatif dans la variable
            $requete = $database->prepare(" SELECT * FROM whisps INNER JOIN users ON whisps.user_id = users.users_id $order ");
            $requete->execute();
            //on définit une variable qui va stocker notre requête 
            $whisps = $requete->fetchAll(PDO::FETCH_ASSOC);
        
        if (isset($_GET['research'])) {
            $query = $_GET['research'];
            $requete = $database->prepare("SELECT * FROM whisps INNER JOIN users ON whisps.user_id = users.users_id WHERE tweet LIKE :query ORDER BY date DESC");
            $requete->execute([
                ':query' => '%'.$query.'%'
            ]);
            $_SESSION['results'] = $requete->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $_SESSION['results'] = [];
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>whisp</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/c6879e030e.js" crossorigin="anonymous"></script>
</head>
<body>
    <!-- Header -->
    <?php include 'template/header.php' ?>
    <!-- Index content -->
    <section class="d-md-flex px-3 py-2 ">
        <!-- Menu -->
        <div class="d-none d-xl-block col-xl-2 pe-3">
            <?php include 'template/nav.php' ?>
        </div>
        <!-- Search Result and Message -->
        <section class="order-3 col-md-4 col-xl-2 ps-md-2 d-flex flex-column flex-wrap align-items-center">
            <!-- Search Result -->          
                <?php include 'template/research.php' ?>
            <!-- Message -->
            <?php include 'template/message.php' ?>
        </section>
        <!-- Main content -->
        <section class="col-xl-8 col-md-8 border p-2">
            <!-- Menu -->
            <ul class="d-none d-xl-flex justify-content-center align-items-center list-unstyled mb-3 h-60 bg-primary" id="menu">
                <li class="middle-nav-hover cursor-pointer text-white  border-end border-3 border-primary pe-3">Accueil</li>
                <li class="cursor-pointer text-white  px-3 border-end border-3 border-primary">Message</li>
                <li class="cursor-pointer text-white  px-3 border-end border-3 border-primary">A propos</li>
                <li class="cursor-pointer text-white  px-3 border-end border-3 border-primary">Confidentialité</li>
                <li class="cursor-pointer text-white  px-3 border-end border-3 border-primary" onclick="showForm()">S'inscrire</li>
            </ul>
            <!-- Greeting -->
            <p class="fw-bold">
                Bonjour
                <span class="text-primary">
                    <?php
                        //si la variable de session existe, afficher le pseudo de l'utilisateur
                        if (isset($_SESSION['s_pseudo'])) {
                            echo " ".$_SESSION['s_pseudo'];
                        } else {
                            echo ' visiteur';
                        }
                    ?>
               </span>
            </p>
            <!-- Publications -->
            <section class="border px-2 pt-2 pb-4 posts">
                <!-- Make a publication -->
                <?php include 'template/post_content.php' ?>
            </section>
        </section>
    </section>
    <!-- Footer -->
    <?php include 'template/footer.php' ?>

    <section >
        <?php
        //si la variable de session n'existe pas, on affiche le formulaire de connexion
            if (!isset($_SESSION['s_nom'])) {
                include 'login.php';
            }
        ?>
    </section>

    <script src="js/script.js"></script>
    <script>
        // previewImage , on affiche l'image avant de la télécharger
        const imageInput = document.getElementById("imagePost");
        const previewImage = document.getElementById("previewImage");

        imageInput.addEventListener("change", function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();

            //on lit le fichier et on l'affiche dans l'élément previewImage
            reader.addEventListener("load", function() {
                previewImage.src = reader.result;
                if (previewImage.classList.contains("d-none")) {
                    previewImage.classList.remove("d-none");
                }
            });

            reader.readAsDataURL(file);
        }
        });
        function showForm() {
          document.getElementById('hoverSection').classList.remove('d-none');
        }
    </script>
</body>
</html>