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
        <title>PostMessage Page</title>
    </head>   
  <?php
       $yourID = $_POST['yourID'];  echo $yourID ;   echo '<br />' ;
       $friendID = $_POST['friendID'];  echo $friendID ; echo '<br />' ;
       $message = $_POST['message']; echo $message ; echo '<br />' ;
 
        if (!($connection = mysql_connect("mysql.seis752.com","seis752john","ySAw48qrLe")))  {
           die("Error at mysql_connect" . mysql_error()); 
         }
        if (!mysql_select_db("seis752john_db",$connection))  {
            die("Error at select_db" . mysql_errorno() .": " . mysql_error()); }

        $query = "INSERT INTO Messages( senderID, message, receiverID)\n"
                 . "VALUES ( ". $yourID. ",'" . $message . "', '" . $friendID . "');";

        if (!($result = mysql_query($query,$connection))) {
            die("Error at insert_query");  }

        if (!mysql_close($connection))  {
            die("Error " . mysql_errorno() .": " . mysql_error()); }
  ?>  
</html>