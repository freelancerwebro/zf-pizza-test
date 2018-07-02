<?php

class Application_Model_DbTable_Ingredients extends Zend_Db_Table_Abstract
{
    protected $_name = 'ingredients';

    /**
    *	Returns all the ingredients list.
    */
    public function getAllIngredients()
    {

    	$select = $this->select(['id', 'name'])
	    			->order('id ASC');

	    return $this->fetchAll($select);

    }

    public function getAllIngredientsForDropdown()
    {
        $ingredients = $this->getAllIngredients();
        $ingredientsArray = $ingredients->toArray();

        $dropdownValues = [];

        foreach($ingredientsArray as $ingredient)
        {
            $dropdownValues[$ingredient['id']] = $ingredient['name'];            
        }

        return $dropdownValues;
    }
}
