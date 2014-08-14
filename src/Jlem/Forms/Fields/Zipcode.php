<?php namespace Jlem\Forms\Fields;

use Jlem\Forms\Fields\TextField;

class Zipcode extends TextField
{
    public function __construct($value = null)
    {
        parent::__construct('zipcode', 'Zipcode', 5, $value);
    }
}
