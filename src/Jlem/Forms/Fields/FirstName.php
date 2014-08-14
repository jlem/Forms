<?php namespace Jlem\Forms\Fields;

use Jlem\Forms\Fields\TextField;

class FirstName extends TextField
{
    public function __construct($value = null)
    {
        parent::__construct('first_name', 'First Name', $value);
    }
}
