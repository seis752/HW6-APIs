<?php

require_once('application/bootstrap.php');

session_start();

AuthenticationService::deauthenticate();

header('location: index.php');
