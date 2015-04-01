<?php

require_once('application/bootstrap.php');

$db = new Database();
$userService = new UserService($db);

$title = 'Friends';

session_start();

AuthenticationService::check();

$currentUser = $userService->fetchCurrentUser();

// Handle "remove friend" action.
if ($_SERVER['REQUEST_METHOD'] == 'GET')
{
    if (isset($_GET['fid']))
    {
        $userService->removeFriend($currentUser->getId(), $_GET['fid']);
    }
}

$friends = $userService->findFriends($currentUser->getId());

?>
<?php require_once('includes/document-start.php'); ?>
<?php require_once('includes/navigation.php'); ?>

<div class="container content-container">

    <div class="row" style="padding: 0 0 20px 0;">
        <div class="col-md-6">
            <h1 class="page-h1"><?php echo $currentUser->getName(); ?> : Friends</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <table class="table">
                <thead>
                <tr>
                    <th>Name</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($friends as $user) : ?>
                    <tr>
                        <td>
                            <a href="profile.php?uid=<?php echo $user->getId(); ?>"><?php echo $user->getName(); ?></a>
                        </td>
                        <td>
                            <a href="friends.php?fid=<?php echo $user->getId(); ?>">Remove</a>
                        </td>
                    </tr>
                <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php require_once('includes/document-end.php'); ?>
<?php $db->close(); ?>
