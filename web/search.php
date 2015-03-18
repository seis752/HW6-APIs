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
            <p>This search uses full-page refresh.</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <form method="get" action="search-results.php">
                <div class="form-row">
                    <label>Name</label><br/>
                    <input type="text" name="name" id="name" value="" />
                </div>
                <div class="form-row">
                    <button type="submit" value="search" class="btn btn-primary">Search</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php require_once('includes/document-end.php'); ?>
<?php $db->close(); ?>
