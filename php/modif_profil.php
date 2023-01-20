<?php

// modification ana profil

$bdd = new PDO("mysql:host=localhost; dbname=sb_signin;", "root", "Tsizehena,223");
if (session_status() == PHP_SESSION_NONE) {
    session_start();
};

if (isset($_POST['modifier'])) {

    //insertion photo
    $user_pdp_id = $_SESSION["auth"]["id"];

    $req = $bdd->prepare("INSERT INTO sb_signin.pdp (nom, taille, types, bin, user_pdp_id) VALUES (?, ?, ?, ?, ?)");
    $req->execute([$_FILES["image"]["name"], $_FILES["image"]["size"], $_FILES["image"]["type"], file_get_contents($_FILES["image"]["tmp_name"]), $user_pdp_id]);

    //insertion information
    $user_id = $_SESSION["auth"]["id"];
    $descri = $_POST['user_descri'];
    $exp = $_POST['experience'];
    $educ = $_POST['education'];
    $skills = $_POST['skills'];
    $langage = $_POST['langage'];
    $fonc = $_POST['fonction'];

    $requete = $bdd->prepare("INSERT INTO sb_signin.user_info 
            (descri_user, experience, education, skills, langage, fonction, `user_id`) 
            VALUES (?, ?, ?, ?, ?, ?, ?)");
    $requete->execute([$descri, $exp, $educ, $skills, $langage, $fonc, $user_id]);

    header('Location: ../profil_actus/profile.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../profil/mofi_pro.css">
    <title>Modification de profil</title>
</head>

<body>
    <a href="../profil_actus/profile.php"><button class="btn btn-success">Retour</button></a>
    <fieldset>
        <img src="../img/logo.png" alt="logo S&B">
        <form enctype="multipart/form-data" method="POST">
            <br><br>
            <label for="descri" class="yes">Description : </label>
            <input type="text" name="user_descri" id="descri" required> <br><br>

            <label for="exp" class="yes">Expériences : </label>
            <input type="text" name="experience" id="exp" required> <br><br>

            <label for="educ" class="yes">Education : </label>
            <input type="text" name="education" id="educ" required> <br><br>

            <label for="skill" class="yes">Skills : </label>
            <input type="text" name="skills" id="skill" required> <br><br>

            <label for="lang" class="yes">Langages : </label>
            <input type="text" name="langage" id="lang" required> <br><br>

            <label for="fonc" class="yes">Fonction : </label>
            <input type="text" name="fonction" id="fonc" required> <br><br>

            <input type="hidden" name="MAX_FILE_SIZE" value="1500000" />
            <label for="img" class="yes">Photo : </label>
            <input type="file" name="image" id="img" required> <br><br>

            <input type="submit" class="btn-success" value="Modifier" name="modifier" />

        </form>
    </fieldset>
</body>

</html>