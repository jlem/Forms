<?php namespace Jlem\Forms\Fields;

use Jlem\Forms\Fields\TextField;

class Address3 extends TextField
{
    public function __construct($value = null)
    {
        parent::__construct('address3', 'Address 3', $value);
    }
}
