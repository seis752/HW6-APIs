<?php session_start();
if ( !is_writable(session_save_path()) ) {
   echo 'Session save path "'.session_save_path().'" is not writable!'; 
}
ini_set('display_errors', 'on'); error_reporting(-1);
//if(!isset($_SESSION['email'])) { header("Location:index.php"); }
$_SESSION['debug'] = 'FALSE'; //    TRUE;      'FALSE';
if ($_SESSION['debug']==='TRUE') {
    echo '$_SESSION[name] =  '; echo $_SESSION['name'];  echo '<br />' ;
    echo 'session_id() =     '; echo session_id();  echo '<br />' ;
    echo 'email =      '; echo  $_SESSION['email'] ;  echo '<br />' ; 
    echo 'password =   '; echo  $_SESSION['password'] ;  echo '<br />' ; 
}
 ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Welcome Page</title>
        this page is where the user lands after logging in
        it has links to the Profile pages and the HW5 search pages
    </head>
    <h3> navigation links </h3>
    <ul class ="nav-tabs" >
        <li class="tab-title active"> <a href ="index.php?">Tab IndexPage  <-- you just came from here</a></li>
        <li class="tab-title"><a href="#">Tab WelcomePage</a></li>   
        <li class="tab-title"><a href ="profilePage.php">Tab ProfilePage</a></li> 
        <!-- <li class="tab-title"><a href="testPage.php">Tab TestPage</a></li>  -->
        <!-- <li class="tab-title"><a href="searchPage.php">Tab SearchPage</a></li>  -->
        <li class="tab-title"><a href="searchAjax.php">Tab SearchAjaxPage (HW5)</a></li>
        <li class="tab-title"><a href="searchJquery.php">Tab SearchJqueryPage (HW5)</a></li>
    </ul>
<body>
    
    <?php
    if(!(isset($_SESSION['email']))){
         $email= $_POST['email'];
         $password= $_POST["password"];
         $name= $_POST['name'];
         if ($_SESSION['debug']==='TRUE') {echo "AAAAAAAAAAAA";}
    }  else {
         $email= $_SESSION['email'];
         $password= $_SESSION["password"];
         $name= $_SESSION['name'];
         if ($_SESSION['debug']==='TRUE') {echo "BBBBBBBBBBBBBBBBB";}
    }
         if (!($connection = mysql_connect("mysql.seis752.com","seis752john","ySAw48qrLe")))  {
           die("Error at mysql_connect" . mysql_error()); 
         }
        if (!mysql_select_db("seis752john_db",$connection))  {
            die("Error at select_db" . mysql_errorno() .": " . mysql_error()); }

        $query = "SELECT `password` FROM `users` WHERE `username` = '".$email."' LIMIT 0, 10 ";
        if (!($result = mysql_query($query,$connection))) {
            die("Error at mysql_query");  }
        print("<TABLE BORDER>\n");
        printf("<TR><TD>Passwords</TD></TR>\n");
        while ($row = mysql_fetch_array($result)) {
            printf ("<TR><TD>%s</TD></TR>\n", $row[0]);
            $savedPassword = $row[0];
        }
            printf("</TABLE>\n");

        if (!mysql_close($connection))  {
            die("Error " . mysql_errorno() .": " . mysql_error()); }

         if( $password===$savedPassword) { //&& ($email ==='sam@gmail.com') ){   // WILL NEED MORE LOGIC + SQL LATER
             echo "password is CORRECT     " ; echo '<br />' ; 
             echo 'Welcome   '; echo '<br />' ;
             echo  SID;   echo '<br />' ;
             $_SESSION['email']   = $email;
             $_SESSION['password'] = $password; 
             $_SESSION['name']   = $name;

             echo '<br />use the this link to see you rprofile, messages, etc';
             echo '<br /><a href="profilePage.php?">PROFILE_PAGE</a><br />' ;
        } else {
             echo "password is WRONG";  
        } 
        echo '<br />'; echo "WELCOME "; echo $email;   ?>
      <br />
      Your user ID is:  <?php echo $_SESSION['email']  ?>;
      Your name is:     <?php echo $_SESSION['name'] ?>;
      Your password is: <?php echo $_SESSION['password'];  ?> <br>
      
      SESSION name is:  <?php echo $_SESSION['name'] ?>;
      SESSION(ID) is    <?php echo session_id() ?>;
     <br>

     <h4><br />  Search by Name  <br/></h4>
     this search will POST to a php page; no AJAX or jQuery is used  <br/>
     <h5> Enter a name like: Lael Tillman or Tillman</h5>

<form action="searchPage.php" method="POST">  <!-- identifies target page for SUBMIT -->
    searchName: <input type="text" name="searchName"/><br /> 
    <input type="submit" value="Search"/> 
</form> 
</body>
</html>
