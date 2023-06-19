<?php
//import database
require "template/database.php";
//get last whisp by date
$requete = $database->prepare("SELECT * FROM whisps INNER JOIN users ON whisps.user_id = users.users_id ORDER BY date DESC LIMIT 1");
$requete->execute();
$whisp = $requete->fetch(PDO::FETCH_ASSOC);

echo json_encode($whisp);



?>