<?php

class Application_Form_Ingredient extends Zend_Form
{

    public function init()
    {
        $this->setMethod('post');

        $this->addElement('text', 'name', [
            'label'      => 'Name of the ingredient:',
            'required'   => true,
            'filters'    => ['StringTrim'],
            'validators' => []
        ]);

        $this->addElement('text', 'cost', [
            'label'      => 'Cost:',
            'required'   => true,
            'validators' => []
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
