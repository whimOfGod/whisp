<?php
    session_start();
    require "connexion.php";

    $verify = $database->prepare("SELECT * FROM users WHERE mail = :mail");
    $verify->execute(["mail" => $_POST['mail']]);
    $verifyCondition = $verify->fetchAll(PDO::FETCH_ASSOC);

    if ($verifyCondition == false) {
        // Vérification si un fichier d'avatar a été envoyé
        if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] === UPLOAD_ERR_OK) {
            $avatar = $_FILES['avatar']['name'];
            $avatar_tmp = $_FILES['avatar']['tmp_name'];

            // Déplacer le fichier vers l'emplacement souhaité
            move_uploaded_file($avatar_tmp, "avatar/" . $avatar);
        } else {
            $avatar = null;
        }

        $insert = $database->prepare("INSERT INTO users (nom, pseudo, mail, my_password, avatar) VALUES (:myName, :myPseudo, :myMail, :myPassword, :avatar)");
        $insert->execute([
            "myName" => $_POST['nom'],
            "myPseudo" => $_POST['pseudo'],
            "myMail" => $_POST['mail'],
            "myPassword" => $_POST['my_password'],
            "avatar" => $avatar
        ]);

        $select = $database->prepare("SELECT * FROM users WHERE mail = :mail");
        $select->execute(["mail" => $_POST['mail']]);
        $account = $select->fetchAll(PDO::FETCH_ASSOC);

        $_SESSION['s_users_id'] = $account[0]['users_id'];
        $_SESSION['s_nom'] = $account[0]['nom'];
        $_SESSION['s_pseudo'] = $account[0]['pseudo'];
        $_SESSION['s_mail'] = $account[0]['mail'];
        $_SESSION['s_password'] = $account[0]['my_password'];
        $_SESSION['s_avatar'] = $account[0]['avatar'];

        // Redirection vers la page d'accueil
        header("Location: ../index.php");
    } else {
        echo "Ce compte existe déjà";
    }
?>