<?php namespace Jlem\Forms\Fields;

use Jlem\Forms\Fields\TextField;

class City extends TextField
{
    public function __construct($value = null)
    {
        parent::__construct('city', 'City', $value);
    }
}
