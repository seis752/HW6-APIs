<?php

require_once('application/bootstrap.php');

$db = new Database();
$userService = new UserService($db);
$messageService = new MessageService($db);

$title = 'Profile';

session_start();

AuthenticationService::check();

$currentUser = $userService->fetchCurrentUser();

$user = $currentUser;

// Handle "post message" action.
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $messageService->postMessage($_POST['user_id'], $_POST['message'], $currentUser->getId());

    $selectedUser = $userService->findById($_POST['user_id']);

    if ($selectedUser != null)
    {
        $user = $selectedUser;
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'GET')
{
    if (isset($_GET['uid']))
    {
        $selectedUser = $userService->findById($_GET['uid']);

        if ($selectedUser != null)
        {
            $user = $selectedUser;
        }
    }
}

$friends = $userService->findFriends($user->getId());

$messages = $messageService->findMessages($user->getId());

?>
<?php require_once('includes/document-start.php'); ?>
<?php require_once('includes/navigation.php'); ?>

<div class="container content-container">

    <div class="row" style="padding: 0 0 20px 0;">
        <div class="col-md-6">
            <h1 class="page-h1"><?php echo $user->getName(); ?> : Profile</h1>
            <?php if ($user->getId() == $currentUser->getId()): ?>
                <span class="label label-info">You</span>
            <?php elseif ($userService->checkHasFriend($user->getId(), $currentUser->getId())): ?>
                <span class="label label-info">Friend</span>
            <?php endif; ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2 class="panel-title">Post a Message</h2>
                </div>
                <div class="panel-body">
                    <form action="profile.php" method="post">
                        <div class="form-row">
                            <input type="hidden" name="user_id" value="<?php echo $user->getId(); ?>" />
                            <textarea id="message" name="message" style="width: 100%; height: 100px;"></textarea>
                        </div>
                        <div class="form-row">
                            <button type="submit" class="btn btn-primary">Post</button>
                        </div>
                    </form>

                    <?php if ($user->getId() == $currentUser->getId()): ?>

                        <?php if ($currentUser->getPhone() == null || $currentUser->getPhone() == ''): ?>
                            <div style="padding-top: 20px;">
                                <p>Add your mobile phone number to post messages from your phone. <a href="user-edit.php">Update Profile</a></p>
                            </div>
                        <?php endif; ?>

                        <?php if (strlen($currentUser->getPhone()) > 0): ?>
                            <div style="padding-top: 20px;">
                                <p>You can also post to your stream from your mobile phone! Text to <strong>(763) 951-1314</strong>.</p>
                            </div>
                        <?php endif; ?>

                    <?php endif; ?>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2 class="panel-title">Messages</h2>
                </div>
                <div class="panel-body">
                    <?php foreach ($messages as $message) : ?>
                        <div class="message">
                            <div><?php echo $message->getContent(); ?></div>
                            <div class="message-signature">
                                <a href="profile.php?uid=<?php echo $message->getPosterId(); ?>"><?php echo $message->getPosterName(); ?></a>
                                <span>|</span>
                                <span><?php echo $message->getDisplayCreatedWhen(); ?></span>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>

        </div>
        <div class="col-md-3">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2 class="panel-title">Friends</h2>

                    <?php if ($user->getId() == $currentUser->getId()): ?>
                    <span><a href="friends.php">Manage Your Friends List</a></span>
                    <?php endif; ?>
                </div>
                <div class="panel-body">
                    <?php foreach ($friends as $friend) : ?>
                        <div>
                            <a href="profile.php?uid=<?php echo $friend->getId(); ?>"><?php echo $friend->getName(); ?></a>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>

            <?php if ($user->getId() == $currentUser->getId()): ?>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2 class="panel-title">Profile Status</h2>
                    </div>
                    <div class="panel-body">

                        <?php if ($userService->hasCompleteProfile($currentUser)): ?>
                            <p>Your profile is <strong>complete</strong>!</p>
                        <?php endif; ?>

                        <?php if (!$userService->hasCompleteProfile($currentUser)): ?>
                            <p>Your profile is <strong>incomplete</strong>!</p>
                            <?php if ($currentUser->getPhone() == null || $currentUser->getPhone() == ''): ?>
                            <p>Add your mobile phone number and you can text messages to your stream!</p>
                            <?php endif; ?>
                        <?php endif; ?>

                        <a class="btn btn-primary" href="user-edit.php">Update Profile</a>
                    </div>
                </div>
            <?php endif; ?>

            <div class="panel panel-default panel-weather" data-lat="<?php echo $user->getLat(); ?>" data-lon="<?php echo $user->getLon(); ?>">
                <div class="panel-heading">
                    <h2 class="panel-title">Weather</h2>
                </div>
                <div class="panel-body">
                    <div class="loading">Loading...</div>
                    <div class="unavailable" style="display: none;">Weather information is unavailable.</div>
                    <div class="weather" style="display: none;">
                        <div class="name"></div>
                        <div class="condition">
                            <img src="http://openweathermap.org/img/w/10d.png" alt="" />
                        </div>
                        <div class="temperature"><span class="weather-label">Temp:</span> <span class="value"></span>&deg;F</div>
                        <div class="humidity"><span class="weather-label">Humidity:</span> <span class="value"></span>%</div>
                    </div>
                    <div class="credit">Weather data provided by <a href="http://openweathermap.org/">OpenWeatherMap</a>.</div>
                </div>
            </div>

        </div>
    </div>

</div>

<?php require_once('includes/document-end.php'); ?>
<?php $db->close(); ?>
