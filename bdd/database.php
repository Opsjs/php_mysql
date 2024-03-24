<?php 
try{
    $database = new PDO('mysql:host=localhost;dbname=Twitter', 'root', ''); //Connexion bdd
} catch(PDOException $e){
    die('Connexion à la base de données impossible.'); // Message renvoyé si erreur
}

$requete = $database->prepare('SELECT * FROM user ORDER BY createdAt DESC');
$requete->execute();
$users = $requete->fetchAll(PDO::FETCH_ASSOC); //récupération données utilisateurs

$requete = $database->prepare('SELECT * FROM tweets ORDER BY createdAt ASC');
$requete->execute();
$tweets = $requete->fetchAll(PDO::FETCH_ASSOC); // Récupération données tweets
?>