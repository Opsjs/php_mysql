<?php

require 'database.php';
require 'index.template.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['form'] == 'ajoutTweet') { //Ajout de Tweet dans la bdd
    if ($_POST['tweetBox'] != '') {
        session_start(); // On start une session pour récupérer certaines données dans d'autre fichiers php
        $newTweet = [
            'tweet' => $_POST['tweetBox'],
            'user_id' => $_SESSION['user_id']
        ];

        $requete = $database->prepare("INSERT INTO tweets(contenu, user_id) VALUES (:tweet, :user_id)"); // Préparation ajout Tweet dans bdd
        if ($requete->execute($newTweet)) {
            echo '<p style="
            font-size : 20px;
            min-height : 50px;
            text-align : center;
            display : flex;
            flex-direction : column;
            padding : 10px;
            margin-top : 75px;
            ">Tweet Publié !</p>'; // Message confirmation
        }else {
            echo '<p style="
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
            ">Erreur dans la publication du tweet.</p>'; // Message d'erreur
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['form'] == 'ajoutUser') { // Ajout utilisateur
    if ($_POST['nom'] != "" && $_POST['email'] !='') {
        $newUser = [
            'nom' => $_POST['nom'],
            'email' => $_POST['email'],
            'password' => $_POST['password']
        ];

        $requete = $database->prepare("INSERT INTO user(nom, email, password) VALUES (:nom, :email, :password)");
        if ($requete->execute($newUser)) {
            echo '<p style="align-items : center; font-size : 25px; margin : 50px;">Compte créé avec succès !</p>';
        }else {
            echo 'Non.';
        }
    } else {
        echo "Formulaire Incomplet";
    }
}

if($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['form'] == 'delete_user') { //Suppression utilisateur
    $userASupprimer = [
        'id' => $_POST['suppr']
    ];
    
    $requete = $database->prepare('DELETE FROM user WHERE id = :id');
    $requete->execute($userASupprimer);
    echo '<p style="align-items : center; font-size : 25px; margin : 50px;">Compte supprimé avec succès !</p>';
}

