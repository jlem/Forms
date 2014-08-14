<?php namespace Jlem\Forms\Validations;

class PasswordVerify
{
	public function validate($attribute, $value, $parameters)
	{
        $currentHash = \Auth::user()->password;
        return \Hash::check($value, $currentHash);
	}
}
