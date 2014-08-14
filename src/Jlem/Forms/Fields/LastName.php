<?php namespace Jlem\Forms\Fields;

use Jlem\Forms\Fields\TextField;

class LastName extends TextField
{
    public function __construct($value = null)
    {
        parent::__construct('last_name', 'Last Name', $value);
    }
}

