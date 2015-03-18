<?php

require_once('application/bootstrap.php');

$db = new Database();
$userService = new UserService($db);
$messageService = new MessageService($db);
$twilioService = new TwilioService($db);

// Check that the request is a valid Twilio request.
if ($twilioService->validateRequest($_POST))
{
  // Find the user sending the SMS.
  $user = $userService->findByPhone($_POST['From']);

  if ($user != null)
  {
    $message = $messageService->sanitizeMessageContent($_POST['Body']);

    $messageService->postMessage($user->getId(), $message, $user->getId());

    // Capture the entire POST array for analysis.
    $twilioService->log($_POST);
  }
  else
  {
    echo 'Cannot find user having phone: ' . $_POST['From'];
  }
}
else
{
  echo 'Request is bad!';
  var_dump($_POST);
}
