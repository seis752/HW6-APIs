<?php
session_start();
if ( !is_writable(session_save_path()) ) {
   echo 'Session save path "'.session_save_path().'" is not writable!'; 
}
ini_set('display_errors', 'on'); error_reporting(-1);

echo '$_SESSION[sid] =   '; echo $_SESSION['sid']; echo '<br />' ;
echo '$_SESSION[name] =   '; echo $_SESSION['name'];  echo '<br />' ;
echo 'session_id() =   '; echo session_id();  echo '<br />' ;
?>
<!DOCTYPE html>
<html>
    
</html>