<?php
error_reporting(E_ALL);
require_once('application/bootstrap.php');

$db = new Database();
$authenticationService = new AuthenticationService($db);
$userService = new UserService($db);

$title = 'Register';

session_start();

if (AuthenticationService::isAuthenticated())
{
    header('Location: profile.php');
}

// Handle "register" action.
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $clean = array();
    $validationResult = new ValidationResult();

    // Check the input data

    // username
    if (!isset($_POST['username']))
    {
        $validationResult->addError('username', 'Username is required');
    }
    else
    {
        $testCount = 2;
        $testsPassedCount = 0;

        if (ctype_alnum($_POST['username']))
        {
            $testsPassedCount++;
        }
        else
        {
            $validationResult->addError('username', 'Username must be alphanumeric');
        }

        if (strlen(trim($_POST['username'])) > 0)
        {
            $testsPassedCount++;
        }
        else
        {
            $validationResult->addError('username', 'Username must be at least 1 character');
        }

        if ($testsPassedCount == $testCount)
        {
            $clean['username'] = $_POST['username'];
        }
    }

    // password
    if (!isset($_POST['password']))
    {
        $validationResult->addError('password', 'Password is required');
    }
    else
    {
        $testCount = 2;
        $testsPassedCount = 0;

        if (ctype_alnum($_POST['password']))
        {
            $testsPassedCount++;
        }
        else
        {
            $validationResult->addError('password', 'Password must be alphanumeric');
        }

        if (strlen(trim($_POST['password'])) >= 4)
        {
            $testsPassedCount++;
        }
        else
        {
            $validationResult->addError('password', 'Password must be at least 4 character');
        }

        if ($testsPassedCount == $testCount)
        {
            $clean['password'] = $_POST['password'];
        }
    }

    // name
    if (!isset($_POST['name']))
    {
        $validationResult->addError('name', 'Name is required');
    }
    else
    {
        $testCount = 2;
        $testsPassedCount = 0;

        if (ctype_alnum($_POST['name']))
        {
            $testsPassedCount++;
        }
        else
        {
            $validationResult->addError('name', 'Name must be alphanumeric');
        }

        if (strlen(trim($_POST['name'])) >= 1)
        {
            $testsPassedCount++;
        }
        else
        {
            $validationResult->addError('name', 'Name is required');
        }

        if ($testsPassedCount == $testCount)
        {
            $clean['name'] = $_POST['name'];
        }
    }

    if (isset($clean['username']) &&
        isset($clean['password']) &&
        isset($clean['name']))
    {
        $validationResult->setIsValid(true);
    }

    if ($validationResult->getIsValid())
    {
        if ($userService->register($clean['username'], $clean['password'], $clean['name']))
        {
            echo 'A';
            var_dump($clean);
            if ($authenticationService->authenticate($clean['username'], $clean['password']))
            {
                echo 'b';
                header('Location: profile.php');
            }
        }
    }
}

?>
<?php require_once('includes/document-start.php'); ?>
<?php require_once('includes/navigation.php'); ?>

<div class="container content-container">
    <div class="row">
        <div class="col-md-6">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1 class="panel-title">Register</h1>
                </div>
                <div class="panel-body">
                    <form action="register.php" method="post">

                        <?php if (isset($validationResult) && !$validationResult->getIsValid()): ?>
                        <div class="alert alert-danger" role="alert">
                            <strong>Fail!</strong> There are some errors in your submission.
                        </div>
                        <?php endif; ?>

                        <div class="form-row">
                            <label for="username">Username</label><br/>
                            <input id="username" name="username" type="text" maxlength="50" />
                            <?php if (isset($validationResult) && $validationResult->hasError('username')): ?>
                                <div class="validation-error-message">
                                    <?php echo $validationResult->getErrorMessage('username'); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="form-row">
                            <label for="password">Password</label><br/>
                            <input id="password" name="password" type="password" maxlength="50" />
                            <?php if (isset($validationResult) && $validationResult->hasError('password')): ?>
                                <div class="validation-error-message">
                                    <?php echo $validationResult->getErrorMessage('password'); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="form-row">
                            <label for="name">Name</label><br/>
                            <input id="name" name="name" type="text" maxlength="50" />
                            <?php if (isset($validationResult) && $validationResult->hasError('name')): ?>
                                <div class="validation-error-message">
                                    <?php echo $validationResult->getErrorMessage('name'); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="form-row">
                            <button type="submit" class="btn btn-primary">Register</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

<?php require_once('includes/document-end.php'); ?>
<?php $db->close(); ?>
