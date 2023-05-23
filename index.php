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
    require "template/connexion.php";
    //ligne (17) préparation , ligne (18):exécution, ligne(20) récupérer tous les résultats sous forme d'un tableau associatif dans la variable
    $requete = $database->prepare(" SELECT * FROM whisps INNER JOIN users ON whisps.user_id = users.users_id $order");
    $requete->execute();
    //on définit une variable qui va stocker notre requête 
    $whisps = $requete->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>whisp</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/c6879e030e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="feedBody" >

    <?php include 'template/header.php' ?>   

        <main id="mainContent" > 

        <?php include 'template/nav.php' ?>
            <div class="container"> 
                    <!-- sauvegarde des whisps -->
                        <form method="POST" action="template/whisp_saved.php" enctype="multipart/form-data">
                            <input type="text" name="tweet" placeholder=" une petite murmure ? " required>
                            <input type="file" name="media">
                            <button type="submit" class="btn-post"> post </button>
                        </form>
                        <div class="orderClassify">
                            <a href="?order=asc">↓ anciens</a>
                            <a href="?order=desc">↑ recents</a>
                        </div>
                <!--une boucle foreach pour parcourir le tableau $whisps -->
                    <?php foreach ($whisps as $element) { ?>
                        <div class="newAdd">
                            <h5><?= $element['pseudo'] ?></h5>
                            <p><?= $element['tweet'] ?> </p>
                            <?php if ($element['media']) { ?>
                            <img src="images<?= $element['media'] ?>" width="100%" alt="media">
                            <?php } ?>
                            <h6><?= $element['date'] ?> </h6>
                            <!--  -->           
                            <form action="delete.php" method="POST">
                                <input type="hidden" name="supp" value=" <?= $element['whisps_id']; ?> ">
                                <button class="btn-delete" type="submit">supprimer</button>
                            </form>
                        </div>
                    <?php  } ?>
                </div>
                
                <form action="template/research.php" method="GET">
                    <div class="searchContent">
                        <input class="inputSearch" type="search" name="research" placeholder="Rechercher des whisps">
                        <button class="btn-search" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </div>
                </form>
        </main>

        <?php include 'template/footer.php' ?>

    <script src="js/main.js"></script>
</body>
</html>