<?php namespace Jlem\Forms\Forms;

use Jlem\Forms\Fields\CurrentPassword;
use Jlem\Forms\Fields\NewPassword;
use Jlem\Forms\Fields\ConfirmNewPassword;
use Jlem\Forms\Form;

class ChangePasswordForm extends Form
{
    public function getRules() 
    {
        return [
            'new_password'          => 'required|confirmed',
            'current_password'      => 'required|password_verify'
        ];
    }

    public function getMessages() 
    {
        return [
            'new_password.required'             => 'Please specify a new password',
            'new_password.confirmed'            => 'New passwords do not match',
            'current_password.required'         => 'Please verify your current password',
            'current_password.password_verify'  => 'Could not verify your password'
        ];
    }

    public function addFields()
    {
        $this->addField(new CurrentPassword);
        $this->addField(new NewPassword);
        $this->addField(new ConfirmNewPassword);
    }

    public function extraValidationFails()
    {
        return false;
    }
}
