<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Application\Controller\Factory;

use \Interop\Container\ContainerInterface;
use Application\Controller\BancoController;
/**
 * Description of BancoControllerFactory
 *
 * @author Ademilson
 */
class BancoControllerFactory {
    //put your code here
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null) {
        $entityManager = $container->get('doctrine.entitymanager.orm_default');
        $postManager = $container->get(\Application\Service\BancoManager::class);
        
        return new BancoController($entityManager, $postManager);
    }
    
}
