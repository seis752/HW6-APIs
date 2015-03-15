<?php

class TwilioService {

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

}
