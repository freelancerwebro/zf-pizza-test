<?php

class Application_Form_IngredientEdit extends Zend_Form
{


    public $ingredients = [];

    public function __construct($ingredients = [])
    {
        $this->ingredients = $ingredients;

        parent::__construct();
    }

    /**
    *   Displays the Ingredient Edit form
    *   Fields: ingredients, quantities
    *   
    */

    public function init()
    {   
        $this->setMethod('post');

        if(count($this->ingredients) > 0)
        {   

            $count = 0;

            foreach ($this->ingredients as $ingredient) 
            {
                            
                 $this->addElement('select', 'ingredients_'.$ingredient['ingredient_id'], [
                    'label'      => 'Ingredient:',
                    'id'         => '',
                    'required'   => true,
                    'filters'    => ['StringTrim'],
                    'validators' => [],
                    'multiOptions'=> [1 => "unu", 2 => "doi"],
                    'value'      => 2
                ]);

                $this->addElement('text', 'quantities_'.$ingredient['ingredient_id'], [
                    'label'      => 'Quantity:',
                    'required'   => true,
                    'validators' => [],
                    'value'      => $ingredient['quantity']
                ]);   

            }
        }
        
        

        $this->addElement('submit', 'submit2', [
            'ignore' => true,
            'class' => 'btn btn-md btn-primary',
            'label' => 'Save',
        ]);

        $this->addElement('hash', 'csrf_edit_form', array(
            'ignore' => true,
        ));
    }
}
