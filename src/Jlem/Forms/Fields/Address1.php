<?php namespace Jlem\Forms\Fields;

use Jlem\Forms\Fields\TextField;

class Address1 extends TextField
{
    public function __construct($value = null)
    {
        parent::__construct('address1', 'Address 1', $value);
    }
}
