<?php namespace Jlem\Forms;

abstract class Field
{
    public $name;
    public $label;
    public $value;
    public $error;

    /**
     * Sets errors and renders the field. Error setting needs to happen just before render, due to Laravel's form behavior.
     * 
     * @param  mixed $errors Message bag of error messages
     * @return string         HTML field
     */
    
    public function render($errors)
    {
        $this->setErrors($errors);
        return $this->getHTML();
    }



    /**
     * Binds a value to the field
     * 
     * @param  string $value
     * @return void
     */
    
    public function bindValue($value)
    {
        $this->value = $value;
    }



    /**
     * Checks to see if errors are present for this field
     * @return boolean
     */
    
    public function hasErrors()
    {
        return ($this->error) ? true : false;
    }



    /**
     * Sets multiple errors for this field
     * 
     * @param mixed $errors
     */
    
    protected function setErrors($errors)
    {
        if ($errors->has($this->name)) {
            $this->error = $errors->first($this->name);
        }
    }



    /**
     * Sets a single error for this field
     * 
     * @param string $error
     */
    
    public function setError($error)
    {
        $this->error = $error;
    }



    /**
     * Returns the HTML of the form field, complete with all session input, initial value bindings, and error messages
     * 
     * @return string
     */
    
    abstract public function getHTML();
}
