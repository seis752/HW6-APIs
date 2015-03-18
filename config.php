<?php
//session_start();
if ( !is_writable(session_save_path()) ) {
   echo 'Session save path "'.session_save_path().'" is not writable!'; 
}
ini_set('display_errors', 'on'); error_reporting(-1);
            
$db = new mysqli("mysql.seis752.com","seis752john","ySAw48qrLe","seis752john_db");
if ($db ->connect_errno) echo "Error - Failed to connect to MySQL: " . $db ->connect_error;

?>
