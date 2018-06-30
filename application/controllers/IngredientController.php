<?php

class IngredientController extends Zend_Controller_Action
{
    public function init()
    {
        $messages = $this->_helper->flashMessenger->getMessages();

        if(!empty($messages))
        {   
            $this->_helper->layout->getView()->message = $messages[0];
        }
    }

    public function indexAction()
    {
        $form = new Application_Form_Ingredient();
        $ingredientsTable = new Application_Model_DbTable_Ingredients();

        if ($this->getRequest()->isPost()) {
            if ($form->isValid($this->getRequest()->getPost())) {
                $formValues = $form->getValues();
                $newIngredient = $ingredientsTable->createRow();
                $newIngredient->name = $formValues['name'];
                $newIngredient->cost = $formValues['cost'];
                $newIngredient->save();
                
                $this->_helper->FlashMessenger('The ingredient has been successfully added!');

                return $this->_helper->redirector('index');
            }
        }
        $this->view->form = $form;
        $this->view->allIngredients = $ingredientsTable->fetchAll();
    }

}



