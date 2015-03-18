<?php ini_set('display_errors', 'on'); error_reporting(-1); 
 ?>
<!DOCTYPE html>
<head>
	<title>IndexPage  (Simple Login Form)</title>
        <link href="tabA.css" rel="stylesheet" type="text/css"/>
</head>
 this form is the index page and it is where users land when 
 they connect to the site. 
 Clicking SUBMIT button takes the user to the Welcome page
 
<body>
    <h3> navigation links </h3>
  <ul class="tabs" data-tab>
    <li class="tab-title active"><a href="#">Tab IndexPage</a></li>
    <li class="tab-title"><a href="welcome.php">Tab WelcomePage</a></li>
    <li class="tab-title"><a href="profilePage.php">Tab ProfilePage</a></li>
    <li class="tab-title"><a href ="auth.php">Tab auth Page</a></li> 
</ul>
<br>   
<h1>SEIS752 Advanced Web Application Development<br />
  Login Form <br/>
  Enter a valid email address for your user ID
</h1>
   some valid loginn examples
1   Lael Tillman    laeltillman      abc123
2   Magee Silva     mageesilva       abc123
3   Carla Carver    carlacarver      abc123
<form action="welcome.php" method="POST">  <!-- identifies target page for SUBMIT -->
    Name: <input type="text" name="name" /><br /> 
    E-mail: <input type="text" name="email" /><br>
    Password: <input type="text" name="password" /><br /> 
    <input type="submit" value="Submit"/> 
</form> 
<br /> <br /> 
<a href="MapRequester.php">Link to maps page  </a>
<br />
<a href="twilio.php">Link to twilio page  </a>
</body>
</html>
