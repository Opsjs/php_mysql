<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <div class="header">
            <img src="https://seeklogo.com/images/T/twitter-icon-logo-1041A58E6A-seeklogo.com.png" alt="" style="margin : 10px;" id="home_icon" onmousehover="this.style.cursor=pointer">
            <script>
                var image = document.getElementById("home_icon");
                image.addEventListener("click", function() { //en cliquant sur l'image
                window.location.href = "index.php"}); //On va à cette destination
            </script>


            <h1>Bienvenue sur Twitter ! </h1>
            
            <img src="https://cdn.icon-icons.com/icons2/3065/PNG/512/profile_user_account_icon_190938.png" alt="" id="account_icon">

            <script>
                var image = document.getElementById("account_icon");
                image.addEventListener("click", function() { //en cliquant sur l'image
                window.location.href = "account_list.php"}); //On va à cette destination
            </script>
        </div>
</header>

<footer>
    <div class="footer">

    </div>
</footer>
</body>
</html>
