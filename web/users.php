<?php

require_once('application/bootstrap.php');

$db = new Database();
$userService = new UserService($db);

$title = 'Users';

session_start();

AuthenticationService::check();

$currentUser = $userService->fetchCurrentUser();

// Handle "add friend" action.
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if (isset($_POST['user_id']))
    {
        $userService->addFriend($currentUser->getId(), $_POST['user_id']);
    }
}

// TODO: Refactor to "loadFriends()", to contain this within UserService?
// Get current user's friends list.
$currentUserFriends = $userService->findFriends($currentUser->getId());
$currentUser->setFriends($currentUserFriends);

$users = $userService->findAll();

?>
<?php require_once('includes/document-start.php'); ?>
<?php require_once('includes/navigation.php'); ?>

<div class="container content-container">

    <div class="row" style="padding: 0 0 20px 0;">
        <div class="col-md-6">
            <h1 class="page-h1">Users</h1>
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
                <?php foreach ($users as $user) : ?>
                    <tr>
                        <td>
                            <a href="profile.php?uid=<?php echo $user->getId(); ?>"><?php echo $user->getName(); ?></a>
                        </td>
                        <td>
                        <?php if ($currentUser->getId() == $user->getId()): ?>
                            <span class="label label-info">You</span>
                        <?php elseif ($userService->checkHasFriend($currentUser->getId(), $user->getId())): ?>
                            <span class="label label-info">Friend</span>
                        <?php else: ?>
                            <form action="users.php" method="post">
                                <input type="hidden" name="user_id" value="<?php echo $user->getId(); ?>" />
                                <button type="submit" class="btn btn-primary">Add</button>
                            </form>
                        <?php endif; ?>
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
