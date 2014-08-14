<?php namespace Jlem\Forms\Fields;

use Jlem\Forms\Fields\TextField;

class Email extends TextField
{
    public function __construct($value = null)
    {
        parent::__construct('email', 'Email', $value);
    }
}
