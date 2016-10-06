<?php
namespace Application\Service\Factory;

use \Application\Service\LoginManager;
use Interop\Container\ContainerInterface;

class LoginManagerFactory
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $entityManager = $container->get('doctrine.entitymanager.orm_default');
        
        return new LoginManager($entityManager);
    }
    
}