<?php

class IngredientController extends Zend_Controller_Action
{

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
                return $this->_helper->redirector('index');
            }
        }
        $this->view->form = $form;
        $this->view->allIngredients = $ingredientsTable->fetchAll();
    }

}



