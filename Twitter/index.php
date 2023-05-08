<?php 

require "template/database.php";

$requete = $database->prepare("SELECT * From tweets ORDER BY date_de_creation DESC");
$requete->execute();
$allTweet = $requete->fetchAll(PDO::FETCH_ASSOC);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Twitter</title>
</head>
<body>
    <h1><a href="inscription.php"> Inscrit toi !</a></h1>

    <form method="GET" action="recherche.php">
        <input type="text" name="Recherche" placeholder="Recherche Tweet">
        <button type="submit"> Chercher </button>
    </form>
    
    <form method="POST" action="add_post.php">
        <input type="text" name="Tweet" placeholder="Que veux tu partager ?">
        <button type="submit"> Envoyer </button>
    </form>

    <?php foreach($allTweet as $tweets) {  ?>
            <div>
                <p><?=$tweets['contenu_du_tweet']?></p>
                <p><?=$tweets['date_de_creation']?></p>
                <form action="delete.php" method="POST">
                    <input type="hidden" name="supp" value="<?= $tweets['id'] ?>">
                    <button type="submit">Supprimer</button>
                </form>
            </div>
        <?php } ?>


</body>
</html>