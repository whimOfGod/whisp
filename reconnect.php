<?php 
    session_start();
// connexion à la base de donnée
     require "template/connexion.php";
     //préparation , exécution, récupération de tous les résultats sous forme d'un tableau associatif dans la variable
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Whisp/connexion</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/c6879e030e.js" crossorigin="anonymous"></script>
</head>

<body class="inscriptionBody">

    <?php include 'template/header.php' ?>
        <main class="suscribMain">
        <!--<div class="imageWhisp"><img src="images/splash.png" alt="" style="height: 700px;width: 700px;"></div>-->
            <div class="myFormular">
                <form class="myFormularContent" method="POST" action="template/login.php" enctype="multipart/form-data">
                    <h2>connectez-vous</h2>
                    <label for="">mail</label>
                    <input type="email" name="mail" placeholder="Votre adresse e-mail" required>
                    <label for="">mot de passe</label>
                    <input type="password" name="password" placeholder="Mot de passe" required>
                    <div class="contentButton">   <button class="mySubmitButton" type="submit"> connexion </button> </div>
                    <a href="inscription.php">inscrivez-vous ?</a>
                </form>
            </div>
        </main>
 
    <?php include 'template/footer.php' ?>

    <script src="js/main.js">
    </script>
</body>
</html>