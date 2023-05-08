<?php

require "template/database.php";

 

$search = $database->prepare("SELECT * FROM tweets WHERE contenu_du_tweet LIKE '%".$_GET['Recherche']."%' ORDER BY date_de_creation DESC");
$search->execute();
$searchTweet = $search->fetchAll(PDO::FETCH_ASSOC);

?>

<?php foreach ($searchTweet as $twit) { ?>
    <div>
        <p><?= $twit['contenu_du_tweet'] ?></p>
        <p><?=$twit['date_de_creation']?></p>
        <form action="delete.php" method="POST">
            <input type="hidden" name="supp" value="<?= $twit['id'] ?>">
            <button type="submit">Supprimer</button>
        </form>
    </div>
<?php } ?>