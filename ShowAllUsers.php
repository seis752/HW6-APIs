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
        <title>ShowAllUsers Page</title>
    </head>    
    <br>  <a href ="profilePage.php">GoTO_ProfilePage</a> <br>  
<?php
  if (!($connection = mysql_connect("mysql.seis752.com","seis752john","ySAw48qrLe")))  {
     die("Error at mysql_connect" . mysql_error()); 
   }
  if (!mysql_select_db("seis752john_db",$connection))  {
      die("Error at select_db" . mysql_errorno() .": " . mysql_error()); }

  $query = "SELECT ID, username FROM users LIMIT 0, 30 ";

  if (!($result = mysql_query($query,$connection))) {
     die("Error at SelectAllUsers_query");  }

    print("<TABLE BORDER>\n");
    printf("<TR><TD>ID</TD><TD>UserNames</TD></TR>\n");
    while ($row = mysql_fetch_array($result)) {
        printf ("<TR><TD>%s</TD><TD>%s</TD></TR>\n", $row[0], $row[1]);
    }
    printf("</TABLE>\n");
    mysql_free_result($result);
    ?> <br>   <br>   ENTER YourID, FriendID click SUBMIT to make a new friend 
    <form action="postNewFriend.php" method="POST">  
       yourID:  <input type="text" name="yourID"/><br /> 
       friendID: <input type="text" name="friendID"/><br /> 
    <input type="submit" value="Submit"/> 
    </form> 
   <br>   <br>    <?php
  $query = "SELECT * FROM Messages ORDER BY timeStamp DESC LIMIT 0, 30 "; 
    if (!($result = mysql_query($query,$connection))) {
     die("Error at SelectAllUsers_query");  }

    print("<TABLE BORDER>\n");
    printf("<TR><TD>ID</TD><TD>senderID</TD><TD>message</TD><TD>timeStamp</TD><TD>receiverID</TD></TR>\n");
    while ($row = mysql_fetch_array($result)) {
        printf ("<TR><TD>%s</TD><TD>%s</TD><TD>%s</TD><TD>%s</TD><TD>%s</TD></TR>\n", $row[0], $row[1], $row[2], $row[3], $row[4]);
    }
    printf("</TABLE>\n");
    mysql_free_result($result);
    
  if (!mysql_close($connection))  {
      die("Error " . mysql_errorno() .": " . mysql_error()); }
?>  
      <br>  <a href ="profilePage.php">GoTO_ProfilePage</a> <br>  
</html>
