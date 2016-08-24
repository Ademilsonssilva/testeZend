<?php

namespace Application\Form;

use Zend\Form\Form;
use Zend\InputFilter\InputFilter;

/**
 * This form is used to collect user feedback data like user E-mail, 
 * message subject and text.
 */
class BancoForm extends Form {

    // Constructor.   
    public function __construct() {
        // Define form name
        parent::__construct('banco-form');

        // Set POST method for this form
        $this->setAttribute('method', 'post');

//        $this->formElementErrors($form->get('email'));
        // Add form elements
        $this->addElements();
        $this->addInputFilter();
    }

    // This method adds elements to form (input fields and 
    // submit button).
    private function addElements() {
        // Add "codigo" field
        $this->add([
            'type' => 'text',
            'name' => 'codigo',
            'attributes' => [
                'id' => 'codigo'
            ],
            'options' => [
                'label' => 'Codigo',
            ],
        ]);

        // Add "subject" field
        $this->add([
            'type' => 'text',
            'name' => 'descricao',
            'attributes' => [
                'id' => 'descricao'
            ],
            'options' => [
                'label' => 'Descricao',
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
            'name' => 'codigo',
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
                        'max' => 6,
                    ],
                ],
            ],
                ]
        );

        $inputFilter->add([
            'name' => 'descricao',
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
