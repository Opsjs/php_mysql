<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        require 'database.php';
        require 'index.template.php';
    ?>

<?php
    //affichage + suppr users
    foreach($users as $user) : ?>
        <div class="liste_users">
            <form action="add_delete.php" method = "POST" >
                <input type="hidden" name="form" value="delete_user">
                <input type="hidden" name="suppr" value="<?php echo $user['id']; ?>">

                <?php echo '<div style = "
                color : black;
                font-size : 25px;
                "><li>' . $user['nom'] . ' <br> ' . $user['email'] . '</li></div>'; ?>

                <button type="submit" style="
                        justify-content : center;
                        background-color: rgb(242, 29, 29);
                        height: 45px;
                        width: 135px;
                        border-radius: 25px;
                        border: none;
                        margin-top: 10px;
                        margin-bottom : 10px;
                        font-size : 15px;
                ">Supprimer</button>
            </form>
        </div>
    <?php endforeach; ?>
    
    <!--Form check User-->
    <div id="check_user" style="
        margin-top: 150px;
        display: flex;
        justify-content : space-evenly;
    ">
        <form action="account.php" method="POST">
            <input type="hidden" name="userToCheck" value="userToCheck">
            <label for="userToCheck">Entrez votre Nom d'utilisateur : </label>
            <input type="text" name="userToCheck" value="">
            <button type="submit">Entrer</button>
        </form>
    </div>
    
    
    
    
    
    <!--Form ajout utilisateur-->


    
</body>
</html>