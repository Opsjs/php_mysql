<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hello World !</title>
</head>
<body style="">
    <?php require 'index.template.php'; ?>
    <?php require 'database.php';?>

<!--Form ajout Tweet-->
    <div class="add_tweet">
        <form action="add_delete.php" method="POST">
            <input type="hidden" name="form" value="ajoutTweet">

            <label for="tweet" id="labelTweetBox">Publiez un nouveau Tweet : </label>
            <br>
            <textarea name="tweetBox" id="tweetBox" cols="50" rows="7"></textarea>
            <br>
            <button type="submit" id="button_publish_tweet"> Publier</button>

        </form>
    </div>

    
    <!--affichage du bouton de changement de tri des tweets-->     
    <div style="
        display : flex;
        justify-content : space-around;
        max-width : 250px;
        text-align : center;
        margin-left : 40%
        ">
        <form action="index.php" method="POST">
            <input type="hidden" name="tweets_order" value="tweets_order">
            <select name="order" id="tweets_order">
                <option value="ASC">Les plus récents</option>
                <option value="DESC">Les plus anciens</option>
            </select>
            <button type="submit" style="
            background-color: rgb(29, 161, 242);
            height: 45px;
            width: 135px;
            border-radius: 25px;
            border: none;
            margin-top: 25px;
            ">Appliquer</button>
        </form>
    </div>

    <?php // Affichage des tweets dans une div en fonction de l'ordre de tri
    echo '<div id="tweets" style="
            display : flex;
            flex-direction : column;
            align-items : center;
            margin-top : 50px;
        ">';
        
        if($_SERVER['REQUEST_METHOD'] == 'POST') { //Changement dans la récupération des tweets rapport à la date de publication
            $order = $_POST['order'];
            if ($order == 'DESC') {
                $requete = $database->prepare('SELECT * FROM tweets ORDER BY createdAt DESC');
                $requete->execute();
                $tweets = $requete->fetchAll(PDO::FETCH_ASSOC);
            }
        }
        foreach ($tweets as $tweet) : //Affichage des tweets?>
            <p style="
                font-size : 20px;
                border : solid  rgb(20, 23, 26);
                border-radius : 15px;
                width : 750px;
                max-width : 750px;
                min-height : 50px;
                text-align : center;
                display : flex;
                flex-direction : column;
                padding : 10px;
                "><?php echo $tweet['contenu']; ?></p>
            <?php 
        endforeach; 
        echo '</div>';
        ?>
</body>
</html>