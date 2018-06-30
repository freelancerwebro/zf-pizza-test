<?php

class PizzaController extends Zend_Controller_Action
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
        $form = new Application_Form_Pizza();
        $pizzasTable = new Application_Model_DbTable_Pizzas();

        if ($this->getRequest()->isPost()) {
            if ($form->isValid($this->getRequest()->getPost())) {

                $formValues = $form->getValues();
                $newPizza = $pizzasTable->createRow();
                $newPizza->name = $formValues['name'];
                $newPizza->cost = $formValues['cost'];
                $newPizza->save();

                $this->_helper->FlashMessenger('The pizza has been successfully added!!');

                return $this->_helper->redirector('index');
            }
        }

        $this->view->form = $form;
       	$this->view->allPizzas = $pizzasTable->fetchAll();
    }


}

