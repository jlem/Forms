<?php namespace Jlem\Forms\Fields;

use Jlem\Forms\Field;

class TextField extends Field
{
    public $maxlength;

    public function __construct($name, $label, $maxlength=null, $value = null)
    {
        $this->name = $name;
        $this->label = $label;
        $this->maxlength = $maxlength;
        $this->value = $value;
    }

    public function getHTML()
    {
        return \Form::bootText($this);
    }
}
