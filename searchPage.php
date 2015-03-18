<?php
session_start();
if ( !is_writable(session_save_path()) ) {
   echo 'Session save path "'.session_save_path().'" is not writable!'; 
}
ini_set('display_errors', 'on'); error_reporting(-1);

if ($_SESSION['debug']==='TRUE') {
    echo '$_SESSION[name] =  '; echo $_SESSION['name'];  echo '<br />' ;
    echo 'session_id() =     '; echo session_id();  echo '<br />' ;
    echo 'email =      '; echo  $_SESSION['email'] ;  echo '<br />' ; 
    echo 'password =   '; echo  $_SESSION['password'] ;  echo '<br />' ; 
}
?>
<!DOCTYPE html>
     <head>
        <title>Search Page</title>
    </head> 
    <h3> navigation links </h3>
    <ul class ="nav-tabs" >
        <li class="tab-title active"> <a href ="index.php?">Tab IndexPage</a></li>
        <li class="tab-title"><a href="welcome.php">Tab WelcomePage <-- you just came from here</a></li>   
        <li class="tab-title"><a href ="profilePage.php">Tab ProfilePage</a></li> 
        <!-- <li class="tab-title"><a href="testPage.php">Tab TestPage</a></li>  --> 
    </ul>
    <br/>
    <h2>   results of search (with out AJAX or jQuery) </h2><br/>
  <?php
       $searchName = $_POST['searchName'];  echo $searchName ; echo '<br />' ;
       
        if (!($connection = mysql_connect("mysql.seis752.com","seis752john","ySAw48qrLe")))  {
           die("Error at mysql_connect" . mysql_error()); 
         }
        if (!mysql_select_db("seis752john_db",$connection))  {
            die("Error at select_db" . mysql_errorno() .": " . mysql_error()); }

        $query = "SELECT `id`, `name` FROM `users` WHERE `name` LIKE '%" . $searchName . "%' LIMIT 0, 30 ";
        //$query = "SELECT `id`, `name` FROM `users` WHERE `name` LIKE 'Tillman' LIMIT 0, 30 ";
        if (!($result = mysql_query($query,$connection))) {
            die("Error at insert_query");  }
 
        print("<TABLE BORDER>\n");
        printf("<TR><TD>ID</TD><TD>userName</TD></TR>\n");
        while ($row = mysql_fetch_array($result)) {
        printf ("<TR><TD>%s</TD><TD>%s</TD></TR>\n", $row[0], $row[1]);
    }
    printf("</TABLE>\n");
    mysql_free_result($result);
        if (!mysql_close($connection))  {
            die("Error " . mysql_errorno() .": " . mysql_error()); }
  ?>  
</html>