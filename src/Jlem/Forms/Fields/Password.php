<?php namespace Jlem\Forms\Fields;

use Jlem\Forms\Fields\TextField;

class Password extends TextField
{
    public function __construct()
    {
        parent::__construct('password', 'Password');
    }

    public function getHTML()
    {
    	return \Form::bootPassword($this);
    }
}
