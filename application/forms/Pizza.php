<?php

class Application_Form_Pizza extends Zend_Form
{

    /**
    *   Displays the Pizza form.
    *   Fields: name, cost
    *   
    */
    public function init()
    {       

        $this->setMethod('post');
        //$this->setAttrib('id', 'PizzaAddForm');
        //$this->setAttrib('name', 'PizzaAddForm');
        ///$this->setName('add_pizza_form');

        $this->addElement('text', 'name', [
            'label'      => 'Name of the pizza:',
            'required'   => true,
            'filters'    => ['StringTrim'],
            'validators' => [],
            'value'      => $this->getAttrib('name')
        ]);

        $this->addElement('text', 'cost', [
            'label'      => 'Cost:',
            'required'   => true,
            'validators' => [],
            'value'      => $this->getAttrib('cost')
        ]);

        $this->addElement('submit', 'submit', [
            'ignore' => true,
            'class' => 'btn btn-md btn-primary',
            'label' => 'Save',
        ]);

        $this->addElement('hash', 'csrf', array(
            'ignore' => true,
        ));
    }


}

