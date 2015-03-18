<?php
    require_once("functions.php");
    include_once("settings.php");

?>
<!doctype html>
<html lang="en">
<head>
    <title>Profile</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />
    <link rel="stylesheet" href="css/style-menu.css" media="screen" type="text/css" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
    <script src="script.js"></script>
</head>
<body>
<div class="main-card">
    <div class="right"><a href="logout.php" >Logout</a></div>
    <div class='right'> <?php print $_SESSION['user']; ?></div></br></br>
<!--    <div class="page">-->
<!--        <a href="index.php">Profile | </a>-->
<!--        <a href="friends.php"> Friends | </a>-->
<!--        <a href="search.php"> Users Search</a>-->
<!--    </div>-->

    <div id='cssmenu'>
        <ul>
            <li class='active has-sub'><a href='index.php'>Profile</a></li>
            <li><a href='#'>Friends</a></li>
            <li><a href='messages.php'>Messages</a></li>
            <li><a href='search.php'>Search</a>
                <ul>
                    <li class='has-sub'><a href='#'>JS Search</a></li>
                    <li class='has-sub'><a href='#'>jQuery Search</a></li>
                </ul>
            </li>
        </ul>
    </div>

    <h1>Profile</h1>
    <div>Hello <?php print $_SESSION['user']; ?> </div>

</div>
</body>
</html>

