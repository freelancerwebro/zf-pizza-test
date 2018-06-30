<?php

require_once('BaseController.php');

class ContactController extends BaseController
{
    
    public function indexAction()
    {
        $form = new Application_Form_Contact();

        if ($this->getRequest()->isPost()) {

            if ($form->isValid($this->getRequest()->getPost())) {

                $formValues = $form->getValues();
                
                $contact = new Application_Model_Contact($form->getValues());
                $mapper  = new Application_Model_ContactMapper();
                $mapper->save($contact);

                $this->_helper->FlashMessenger('The message was successfully send!');

                return $this->_helper->redirector('index');
            }
        }

        $this->view->form = $form;
    }


}

