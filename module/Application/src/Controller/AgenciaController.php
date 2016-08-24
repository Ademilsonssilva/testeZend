<?php

namespace Application\Controller;

use \Zend\Mvc\Controller\AbstractActionController;
use \Zend\View\Model\ViewModel;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class AgenciaController extends AbstractActionController {

    public function indexAction() {
        $this->isValidRoute();
        return new ViewModel();
    }

    public function isValidRoute() {
        if ($this->params()->fromRoute('ban_id') == null) {
            $this->getResponse()->setStatusCode(404);
            $this->redirect()->toRoute('banco');
        }
        
        
    }

}
