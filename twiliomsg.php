<?php 
include_once("config.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="refresh" content="5">
<title>Login</title>
	
	<link rel="shortcut icon" href="faviorico_qh.ico" type="image/x-icon">
	<link rel="icon" href="faviorico_qh.ico" type="image/x-icon">
	<link href="css/bootstrap.css" rel='stylesheet' type="text/css" />
	<link href="css/style.css" rel='stylesheet' type="text/css" />
</head>

<body>

	<div class="header">
		<div class="container">
			<div class="row">
			  <div class="col-md-12">
				 <div class="header-left">
					 <div class="logo">
						<a href="index.html"><img src="../img/logo.png" alt=""/></a>
					 </div>
					 <div class="menu">
						    <ul class="nav" id="nav">
						    	<li class="current"><a style= "font-size:28px" href="index.php">Login</a></li>
						    	<li><a style= "font-size:28px" href="twiliomsg.php">Twilio Message</a></li>
						    	<li><a style= "font-size:28px" href="loginaccount.php">Back to account</a></li>

							<div class="clear"></div>
							</ul>
				    </div>							
	    		    <div class="clear"></div>
	    	     </div>
				</div>
			</div>
	    </div>
	</div>
<div class="main">
	<div class="container">
		<h3 style="color: gray">Send message to 385-236-0928</h3> 
		<h4 style="color: green">This page will refresh in every 5s</h4> 
		<h3 style="color: gray">The messages will display here:</h3>
			<table id="table">
			<?php
			$sql = "SELECT * FROM twilio order by ts desc limit 50";
			print "";
			if ($result=mysqli_query($db,$sql))
			  {
			  // Fetch one and one row
			  while ($row=mysqli_fetch_row($result))
			  {
				printf("<tr><td>%s</td><td><pre>%s</pre></td></tr>",$row[0],$row[1]);
			  }
			  // Free result set
			  mysqli_free_result($result);
			}
			mysqli_close($db);
			?>
			</table>
	</div>
</div>
</body>
</html>
