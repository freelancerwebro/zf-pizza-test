<?php

class Application_Model_DbTable_PizzaIngredients extends Zend_Db_Table_Abstract
{
    protected $_name = 'pizza_ingredients';

    /**
    *   Get all the ingredients of a single pizza
    *
    *  @param $pizza_id - integer  
    */
    public function getPizzaIngredients($pizza_id = null)
    {

    	$select = $this->select()
    				->from(["pi" => "pizza_ingredients"], ["ordering", "quantity", "ingredient_id", "pizza_id", "id"])
    				->joinLeft(["i" => "ingredients"], "pi.ingredient_id = i.id", ["ingredient_name" => "name", "ingredient_cost" => "cost"])
	    			->where('pi.pizza_id=?', $pizza_id)
	    			->order('pi.ordering ASC')
	    			->setIntegrityCheck(FALSE);

	    return $this->fetchAll($select);

    }
}
