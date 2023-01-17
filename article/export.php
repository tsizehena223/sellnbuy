<?php

    //affichage photo publication

    $bdd = new PDO("mysql:host=localhost; dbname=sb_signin", "root", "");
    $req = $bdd -> prepare("SELECT * FROM images WHERE id = ? LIMIT 1");
    $req -> setFetchMode(PDO::FETCH_ASSOC);
    $req -> execute([$_GET['id']]);
    $tab = $req -> fetchAll();
    echo $tab[0]["bin"];

?>