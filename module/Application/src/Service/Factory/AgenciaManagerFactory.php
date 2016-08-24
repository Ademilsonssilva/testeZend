<?php

namespace Application\Service\Factory;

use Application\Service\AgenciaManager;
use \Interop\Container\ContainerInterface;

class AgenciaManagerFactory 
{
    //put your code here
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null) {
        $entityManager = $container->get('doctrine.entitymanager.orm_default');
        
        return new AgenciaManager($entityManager);
    }
}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

