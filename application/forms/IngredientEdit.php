<?php

class Application_Form_IngredientEdit extends Zend_Form
{


    /**
    *   Displays the Ingredient Edit form
    *   Fields: ingredients, quantities
    *   
    */

    public function init()
    {   
        $this->setMethod('post');

        $this->addElement('select', 'ingredients[]', [
            'label'      => 'Name of the ingredient:',
            'required'   => true,
            'filters'    => ['StringTrim'],
            'validators' => [],

        ]);

        $this->addElement('text', 'quantities[]', [
            'label'      => 'Quantity:',
            'required'   => true,
            'validators' => []
        ]);

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
