<?php 
//deconnexion 
    session_start();
    unset($_SESSION["auth"]);
    $_SESSION['flash']['success'] = "Log out successfully";

    //rediriger vers login

    header("Location: loginy.php");
?>