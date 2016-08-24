<?php
namespace Application\Service;

use Application\Entity\Agencia;
use Application\Entity\Banco;

class AgenciaManager
{
    private $entityManager;
    private $bancoManager;

    public function __construct($entityManager) {
        $this->entityManager = $entityManager;
    }
    
    public function getBanco ($data) {
        return $this->entityManager->getRepository(Banco::class)->find($data['id']);
    }
    
    public function addNewAgencia($data) {
        $agencia = new Agencia();
        $agencia->setNome($data['nome']);
        $agencia->setBanco($data['banco']);
        $agencia->setEndereco($data['endereco']);

        // Add the entity to entity manager.
        $this->entityManager->persist($agencia);

        // Apply changes to database.
        $this->entityManager->flush();
    }
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

