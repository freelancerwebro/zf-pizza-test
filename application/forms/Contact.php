<?php

class Application_Form_Contact extends Zend_Form
{

    public function init()
    {
        $this->setMethod('post');

        $this->addElement('text', 'name', [
            'label'      => 'Name:',
            'required'   => true,
            'filters'    => ['StringTrim'],
            'validators' => []
        ]);

        $this->addElement('text', 'email', [
            'label'      => 'Email:',
            'required'   => true,
            'filters'    => ['StringTrim', 'StripTags'],
            'validators' => ['EmailAddress']
        ]);

        $this->addElement('textarea', 'message', [
            'label'      => 'Message:',
            'required'   => true,
            'filters'    => ['StringTrim'],
            'validators' => [],
            'options'    => [
            ],
            'rows' => 10,
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

