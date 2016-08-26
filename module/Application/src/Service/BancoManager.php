<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Application\Service;

use Application\Entity\Banco;
/**
 * Description of PostManager
 *
 * @author Ademilson
 */
class BancoManager {

    //put your code here
    private $entityManager;

    public function __construct($entityManager) {
        $this->entityManager = $entityManager;
    }

    // This method adds a new post.
    public function addNewBanco($data) {
        // Create new Post entity.
        $banco = new Banco();
        $banco->setCodigo($data['codigo']);
        $banco->setDescricao($data['descricao']);
        $banco->setCnpj($data['cnpj']);

        // Add the entity to entity manager.
        $this->entityManager->persist($banco);

        // Apply changes to database.
        $this->entityManager->flush();
    }
    
    public function editBanco ($banco, $data) {
        
        $banco->setCodigo($data['codigo']);
        $banco->setDescricao($data['descricao']);
        $banco->setCnpj($data['cnpj']);
        
        $this->entityManager->flush();
    }
    
    public function deleteBanco($banco) {
        
        $this->entityManager->remove($banco);
        
        $this->entityManager->flush();
    }
    
    

}
