<?php namespace Jlem\Forms\Fields;

use Jlem\Forms\Field;

class Checkbox extends Field
{
	public $checked;
	
	public function __construct($name, $label)
    {
        $this->name = $name;
        $this->label = $label;
        $this->checked = false;
    }

    public function bindValue($value)
    {
        $this->checked = $value;
    }

    public function getHTML()
    {
        return \Form::bootBox($this);
    }
}
