<?php namespace Jlem\Forms\Forms;

use Jlem\Forms\Fields\FirstName;
use Jlem\Forms\Fields\LastName;
use Jlem\Forms\Fields\Email;
use Jlem\Forms\Fields\Phone;
use Jlem\Forms\Fields\Address1;
use Jlem\Forms\Fields\Address2;
use Jlem\Forms\Fields\Address3;
use Jlem\Forms\Fields\State;
use Jlem\Forms\Fields\City;
use Jlem\Forms\Fields\Zipcode;
use Jlem\Forms\Form;

class AddressForm extends Form
{
    public function getRules() 
    {
        return [
            'first_name'            => 'required|alpha',
            'last_name'             => 'required|alpha',
            'phone'                 => 'required',
            'address1'              => 'required',
            'city'                  => 'required|alpha',
            'state_abbreviation'    => 'required|alpha|size:2|exists:states,abbreviation',
            'zipcode'               => 'required|digits:5'
        ];
    }

    public function getMessages() 
    {
        return [
            'first_name.required'           => 'Your first name is required',
            'first_name.alpha'              => 'Invalid name',
            'last_name.required'            => 'Your last name is required',
            'last_name.alpha'               => 'Invalid name',
            'phone.required'                => 'Please provide a contact phone number',
            'address1.required'             => 'Please provide an address',
            'city.required'                 => 'Please enter the name of the city for this address',
            'city.alpha'                    => 'Please provide a valid city name',
            'state_abbreviation.required'   => 'Please select a state',
            'state_abbreviation.alpha'      => 'Please provide a valid state',
            'state_abbreviation.size'       => 'Please provide a valid state',
            'state_abbreviation.exists'     => 'Please provide a valid state',
            'zipcode.required'              => 'Please enter the zipcode',
            'zipcode.digits'                => 'Please enter a valid zipcode'
        ];
    }

    public function addFields()
    {
        $this->addField(new FirstName);
        $this->addField(new LastName);
        $this->addField(new Phone);
        $this->addField(new Address1);
        $this->addField(new Address2);
        $this->addField(new Address3);
        $this->addField(new City);
        $this->addField(new State);
        $this->addField(new Zipcode);
    }

    public function extraValidationFails()
    {
        return false;
    }
}
