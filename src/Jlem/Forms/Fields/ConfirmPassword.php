<?php namespace Jlem\Forms\Fields;

use Jlem\Forms\Fields\TextField;

class ConfirmPassword extends TextField
{
    public function __construct()
    {
        parent::__construct('password_confirmation', 'Confirm Password');
    }

    public function getHTML()
    {
    	return \Form::bootPassword($this);
    }
}
