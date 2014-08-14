<?php namespace Jlem\Forms\Fields;

use Jlem\Forms\Fields\TextField;

class NewPassword extends TextField
{
    public function __construct()
    {
        parent::__construct('new_password', 'New Password');
    }

    public function getHTML()
    {
    	return \Form::bootPassword($this);
    }
}
