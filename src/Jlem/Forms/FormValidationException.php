<?php namespace Jlem\Forms;

class FormValidationException extends \Exception
{
    protected $errors;

    public function __construct($message, $errors)
    {
        $this->errors = $errors;

        parent::__construct($message);
    }

    public function getErrors()
    {
        return $this->errors;
    }
}
