<?php
    require_once("functions.php");
    include_once('settings.php')
?>
<!doctype html>
<html lang="en">
<head>
    <title>Search Page</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />
    <link rel="stylesheet" href="css/style-menu.css" media="screen" type="text/css" />
    <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
    <script src="script.js"></script>

    <script type="text/javascript">
        function handrolled(){
            var nameSearchJsVariableNameOfPower=document.getElementById('nameSearch').value;
            //alert(nameSearchJsVariableNameOfPower);

            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function(){
                if (xhr.readyState == 4){
                    //alert(xhr.responseText);
                    document.getElementById("resultshere").innerHTML = xhr.responseText;
                }
            }
            xhr.open('GET','searchresults.php?nameSearch='+ nameSearchJsVariableNameOfPower, true);
            xhr.send(null);
        }
    </script>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script>
        function getData(str){
            $.ajax({
                type:'post',
                url:'newsearchresults.php',
                data:{"sending":str},
                success: function(data){
                    document.getElementById("jresults").innerHTML = data;
                }
            });
        }
    </script>
</head>
<body>

<div class="main-card">
    <div class="right"><a href="logout.php" style="color: #2c31e8;">Logout</a></div>
    <div class='right'> <?php print $_SESSION['user']; ?></div></br></br>

    <div id='cssmenu'>
        <ul>
            <li><a href='index.php'>Profile</a></li>
            <li><a href='#'>Friends</a></li>
            <li><a href='messages.php'>Messages</a></li>
            <li class='active has-sub'><a href='search.php'>Search</a>
                <ul>
                    <li class='has-sub'><a href='#'>JS Search</a></li>
                    <li class='has-sub'><a href='#'>jQuery Search</a></li>
                </ul>
            </li>
        </ul>
    </div>


    <h1>JS Search</h1>
    <div>
        <form id="form1" name="form1" method="get" action="searchresults.php">
            <label>
                <input type="text" name="nameSearch" id="nameSearch" placeholder="user name" onkeyup="handrolled();" />
            </label>
                <input type="button" value="search" class="login login-submit" onclick="handrolled();"/>
        </form>
    </div>
    <div id="resultshere"></div>

    <h1>jQuery Search</h1>
    <input type="text" id="textfield" placeholder="user name" onkeyup="getData(this.value)">
    <input type="button" value="search" class="login login-submit" onclick=""getData(document.getElementById('textfield').value);"/>
    <div id="jresults"></div>

</div>
</body>
</html>