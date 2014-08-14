<?php namespace Jlem\Forms\Fields;

use Jlem\Forms\Bindable;
use Jlem\Forms\Field;

class SelectField extends Field implements Bindable
{
    public $data;

    public function __construct($name, $label, $data = null, $value = null)
    {
        $this->name = $name;
        $this->label = $label;
        $this->data = $data;
        $this->value = $value;
    }

    public function bindData(Array $data)
    {
        $this->data = $data;
    }

    public function getHTML()
    {
        return \Form::bootSelect($this);
    }
}
