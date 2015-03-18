<?php

class ValidationResult
{
    protected $isValid;
    protected $errors = array();

    public function __construct()
    {
        $this->isValid = false;
    }

    public function getIsValid()
    {
        return $this->isValid;
    }

    public function setIsValid($value)
    {
        $this->isValid = $value;
    }

    public function getErrors()
    {
        return $this->errors;
    }

    public function addError($key, $value)
    {
        $this->errors[$key] = $value;
    }

    public function hasError($target)
    {
        foreach ($this->errors as $key => $value)
        {
            if ($key == $target)
            {
                return true;
            }
        }

        return false;
    }

    public function getErrorMessage($target)
    {
        foreach ($this->errors as $key => $value)
        {
            if ($key == $target)
            {
                return $value;
            }
        }

        return null;
    }
}
