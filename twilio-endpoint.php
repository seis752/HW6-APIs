<?php
include_once('config.php');
print_r($_POST);

$s = array();
foreach ($_POST as $k => $v) {
  $ans .= $k.'='.$v."\n";
}

echo $ans;
$ans = mysql_escape_string($ans);
// This will dump all the parameters in the POST into a table called twiliotest
mysqli_query($db,"INSERT INTO twiliotest (dump) VALUES ('$ans')");

// Check if this is actually a twilio call
if(isset($_POST['Body'])){
    $ans = mysql_real_escape_string($_POST['Body']);
    // clean up values that could bork MySQL
    $ans = str_replace(array('\\', "\0", "\n", "\r", "'", '"', "\x1a"), array('\\\\', '\\0', '\\n', '\\r', "\\'", '\\"', '\\Z'), $_POST['Body']); 
    $sql = "INSERT INTO twilio (memo) VALUES ('$ans')";
    mysqli_query($db,$sql);
}

mysqli_close($db);
 
?> //  john added this