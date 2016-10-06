<?php

namespace Application\Form;

use \Zend\Form\Form;
use \Zend\InputFilter\InputFilter;

class LoginForm extends Form
{
    public function __construct()
    {
        parent::__construct('login-form');
        
        $this->setAttribute('method', 'POST');
        
        $this->addElements();
        $this->addInputFilter();
    }
    
    private function addElements() 
    {
        $this->add([
            'type' => 'text',
            'name' => 'login',
            'attributes' => [
                'id' => 'login',
                'class' => 'form-control',
            ],
            'options' => [
                'label' => 'Login',
            ],
        ]);
        $this->add([
            'type' => 'password',
            'name' => 'password',
            'attributes' => [
                'id' => 'password',
                'class' => 'form-control',
            ],
            'options' => [
                'label' => 'Senha',
            ],
        ]);
        
        $this->add([
            'type' => 'submit',
            'name' => 'submit',
            'attributes' => [
                'value' => 'Enviar',
                'class' => 'btn btn-primary',
            ],
        ]);
    }
    
    private function addInputFilter()
    {
        $inputFilter = new InputFilter();
        $this->setInputFilter($inputFilter);
        
        $inputFilter->add([
            'name' => 'login',
            'required' => true,
            'filters' => [
                ['name' => 'StringTrim'],
                //['name' => 'StripTabs'],
            ],
        ]);
    }
}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

