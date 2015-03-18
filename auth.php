<?php
/*  from  http://thinkdiff.net/linkedin/integrate-linkedin-api-in-your-site/   by Mahmud Ahsan 
*/
    session_start();
    ini_set('display_errors', 'on'); error_reporting(-1); 
    
    $config['base_url']        = 'http://myskuleprojects.link/HW4-PHP-site/auth.php';
    $config['callback_url']    = 'http://myskuleprojects.link/HW4-PHP-site/demo.php';
    $config['linkedin_access'] = '78asn8bwfowolt';  // Your_API_KEY
    $config['linkedin_secret'] = '1wLMwL8NFyHNVrt4';  // Your_Secret_Key
 
    include_once "linkedin.php";
 
    # First step is to initialize with your consumer key and secret. We'll use an out-of-band oauth_callback
    $linkedin = new LinkedIn($config['linkedin_access'], $config['linkedin_secret'], $config['callback_url'] );
    //$linkedin->debug = true;
 
    # Now we retrieve a request token. It will be set as $linkedin->request_token
    $linkedin->getRequestToken();
    $_SESSION['requestToken'] = serialize($linkedin->request_token);
 
    # With a request token in hand, we can generate an authorization URL, which we'll direct the user to
  //  echo "Authorization URL: " . $linkedin->generateAuthorizeUrl() . "\n\n";
    header("Location: " . $linkedin->generateAuthorizeUrl());
?>
<!DOCTYPE html>
<head>
	<title>authPage  (LinkedIn authentication)</title>
        <link href="tabA.css" rel="stylesheet" type="text/css"/>
</head>
<body>
    <h3> navigation links </h3>
  <ul class="tabs" data-tab>
    <li class="tab-title active"><a href="index.php">Tab IndexPage</a></li>
    <li class="tab-title"><a href ="auth.php">Tab auth Page</a></li> 
    <li class="tab-title"><a href ="linkedin.php">Tab linkedin Page</a></li> 
    <li class="tab-title"><a href ="demo.php">Tab demo Page</a></li> 
</ul>
</body>