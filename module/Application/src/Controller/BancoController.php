<?php

namespace Application\Controller;

use \Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use \Application\Entity\Banco;
use \Application\Form\BancoForm;

class BancoController extends AbstractActionController {

    private $entityManager;
    private $bancoManager;

    public function __construct($entityManager, $bancoManager) {
        $this->entityManager = $entityManager;
        $this->bancoManager = $bancoManager;
    }

    public function indexAction() {
        $bancos = $this->entityManager->getRepository(Banco::class)->findAll();
        return new ViewModel(['bancos' => $bancos]);
    }

    public function addAction() {

        $form = new BancoForm();

        if ($this->getRequest()->isPost()) {
            // Fill in the form with POST data
            $data = $this->params()->fromPost();
            $form->setData($data);

            // Validate form
            if ($form->isValid()) {

                // Get filtered and validated data
                $data = $form->getData();

                $this->bancoManager->addNewBanco($data);
                // ... Do something with the validated data ...
                // Redirect to "Thank You" page
                return $this->redirect()->toRoute('banco');
            }
        }
        return new ViewModel(['form' => $form]);
    }

    public function editAction() {
        $form = new BancoForm();
        $banco = $this->entityManager->getRepository(Banco::class)
                ->find($this->params()->fromRoute('id'));

        if ($banco == null) {
            $this->getResponse()->setStatusCode(404);
            return;
        }

        if ($this->getRequest()->isPost()) {
            $data = $this->params()->fromPost();
            $form->setData($data);
            if ($form->isValid()) {
                $data = $form->getData();

                $this->bancoManager->editBanco($banco, $data);

                return $this->redirect()->toRoute('banco');
            }
        }

        return new ViewModel(['form' => $form, 'banco' => $banco]);
    }

    public function deleteAction() {
        $banco = $this->entityManager->getRepository(Banco::class)
                ->find($this->params()->fromRoute('id'));

        if ($banco == null) {
            $this->getResponse()->setStatusCode(404);
            return;
        }
        
        $this->bancoManager->deleteBanco($banco);
        return $this->redirect()->toRoute('banco');
    }

}
