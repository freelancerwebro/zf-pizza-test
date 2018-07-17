<?php

require_once('BaseController.php');

class PizzaController extends BaseController
{
	/**
	*	Displays all the available pizzas. Handles the add pizza form.
	*	
	*/
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

    /**
	*	Displays one pizza with all ingredients
	*	*It requires to provide the ID of the pizza in the URL.
	*/
    public function viewAction()
    {	
    	$id = $this->_getParam('id', 1);
    	$pizza = $this->_getPizza($id);

    	$ingredientsTable = new Application_Model_DbTable_PizzaIngredients();
    	$ingredients = $ingredientsTable->getPizzaIngredients($id);

    	$this->view->pizza = $pizza;
    	$this->view->allPizzaIngredients = $ingredients;
    }

    /**
	*	Handles the delete action of the pizza.
	*	*It requires to provide the ID of the pizza in the URL.
	*/
    public function deleteAction()
    {	
    	$id = $this->_getParam('id', 1);
    	$this->_getPizza($id);

    	$pizza = new Application_Model_DbTable_Pizzas();
    	$pizza->delete(["id = ?" => $id]);
    	$this->_helper->FlashMessenger(array('message' => 'The pizza has been successfully deleted!!'));

    	return $this->_helper->redirector('index');
    }

    /**
	*	Handles the edit pizza and ingredients forms.
	*	*It requires to provide the ID of the pizza in the URL.
	*/
    public function editAction()
    {
    	$id = $this->_getParam('id', 1);
    	$pizza = $this->_getPizza($id);

    	$pizzasTable = new Application_Model_DbTable_Pizzas();
    	$pizzaIngredientsTable = new Application_Model_DbTable_PizzaIngredients();
    	$ingredientsTable = new Application_Model_DbTable_Ingredients();


    	$ingredients = $pizzaIngredientsTable->getPizzaIngredients($id);
    	
    	$form = new Application_Form_Pizza($pizza->toArray());
    	$ingredientsArray = $ingredients->toArray();
    	$allIngredients = $ingredientsTable->getAllIngredients();
    	
    	$form_ingredients_edit = new Application_Form_IngredientEdit($ingredientsArray);
    	$form_ingredient_add = new Application_Form_IngredientAdd($ingredientsTable->getAllIngredientsForDropdown());


    	if ($this->getRequest()->isPost()) {
            if ($form->isValid($this->getRequest()->getPost())) {

                $formValues = $form->getValues();

                // echo "<pre>";
                // 	print_r($formValues);
                // echo "</pre>";
                //return false;

                $pizza->name = $formValues['name'];
                $pizza->cost = $formValues['cost'];
                $pizza->save();

                $this->_helper->FlashMessenger(array('message' => 'The pizza has been successfully saved!!'));
               	return $this->_helper->redirector->gotoSimple('edit', 'pizza', null, ['id' => $id]);
            }

        }


    	$this->view->form = $form;
    	$this->view->form_ingredients = $form_ingredients_edit;
    	$this->view->pizza = $pizza;
    	$this->view->allPizzaIngredients = $ingredients;
    	$this->view->form_ingredients_add = $form_ingredient_add;
    }

    /**
	*	Handles the delete action of the pizza.
	*	*It requires to provide the ID of the pizza ingredient in the URL and pizza_id
	*/
    public function deleteingredientAction()
    {	
    	$id = $this->_getParam('id', 1);
    	$pizza_id = $this->_getParam('pizza_id', 1);
    	$pizza = $this->_getPizza($id);

    	$pizza = new Application_Model_DbTable_PizzaIngredients();
    	$pizza->delete(["id = ?" => $id]);
    	$this->_helper->FlashMessenger(array('message' => 'The ingredient has been successfully removed from pizza!!'));

    	return $this->_helper->redirector->gotoSimple('edit', 'pizza', null, ['id' => $pizza_id]);
    }

    /**
    *	Fetch one pizza from the DB. In case pizza not received, return a flash message on the screen.
    *
    * @param $id - integer 
    */
    private function _getPizza($id)
    {	
    	$pizza = new Application_Model_DbTable_Pizzas();
    	$row = $pizza->fetchRow(['id = ?' => $id]);

    	if(empty($row))
    	{
    		$this->_helper->FlashMessenger(array('error' => "We have no pizza with this ID!"));
    		return $this->_helper->redirector('index');
    	}

    	return $row;
    }

    public function addingredientAction()
    {
        $pizza_id = $this->_getParam('pizza_id', 1);
        $pizza = $this->_getPizza($pizza_id);

        //echo ">>>>".$pizza_id;

        $ingredientsTable = new Application_Model_DbTable_Ingredients();
        $pizzaIngredientsTable = new Application_Model_DbTable_PizzaIngredients();
        $form_ingredient_add = new Application_Form_IngredientAdd($ingredientsTable->getAllIngredientsForDropdown());

        if ($this->getRequest()->isPost()) {
            if ($form_ingredient_add->isValid($this->getRequest()->getPost())) {

                $formValues = $form_ingredient_add->getValues();

                $pizzaIngredientsTable->ingredient_id = $formValues['ingredient_id'];
                $pizzaIngredientsTable->quantity = $formValues['quantity'];
                $pizzaIngredientsTable->pizza_id = $pizza_id;
                $pizzaIngredientsTable->insert();


                $this->_helper->FlashMessenger(array('message' => 'The pizza ingredient has been successfully saved!!'));
                return $this->_helper->redirector->gotoSimple('edit', 'pizza', null, ['pizza_id' => $pizza_id]);
            }
        }

        $this->view->form_ingredients_add = $form_ingredient_add;
    }


}

