<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    require 'database.php';
    require 'index.template.php';
    ?>

    <div id="form_inscription" style="
        margin-top: 50px;
        display: flex;
        flex-direction : column;
        align-items : center;
        visibility : collapse;
        gap : 25px;
    ">

        <h2> Utilisateur Inconnu : Veuillez créer un compte</h2>
        <form action="add_delete.php" method="POST">
            <input type="hidden" name="form" value="ajoutUser">

            <label for="nom">Nom</label>
            <input type="text" name="nom" id="nom">

            <label for="email">Email</label>
            <input type="text" name="email" id="email">

            <label for="password">Mot de passe</label>
            <input type="password" name="password" id="password">

            <button type="submit">Envoyer</button>

        </form>
    </div>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST' /*&& $_POST['form'] == 'userToCheck'*/) {
        $userToCheck = $_POST['userToCheck'];
        $requete = $database->prepare("SELECT * FROM user WHERE nom = :nom");
        $requete->bindValue(':nom', $userToCheck, PDO::PARAM_STR);
        $requete->execute();
        $resultats = $requete->fetchAll(PDO::FETCH_ASSOC);
        if (count($resultats) > 0) {;
            echo '<div style =" 
            font-size : 25px;
            display : flex;
            flex-direction : column;
            align-items : center;
            padding : 30px;"
            >Nom : ' . $resultats[0]['nom'] . '</div>';

            echo '<div style =" 
            font-size : 25px;
            display : flex;
            flex-direction : column;
            align-items : center;
            padding : 30px;"
            >Email : ' . $resultats[0]['email'] . '</div>';

            session_start();
            $_SESSION['user_id'] = $resultats[0]['id'];

            $requete = $database->prepare('SELECT tweets.id, tweets.contenu FROM `tweets` INNER JOIN user ON user_id = user.id' );
            $requete->execute();
            $tweets = $requete->fetchAll(PDO::FETCH_ASSOC);
            foreach ($tweets as $tweet){ // Affichage des tweets users
                echo '<div style="
                    display : flex;
                    flex-direction : column;
                    align-items : center;
                    gap : 25px;
                "> <p style = " 
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
                ">' . $tweet['contenu'] . '<br> </p> 
                <form action="delete_tweet.php" method="POST">
                    <input type="hidden" name="form" value="delete_tweet">
                    <input type="hidden" name="suppr" value="' . $tweet['id'] . '">
                    <button type="submit" id="button_delete_tweet" style="
                        justify-content : right;
                        background-color: rgb(242, 29, 29);
                        height: 45px;
                        width: 135px;
                        border-radius: 25px;
                        border: none;
                        float: right;
                        margin-top: 10px;
                        margin-bottom : 10px;
                        font-size : 15px;
                    "> Supprimer</button>
                </form> </div>';
                }

        } else {
            echo '<script>';
            echo 'let form_inscription = document.getElementById("form_inscription");';
            echo 'form_inscription.style.visibility = "visible";';
            echo '</script>';
        }
    }

    





    ?>
    



</body>
</html>