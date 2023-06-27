<?php
session_start();
require "database.php";

$_SESSION["whisps_id"] = $_POST['supp'];

header("Location: ../index.php");
?>