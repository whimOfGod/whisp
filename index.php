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
    <script src="https://kit.fontawesome.com/c6879e030e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="feedBody" >
   
    <main id="mainContent" >
        <nav>   
        <h1>whisp</h1>
            <ul>
                <a href="#"><li># Whisphome</li></a>
                <a href="#"><li># message</li></a>
                <a href="#"><li># notification</li></a>
                <a href="#"><li># setting</li></a>
                <a href="inscription.php">connectez-vous ?</a>
                <a href="template/disconnect.php"># disconnect </a>
                    <?php if (isset($_SESSION['s_users_id'])) { ?>
                        <div class="user-avatar">
                            <?php if ($_SESSION['s_avatar']) { ?>
                                <img src="images/avatar/<?php echo $_SESSION['s_avatar']; ?>" width=50 alt="Avatar">
                            <?php } else { ?>
                                <img src="images/avatar/default-avatar.png" alt="Default Avatar">
                            <?php } ?>
                        </div>
                    <?php } ?>
            </ul>
            
        </nav>
        <!-- Formulaire de connexion -->

        <div class="container"> 
                <!-- sauvegarde des whisps-->
                    <form method="POST" action="template/whisp_saved.php" enctype="multipart/form-data">
                        <input type="hidden" name="user_id" value="10"><!-- un champ de type "hidden" nommé "user_id" dont la valeur est fixée à "10". Cette valeur devrait être remplacée par l'ID de l'utilisateur actuellement connecté. -->
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
                        <h4><?= $element['pseudo'] ?></h4>
                        <p><?= $element['tweet'] ?> </p>
                        <?php if ($element['media']) { ?>
                        <img src="images<?= $element['media'] ?>" width=200 alt="media">
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
    

</body>
</html>