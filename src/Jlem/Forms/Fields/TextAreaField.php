<?php namespace Jlem\Forms\Fields;

use Jlem\Forms\Field;

class TextAreaField extends Field
{
    public function __construct($name, $label, $value = null)
    {
        $this->name = $name;
        $this->label = $label;
        $this->value = $value;
    }

    public function getHTML()
    {
        return \Form::bootTextArea($this);
    }
}
