<?php

require_once('BaseController.php');

class PizzaController extends BaseController
{

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

                $this->_helper->FlashMessenger(array('message' => 'The pizza has been successfully added!!'));
                return $this->_helper->redirector('index');
            }
        }

        $this->view->form = $form;
       	$this->view->allPizzas = $pizzasTable->fetchAll();
    }

    public function viewAction()
    {	
    	$id = $this->_getParam('id', 1);
    	
    	$pizza = new Application_Model_DbTable_Pizzas();
    	$row = $pizza->fetchRow('id = '.$id);

    	if(empty($row))
    	{
    		$this->_helper->FlashMessenger(array('error' => "We have no pizza with this ID!"));
    		return $this->_helper->redirector('index');
    	}

    	$ingredientsTable = new Application_Model_DbTable_PizzaIngredients();
    	$ingredients = $ingredientsTable->getPizzaIngredients($id);

    	//print_r($ingredients);

    	//echo ">>>>".count($ingredients);

    	$this->view->pizza = $row;
    	$this->view->allPizzaIngredients = $ingredients;
    }


}

