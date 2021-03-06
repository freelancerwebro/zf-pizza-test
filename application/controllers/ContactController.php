<?php

require_once('BaseController.php');

class ContactController extends BaseController
{
    
    /**
    * Displays and process the Contact form on the screen.
    */
    public function indexAction()
    {
        $form = new Application_Form_Contact();

        if ($this->getRequest()->isPost()) {

            if ($form->isValid($this->getRequest()->getPost())) {

                $formValues = $form->getValues();
                
                $contact = new Application_Model_Contact($form->getValues());
                $mapper  = new Application_Model_ContactMapper();
                $mapper->save($contact);

                $this->_helper->FlashMessenger(['message' => 'The message was successfully send!']);

                return $this->_helper->redirector('index');
            }
        }

        $this->view->form = $form;
    }


}

