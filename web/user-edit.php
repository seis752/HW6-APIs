<?php

require_once('application/bootstrap.php');

$db = new Database();
$userService = new UserService($db);

$title = 'User Edit';

session_start();

AuthenticationService::check();

$currentUser = $userService->fetchCurrentUser();

// Handle "update user" action.
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = new User();
    $user->setId($currentUser->getId());
    $user->setPhone($_POST['phone']);
    $user->setLat($_POST['lat']);
    $user->setLon($_POST['lon']);

    $userService->save($user);

    $currentUser = $userService->fetchCurrentUser();
}

?>
<?php require_once('includes/document-start.php'); ?>
<?php require_once('includes/navigation.php'); ?>

<div class="container content-container">

    <div class="row" style="padding: 0 0 20px 0;">
        <div class="col-md-6">
            <h1 class="page-h1"><?php echo $currentUser->getName(); ?></h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2 class="panel-title">Update User Record</h2>
                </div>
                <div class="panel-body">
                    <form action="user-edit.php" method="post">
                        <input type="hidden" name="user_id" value="<?php echo $currentUser->getId(); ?>" />

                        <div class="form-row">
                            <label for="username">Username</label><br/>
                            <input id="username" name="username" type="text" value="<?php echo $currentUser->getUsername(); ?>" disabled="disabled" />
                        </div>
                        <div class="form-row">
                            <label for="name">Name</label><br/>
                            <input id="name" name="name" type="text" value="<?php echo $currentUser->getName(); ?>" disabled="disabled" />
                        </div>
                        <div class="form-row">
                            <label for="phone">Phone</label><br/>
                            <input id="phone" name="phone" type="text" value="<?php echo $currentUser->getPhone(); ?>" />
                            <div>Enter phone as 10-digit string with prefixed country code (e.g., "+16125551234")</div>
                        </div>
                        <div class="form-row">
                            <label for="lat">Latitude</label><br/>
                            <input id="lat" name="lat" type="text" maxlength="15" value="<?php echo $currentUser->getLat(); ?>" />
                            <div>...</div>
                        </div>
                        <div class="form-row">
                            <label for="lon">Longitude</label><br/>
                            <input id="lon" name="lon" type="text" maxlength="15" value="<?php echo $currentUser->getLon(); ?>" />
                            <div>...</div>
                        </div>
                        <div class="form-row">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
        <div class="col-md-3">

        </div>
    </div>

</div>

<?php require_once('includes/document-end.php'); ?>
<?php $db->close(); ?>
