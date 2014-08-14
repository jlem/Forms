<?php namespace Jlem\Forms\Fields;

use Jlem\Forms\Fields\TextField;

class Address2 extends TextField
{
    public function __construct($value = null)
    {
        parent::__construct('address2', 'Address 2', $value);
    }
}
