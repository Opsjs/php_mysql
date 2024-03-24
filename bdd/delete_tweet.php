<?php
require 'database.php';
require 'index.template.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') { //Supprimer Tweet
    $tweetASupprimer = [
        'id' => $_POST['suppr']
    ];
    
    $requete = $database->prepare('DELETE FROM tweets WHERE id = :id');
    $requete->execute($tweetASupprimer);
    echo '<p style="align-items : center; font-size : 25px; margin : 50px;">Tweet supprimé avec succès !</p>';
}
?>