<?php namespace Jlem\Forms\Fields;

use Jlem\Forms\Fields\TextField;

class Phone extends TextField
{
    public function __construct($value = null)
    {
        parent::__construct('phone', 'Phone', $value);
    }
}
