<?php
    session_start();

    $hostname_db = "localhost";
    $database_db = "seis752justin_db";
    $username_db = "root";
    $password_db = "";

    $con = mysql_connect($hostname_db, $username_db, $password_db);
    if (!$con) {
        die('Could not connect: ' . mysql_error());
    }
    mysql_select_db($database_db, $con);
?>
