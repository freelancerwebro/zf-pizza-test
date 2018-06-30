<?php

include 'Model.php';

class Application_Model_Contact extends Application_Model{

	protected $_name;
    protected $_created;
    protected $_email;
    protected $_message;

    public function setName($name)
    {
    	$this->_name = (string)$name;
    }

    public function getName()
    {
    	return $this->_name;
    }

    public function setCreated($created)
    {
    	$this->_created = $created;
    }

    public function getCreated()
    {
    	return $this->_created;
    }

    public function setEmail($email)
    {
        $this->_email = (string) $email;
        return $this;
    }

    public function getEmail()
    {
        return $this->_email;
    }

    public function setMessage($message)
    {
        $this->_message = (string) $message;
        return $this;
    }

    public function getMessage()
    {
        return $this->_message;
    }

}