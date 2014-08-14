<?php namespace Jlem\Forms\Fields;

use Jlem\Forms\Fields\TextField;

class CurrentPassword extends TextField
{
    public function __construct()
    {
        parent::__construct('current_password', 'Current Password');
    }

    public function getHTML()
    {
    	return \Form::bootPassword($this);
    }
}
