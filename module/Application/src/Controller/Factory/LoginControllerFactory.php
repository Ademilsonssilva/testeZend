<?php
namespace Application\Controller\Factory;

use \Interop\Container\ContainerInterface;
use Application\Controller\LoginController;

class LoginControllerFactory
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null) {
        //$entityManager = $container->get('doctrine.entitymanager.orm_default');
        $loginManager = $container->get(\Application\Service\LoginManager::class);
        
        return new LoginController($loginManager);
    }
    
}
