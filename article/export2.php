<?php

    //affichage photo de profil

    $bdd = new PDO("mysql:host=localhost; dbname=sb_signin", "root", "Tsizehena,223");
    $req = $bdd -> prepare("SELECT * FROM pdp WHERE user_pdp_id = ? LIMIT 1");
    $req -> setFetchMode(PDO::FETCH_ASSOC);
    $req -> execute([$_GET['id']]);
    $tab = $req -> fetchAll();
    echo $tab[0]["bin"];
