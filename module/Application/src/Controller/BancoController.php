<?php

namespace Application\Controller;

use \Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use \Application\Entity\Banco;
use \Application\Form\BancoForm;
//use \Monolog\Logger as Logger;
//use \Zend\Log\Logger as batata;

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
        //$log = new Logger('log');
        //$log->pushHandler(new \Monolog\Handler\StreamHandler('teste.txt', Logger::DEBUG));
        
        //$log->addInfo('pão de batata');
        
        $log = new \Zend\Log\Logger();
        $writer = new \Zend\Log\Writer\Stream('batata.txt');
        
        $log->addWriter($writer);
        
        
        $log->log(\Zend\Log\Logger::INFO, 'teste 1234');
        $log->alert('mensagem de alerta');

        if ($this->getRequest()->isPost()) {
            // Fill in the form with POST data
            $data = $this->params()->fromPost();
            $form->setData($data);

            // Validate form
            if ($form->isValid()) {

                // Get filtered and validated data
                $data = $form->getData();
                $log->log(\Zend\Log\Logger::INFO, $data);

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
