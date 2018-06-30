<?php

class ContactController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */

        $messages = $this->_helper->flashMessenger->getMessages();

		if(!empty($messages))
		{	
			$this->_helper->layout->getView()->message = $messages[0];
		}
    }

    public function indexAction()
    {
        $form = new Application_Form_Contact();

        if ($this->getRequest()->isPost()) {

            if ($form->isValid($this->getRequest()->getPost())) {

                $formValues = $form->getValues();
                
                $contact = new Application_Model_Contact($form->getValues());
                $mapper  = new Application_Model_ContactMapper();
                $mapper->save($contact);

                $this->_helper->FlashMessenger('The message was succesfully send!');

                return $this->_helper->redirector('index');
            }
        }

        $this->view->form = $form;
    }


}

