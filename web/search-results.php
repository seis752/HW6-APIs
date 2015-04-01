<?php

require_once('application/bootstrap.php');

$db = new Database();
$userService = new UserService($db);

$title = 'Search';

session_start();

AuthenticationService::check();

$currentUser = $userService->fetchCurrentUser();

$users = $userService->search($_GET['name']);

?>
<?php require_once('includes/document-start.php'); ?>
<?php require_once('includes/navigation.php'); ?>

<div class="container content-container">

    <div class="row" style="padding: 0 0 20px 0;">
        <div class="col-md-6">
            <h1 class="page-h1">Search Results</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">

            <ol id="search-results-list">
                <?php foreach ($users as $user): ?>
                    <li><?php echo sprintf("%s - %s", $user->getName(), $user->getUsername()); ?></li>
                <?php endforeach; ?>
            </ol>

        </div>
    </div>
</div>

<?php require_once('includes/document-end.php'); ?>
<?php $db->close(); ?>
