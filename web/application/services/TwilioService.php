<?php

class TwilioService {

  protected $db;

  public function __construct(Database $db)
  {
    $this->db = $db;
  }

  // TODO: Implement checks for all expected Twilio request parameters!
  public function validateRequest($request)
  {
    $isValid = false;

    if (isset($request['Body']))
    {
      $isValid = true;
    }

    return $isValid;
  }

  public function log($request)
  {
    $parameters = '';

    foreach ($request as $key => $value) {
      $parameters .= $key . '=' . $value . "\n";
    }

    $query = sprintf("INSERT INTO `twiliotest` (`ts`, `dump`) VALUES (now(), '%s');", $parameters);

    $result = $this->db->query($query);

    // TODO: Add logic to verify success of the database operations.
    return true;
  }

    public function createResponse($message)
    {
        $response = '<?xml version="1.0" encoding="UTF-8"?><Response><Message>' . $message . '</Message></Response>';
        return $response;
    }

}
