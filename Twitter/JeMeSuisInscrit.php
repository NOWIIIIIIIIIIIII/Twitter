<?php 

require 'template/database.php';

$insert = $database -> prepare("INSERT INTO profil (Nom, pseudonyme, mail, mot_de_passe, Photo_de_profil) VALUES (:yay_Nom, :yay_pseudonyme, :yay_mail, :yay_mot_de_passe, :yay_Photo_de_profil)");
$insert -> execute(
    [
        "yay_Nom" => $_POST['Nom'],
        "yay_pseudonyme" => $_POST['Pseudonyme'],
        "yay_mail" => $_POST['mail'],
        "yay_mot_de_passe" => $_POST['Mot_de_passe'],
        "yay_Photo_de_profil" => $_POST['Photo_de_profil']
    ]
);

header("Location: inscription.php");
?>