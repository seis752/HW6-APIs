<?php 
include_once("config.php");
?>
<!DOCTYPE html>
<html>
<head>
<title>QHwebstation</title>
	
	<link rel="shortcut icon" href="faviorico_qh.ico" type="image/x-icon">
	<link rel="icon" href="faviorico_qh.ico" type="image/x-icon">
	<link href="css/bootstrap.css" rel='stylesheet' type="text/css" />
	<link href="css/style.css" rel='stylesheet' type="text/css" />
</head>

<body>
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '1616715308558136',
      xfbml      : true,
      version    : 'v2.2'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>

<script>
  // This is called with the results from from FB.getLoginStatus().
  function statusChangeCallback(response) {
    console.log('statusChangeCallback');
    console.log(response);
    // The response object is returned with a status field that lets the
    // app know the current login status of the person.
    // Full docs on the response object can be found in the documentation
    // for FB.getLoginStatus().
    if (response.status === 'connected') {
      // Logged into your app and Facebook.
      testAPI();
    } else if (response.status === 'not_authorized') {
      // The person is logged into Facebook, but not your app.
      document.getElementById('status').innerHTML = 'Please log ' +
        'into this app.';
    } else {
      // The person is not logged into Facebook, so we're not sure if
      // they are logged into this app or not.
      document.getElementById('status').innerHTML = 'Please log ' +
        'into Facebook.';
    }
  }

  // This function is called when someone finishes with the Login
  // Button.  See the onlogin handler attached to it in the sample
  // code below.
  function checkLoginState() {
    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });
  }

  window.fbAsyncInit = function() {
  FB.init({
    appId      : '1616715308558136',
    cookie     : true,  // enable cookies to allow the server to access 
                        // the session
    xfbml      : true,  // parse social plugins on this page
    version    : 'v2.2' // use version 2.2
  });

  // Now that we've initialized the JavaScript SDK, we call 
  // FB.getLoginStatus().  This function gets the state of the
  // person visiting this page and can return one of three states to
  // the callback you provide.  They can be:
  //
  // 1. Logged into your app ('connected')
  // 2. Logged into Facebook, but not your app ('not_authorized')
  // 3. Not logged into Facebook and can't tell if they are logged into
  //    your app or not.
  //
  // These three cases are handled in the callback function.

  FB.getLoginStatus(function(response) {
    statusChangeCallback(response);
  });

  };

  // Load the SDK asynchronously
  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));

  // Here we run a very simple test of the Graph API after login is
  // successful.  See statusChangeCallback() for when this call is made.
  function testAPI() {
    console.log('Welcome!  Fetching your information.... ');
    FB.api('/me', function(response) {
      console.log('Successful login for: ' + response.name);
      document.getElementById('status').innerHTML =
        'Thanks for logging in, ' + response.name + '!';
    });
  }
</script>

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
						    	<li><a style= "font-size:28px" href="index.php">Login</a></li>
						    	<li><a style= "font-size:28px" href="twiliomsg.php">Twilio Message</a></li>
						    	<li class="current"><a style= "font-size:28px" href="loginaccount.php">Facebook Login</a></li>

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
		<div class="space"></div>
		<div class="fb-login-button" data-max-rows="1" data-size="xlarge" data-show-faces="false data-auto-logout-link="false"></div>
		<div id="status">
		</div>
		<div class="fb-like" data-share="true" data-width="450" data-show-faces="true">
		</div>
		
	</div>
</div>
</body>
</html>
