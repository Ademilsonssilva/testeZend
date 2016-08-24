<?php

namespace Application\Controller\Factory;

use \Interop\Container\ContainerInterface;
use Application\Controller\AgenciaController;

class AgenciaControllerFactory {
    
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null) {
        $entityManager = $container->get('doctrine.entitymanager.orm_default');
        $agenciaManager = $container->get(\Application\Service\AgenciaManager::class);
        
        return new AgenciaController($entityManager, $agenciaManager);
    }
}
