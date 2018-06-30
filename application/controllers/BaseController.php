<?php

class BaseController extends Zend_Controller_Action
{

	public function init()
    {
        /* Initialize action controller here */

        $messages = $this->_helper->flashMessenger->getMessages();

		if(!empty($messages[0]['message']))
		{	
			$this->_helper->layout->getView()->message = $messages[0]['message'];
		}

		if(!empty($messages[0]['error']))
		{	
			$this->_helper->layout->getView()->error = $messages[0]['error'];
		}
    }

    
}