<?php
session_start();
unset($_SESSION["unique_id"]);
unset($_SESSION["name"]);
header("Location:/social_network/login.php");
?>