<?php
require_once("functions.php");
include_once('settings.php')
?>
<!doctype html>
<html lang="en">
<head>
    <title>Messages</title>
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="20">
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
    <div class="right"><a href="logout.php" style="color: #2c31e8;">Logout</a></div>
    <div class='right'> <?php print $_SESSION['user']; ?></div></br></br>

    <div id='cssmenu'>
        <ul>
            <li><a href='index.php'>Profile</a></li>
            <li><a href='#'>Friends</a></li>
            <li class='active has-sub'><a href='messages.php'>Messages</a></li>
            <li><a href='search.php'>Search</a>
                <ul>
                    <li class='has-sub'><a href='#'>JS Search</a></li>
                    <li class='has-sub'><a href='#'>jQuery Search</a></li>
                </ul>
            </li>
        </ul>
    </div>

    <h1>Messages</h1>

    <div class="CSSTable" >
        <table >
            <tr><td>Date & Time</td><td>Twilio Message</td></tr>
            <?php
            $sql = "SELECT * FROM twilio order by ts desc limit 50";

            print "";
            if ($result=mysql_query($sql))
            {
                // Fetch one and one row
                while ($row=mysql_fetch_array($result))
                {
                    printf("<tr><td>%s</td><td>%s</td></tr>",$row[0],$row[1]);
                }
                // Free result set
                mysql_free_result($result);
            }
            mysql_close($con);
            ?>
        </table>

    </div>


</div>
</body>
</html>