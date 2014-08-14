<?php namespace Jlem\Forms\Fields;

use Jlem\Forms\Fields\Checkbox;

class RememberMeCheckbox extends Checkbox
{
	public $checked;
	
	public function __construct()
    {
        parent::__construct('remember', 'Remember Me');
    }
}
