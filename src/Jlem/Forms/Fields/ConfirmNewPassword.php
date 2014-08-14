<?php namespace Jlem\Forms\Fields;

use Jlem\Forms\Fields\TextField;

class ConfirmNewPassword extends TextField
{
    public function __construct()
    {
        parent::__construct('new_password_confirmation', 'Confirm New Password');
    }

    public function getHTML()
    {
    	return \Form::bootPassword($this);
    }
}
