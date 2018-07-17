<?php

class Application_Form_IngredientAdd extends Zend_Form
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
        $this->setAttrib('id', 'IngredientAddForm');
        //$this->setAttrib('name', 'IngredientAddForm');
        //$this->setName('add_ingredient_form');
         
        $this->addElement('select', 'ingredient_id', [
                    'label'      => 'Ingredient:',
                    'id'         => '',
                    'required'   => true,
                    'filters'    => ['StringTrim'],
                    'validators' => [],
                    'multiOptions'=> $this->ingredients,
        ]);

        $this->addElement('text', 'quantity', [
                    'label'      => 'Quantity:',
                    'required'   => true,
                    'validators' => [],
        ]);   
        

        $this->addElement('submit', 'submit_add', [
            'ignore' => true,
            'class' => 'btn btn-md btn-primary',
            'label' => 'Save',
        ]);

        $this->addElement('hash', 'csrf_add_ingredient_form', array(
            'ignore' => true,
        ));
    }
}
