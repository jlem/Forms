<?php namespace Jlem\Forms\Fields;

use Jlem\Forms\Fields\TextField;

class State extends TextField
{
    public function __construct($value = null)
    {
        parent::__construct('state_abbreviation', 'State', 2, $value);
    }
}
