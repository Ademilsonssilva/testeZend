<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Application\Controller;

use \Zend\Mvc\Controller\AbstractActionController;
use \Zend\View\Model\ViewModel;
use \Application\Form\LoginForm;
use Application\Authentication\LoginAdapter;
use \Zend\Log\Logger;

/**
 * Description of LoginController
 *
 * @author Ademilson
 */
class LoginController extends AbstractActionController
{
    private $loginManager;
    
    public function __construct($loginManager){
        $this->loginManager = $loginManager;
    }
    
    public function indexAction()
    {
        $form = new LoginForm();
        
        if ($this->getRequest()->isPost()) {
            
            $data = $this->params()->fromPost();
            $form->setData($data);

            // Validate form
            if ($form->isValid()) {
                
                $data = $form->getData();
            
                $log = new Logger();
                $writer = new \Zend\Log\Writer\Stream('batata.txt');
                $log->addWriter($writer);
                $log->log(Logger::INFO, 'tentando realizar login:');
                $log->log(Logger::INFO, $data);

                $authAdapter = new LoginAdapter($data['login'], $data['password']);
                $this->loginManager->setCredentials($data['login'], $data['password']);
                
                $result = $this->loginManager->authenticate();
                
                if (!$result->isValid()) {
                    foreach($result->getMessages() as $message) {
                        $log->log(Logger::ERR, $message);
                    }
                }
                else {
                    $log->log(Logger::INFO, "LOGADO COM SUCESSO COMO :");
                    $log->log(Logger::INFO, $result->getIdentity());
                }
            }
            return $this->redirect()->toRoute('home');
            
        }
        return new ViewModel(['form' => $form]);
    }
}
