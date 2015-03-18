<?php
require_once("functions.php");
include_once("settings.php");

    if (isset($_POST['username'])){
        $name= $_POST['username'];
        $password= $_POST['password'];
        $sql= "select * from user where username='$name' and password='$password' limit 1";
        $result=mysql_query($sql);
        while($row = mysql_fetch_array($result))
        {
            $_SESSION['user']=$name;
            header('Location: search.php');
        }
    }
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Login</title>
    <link rel='stylesheet' href='http://codepen.io/assets/libs/fullpage/jquery-ui.css'>
    <link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />
</head>
<body>
<div class="login-card">

<h1>Log-in</h1>
<form action="login.php" method="POST">
    <input type="text" name="username" id="username" placeholder="Username"/></br>
    <input type="password" name="password" id="password" placeholder="Password"/></br>

    <input type="submit" name="submit" value="Submit" class="login login-submit"/>


</form>
</div>
</body>
</html>