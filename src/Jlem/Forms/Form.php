<?php namespace Jlem\Forms;

use Jlem\Forms\Bindable;

abstract class Form
{
    public $validationErrors;
    public $validator;
    public $cta;
    public $url;
    public $bindings;
    protected $fields;
    protected $errors;

    public function __construct($url = null, $cta = 'Submit')
    {
        $this->url = $url;
        $this->cta = $cta;
        $this->addFields();
    }



    /**
     * Binds a value to a specific field
     * 
     * @param  string $fieldName the name of the field to bind the value to
     * @param  string $value     the value to be bound to the field
     * @return void
     */
    
    public function bindValue($fieldName, $value)
    {
        if ($this->fieldExists($fieldName)) {
            $this->getField($fieldName)->bindValue($value);
        }
    }



    /**
     * Binds multiple models to form, for automatic field value binding based on each model's attributes.
     * 
     * Note that there is not conflict detection. If there are two models with the same attribute name,
     * each successive model defined in the array will override the field value of the previous model.
     * In otherwords, the field takes the value of the last model attribute it encounters
     * 
     * @param  Array  $models array of eloquent models
     * @return void
     */
    
    public function bindModels(Array $models)
    {
        foreach ($models as $model) {
            $this->bindModel($model);
        }
    }



    /**
     * Binds single model to form, for automatic field value binding based on the model's attributes.
     * 
     * Note that there is not conflict detection. If there are two models with the same attribute name,
     * each successive model defined through this method call will override the field value of the previous model.
     * In otherwords, the field takes the value of the last matching model attribute it encounters
     * 
     * @param  mixed  $model single eloquent model
     * @return void
     */
    
    public function bindModel($model)
    {
        if (!$model) {
            return;
        }

        foreach($model->getAttributes() as $fieldName => $value) {
            $this->bindValue($fieldName, $value);
        }
    }



    /**
     * Binds data to be populated by a select field
     * 
     * @param  string $fieldName the name of the field to bind the data to
     * @param  array $data      an array of data to be bound
     * @return void
     */
    
    public function bindData($fieldName, Array $data)
    {
        $field = $this->getField($fieldName);

        if ($field instanceof Bindable) {
            $field->bindData($data);
        }
    }



    /**
     * Checks to see if form has passed basic validation, as well as custom validation rules
     * 
     * @return bool
     */
    
    public function failsValidation()
    {
        $this->validator = \Validator::make(\Input::all(), $this->getRules(), $this->getMessages());

        if ($this->validator->fails() || $this->extraValidationFails()) {
            $this->validationErrors = $this->validator;
            return true;
        }

        return false;
    }



    /**
     * Inverted alias of failsValidation()
     * 
     * @return bool
     */
    
    public function passesValidation()
    {
        return ($this->failsValidation() === false) ? true : false;
    }



    /**
     * Renders the form
     * 
     * @param  mixed $errors Message bag of errors
     * @return string        HTML form
     */
    
    public function render($errors)
    {
        return \Form::post($this, $errors);
    }



    /**
     * Gets all of the defined field for the form
     * 
     * @return array
     */
    
    public function getFields()
    {
        return $this->fields;
    }



    /**
     * Adds a new field to the form
     * 
     * @param Field $Field
     */
    
    public function addField(Field $Field)
    {
        $this->fields[$Field->name] = $Field;
    }



    /**
     * Checks to see if a field of a given name exists
     * 
     * @param  string $fieldName
     * @return bool
     */
    
    public function fieldExists($fieldName)
    {
        return (isset($this->getFields()[$fieldName])) ? true : false;
    }



    /**
     * Gets a field by name
     * 
     * @param  string $fieldName
     * @return mixed            Field|null
     */
    
    public function getField($fieldName)
    {
        if ($this->fieldExists($fieldName))
        {
           return $this->getFields()[$fieldName]; 
        }

        return null;
    }



    /**
     * 
     * Sets a custom error message to be displayed
     * @param string $fieldName    the name of the field to bind the error message to
     * @param string $errorMessage the error message to be bound
     */
    
    public function setError($fieldName, $errorMessage)
    {
        $this->validator->getMessageBag()->add($fieldName, $errorMessage);
    }



    /**
     * Sets a generic error message for when an error is not directly associated with a field
     * 
     * @param string $errorMessage
     * @return  void
     */
    
    public function setGenericError($errorMessage)
    {
        \Session::flash('alert', $errorMessage);
    }


    abstract public function getRules();
    abstract public function getMessages();
    abstract public function addFields();
    abstract public function extraValidationFails();
}
