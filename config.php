<?php
  session_start();

	$hostname_db = "mysql.dreamer42.com";
	$database_db = "seis752homework_db";
	$username_db = "mwpalmer";
	$password_db = "d1Dreamer";

	$db = mysqli_connect($hostname_db,$username_db,$password_db,$database_db);
	  if (!$db)
	  {
	    die('Could not connect: ' . mysql_error());
	  }
?>