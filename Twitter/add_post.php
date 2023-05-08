<?php 

    require 'template/database.php';

    $insert = $database -> prepare("INSERT INTO tweets (contenu_du_tweet) VALUES (:tweets)");
    $insert -> execute(
        [
            "tweets" => $_POST['Tweet']
        ]
    );

    header("Location: index.php");
?>
