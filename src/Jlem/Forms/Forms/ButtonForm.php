<?php namespace Jlem\Forms\Forms;

class ButtonForm
{
    public $cta;
    public $url;

    public function __construct($url = null, $cta = 'Submit')
    {
        $this->url = $url;
        $this->cta = $cta;
    }

    public function render()
    {
        return \Form::blank($this);
    }
}
