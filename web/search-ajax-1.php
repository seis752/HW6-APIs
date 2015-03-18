<?php

require_once('application/bootstrap.php');

$db = new Database();
$userService = new UserService($db);

$title = 'Search';

session_start();

AuthenticationService::check();

?>
<?php require_once('includes/document-start.php'); ?>
<?php require_once('includes/navigation.php'); ?>

<div class="container content-container">

    <div class="row" style="padding: 0 0 20px 0;">
        <div class="col-md-6">
            <h1 class="page-h1">Search</h1>
            <p>This search uses Ajax, using an XMLHttpRequest object directly.</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <form method="" action="">
                <div class="form-row">
                    <label>Name</label><br/>
                    <input type="text" name="name" id="name" value="" />
                </div>
                <div class="form-row">
                    <button id="search-button" type="button" class="btn btn-primary">Search</button>
                </div>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6" style="padding-top: 10px;">
            <div id="search-results" style="display: none;">
                <h2>Results</h2>
                <div id="search-results-list-container"></div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="js/search-ajax-1.js"></script>
<?php require_once('includes/document-end.php'); ?>
<?php $db->close(); ?>
