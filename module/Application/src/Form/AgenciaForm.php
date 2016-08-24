<?php

namespace Application\Form;

use Zend\Form\Form;
use Zend\InputFilter\InputFilter;

/**
 * This form is used to collect user feedback data like user E-mail, 
 * message subject and text.
 */
class AgenciaForm extends Form {

    // Constructor.   
    public function __construct() {
        // Define form name
        parent::__construct('agencia-form');

        // Set POST method for this form
        $this->setAttribute('method', 'post');
        
        // Add form elements
        $this->addElements();
        $this->addInputFilter();
    }

    // This method adds elements to form (input fields and 
    // submit button).
    private function addElements() {
        // Add "nome" field
        $this->add([
            'type' => 'text',
            'name' => 'nome',
            'attributes' => [
                'id' => 'nome'
            ],
            'options' => [
                'label' => 'Nome',
            ],
        ]);

        // Add "endereco" field
        $this->add([
            'type' => 'text',
            'name' => 'endereco',
            'attributes' => [
                'id' => 'endereco'
            ],
            'options' => [
                'label' => 'Endereco',
            ],
        ]);

        // Add the submit button
        $this->add([
            'type' => 'submit',
            'name' => 'submit',
            'attributes' => [
                'value' => 'Enviar',
            ],
        ]);
    }

    private function addInputFilter() {
        $inputFilter = new InputFilter();
        $this->setInputFilter($inputFilter);

        $inputFilter->add([
            'name' => 'nome',
            'required' => true,
            'filters' => [
                ['name' => 'StringTrim'],
                ['name' => 'StripTags'],
            ],
            'validators' => [
                [
                    'name' => 'StringLength',
                    'options' => [
                        'min' => 1,
                        'max' => 50,
                    ],
                ],
            ],
                ]
        );

        $inputFilter->add([
            'name' => 'endereco',
            'required' => true,
            'filters' => [
                ['name' => 'StringTrim'],
                ['name' => 'StripTags'],
            ],
            'validators' => [
                [
                    'name' => 'StringLength',
                    'options' => [
                        'min' => 1,
                        'max' => 128
                    ],
                ],
            ],
                ]
        );
    }

}
