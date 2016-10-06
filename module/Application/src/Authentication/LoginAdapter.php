<?php

namespace Application\Authentication;

use \Zend\Authentication\Adapter\AdapterInterface;
use \Zend\Authentication\Result;

class LoginAdapter implements AdapterInterface
{
    private $login;
    private $password;
    
    public function __construct($login, $password)
    {
        $this->login = $login;
        $this->password = $password;
    }
    
    public function authenticate()
    {
        if ($this->login == 'ademilson'){
            if ($this->password == '123456'){
                return new Result(Result::SUCCESS, 'ademilson');
            }
            else {
                return new Result(Result::FAILURE_CREDENTIAL_INVALID, '', ['A SENHA ESTA INCORRETA']);
            }
        }
    }
    
}
