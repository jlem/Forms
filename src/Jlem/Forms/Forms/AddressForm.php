<?php namespace Jlem\Forms\Forms;

use Jlem\Fields\Field;

class AddressForm extends Form
{
    public function getRules() 
    {
        return [
            'first_name'            => 'required|alpha',
            'last_name'             => 'required|alpha',
            'phone'                 => 'required',
            'address_1'             => 'required',
            'city'                  => 'required|alpha',
            'state'                 => 'required|alpha|size:2|exists:states,abbreviation',
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
            'state.required'                => 'Please select a state',
            'state.alpha'                   => 'Please provide a valid state',
            'state.size'                    => 'Please provide a valid state',
            'state.exists'                  => 'Please provide a valid state',
            'zipcode.required'              => 'Please enter the zipcode',
            'zipcode.digits'                => 'Please enter a valid zipcode'
        ];
    }

    public function addFields()
    {
        return [
            Field::text('First Name'),
            Field::text('Last Name'),
            Field::text('Phone'),
            Field::text('Address 1'),
            Field::text('Address 2'),
            Field::text('Address 3'),
            Field::text('City'),
            Field::select('State', ['NH' => 'NH']),
            Field::text('Zipcode', ['maxlength' => 5]),
            Field::checkBox('Derp'),
            Field::radioButton('Herp'),
            Field::hidden('Haha')
        ];
    }
}
