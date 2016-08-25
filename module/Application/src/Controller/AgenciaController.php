<?php

namespace Application\Controller;

use \Zend\Mvc\Controller\AbstractActionController;
use \Zend\View\Model\ViewModel;
use Application\Entity\Agencia;
use Application\Form\AgenciaForm;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class AgenciaController extends AbstractActionController {

    private $entityManager;
    private $agenciaManager;
    private $banco;

    public function __construct($entityManager, $agenciaManager) {
        $this->entityManager = $entityManager;
        $this->agenciaManager = $agenciaManager;
    }

    public function indexAction() {
        if (!$this->isValidRoute()) {
            return $this->redirect()->toRoute('banco');
        }
        $agencias = $this->banco->getAgencias();
        return new ViewModel(['banco' => $this->banco, 
            'agencias' => $agencias]);
    }

    public function addAction() {
        $form = new AgenciaForm();
        if (!$this->isValidRoute()) {
            return $this->redirect()->toRoute('banco');
        }
        
        if ($this->getRequest()->isPost()) {
            // Fill in the form with POST data
            $data = $this->params()->fromPost();
            $form->setData($data);

            // Validate form
            if ($form->isValid()) {

                // Get filtered and validated data
                $data = $form->getData();
                $data['banco'] = $this->banco;

                $this->agenciaManager->addNewAgencia($data);
                
                return $this->redirect()->toRoute('agencia', ['ban_id' => $this->banco->getId()]);
            }
        }

        return new ViewModel(['form' => $form, 'banco' => $this->banco]);
    }
    
    public function editAction () {
        $form = new AgenciaForm();
        if (!$this->isValidRoute()) {
            return $this->redirect()->toRoute('banco');
        }
        
        
    }

    private function isValidRoute() {
        $ban_id = $this->params()->fromRoute('ban_id');
        if ($ban_id == null) {
            $this->getResponse()->setStatusCode(404);
            return $this->redirect()->toRoute('banco');
        }

        $banco = $this->agenciaManager->getBanco(['id' => $ban_id]);
        if (!$banco) {
            $this->getResponse()->setStatusCode(404);
            return false;
        }

        $this->banco = $banco;
        return true;
    }

}
