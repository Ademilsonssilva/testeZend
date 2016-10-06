<?php
namespace Application\Service;

use \Application\Entity\Usuario;
use \Zend\Authentication\Adapter\AdapterInterface;
use \Zend\Authentication\Result;

class LoginManager implements AdapterInterface
{
    
    private $entityManager;
    private $login;
    private $password;

    public function __construct($entityManager) {
        $this->entityManager = $entityManager;
    }

    public function setCredentials($login, $password)
    {
        $this->login = $login;
        $this->password = $password;
    }
    
    public function authenticate()
    {
        $user = $this->entityManager->getRepository(Usuario::class)->findBy(
            ['login' => $this->login, 'password' => $this->password]
        );
        
        if ($user != null) {
            return new Result(Result::SUCCESS, $user);
        }else {
            return new Result(Result::FAILURE, '', ['erro']);
        }
    }

}