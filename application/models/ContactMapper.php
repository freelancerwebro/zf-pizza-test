<?php

class Application_Model_ContactMapper{

	protected $_dbTable;

	public function setDbTable($dbTable)
    {
        if (is_string($dbTable)) {
            $dbTable = new $dbTable();
        }
        if (!$dbTable instanceof Zend_Db_Table_Abstract) {
            throw new Exception('Invalid table data gateway provided');
        }
        $this->_dbTable = $dbTable;
        return $this;
    }

    public function getDbTable()
    {
        if (null === $this->_dbTable) {
            $this->setDbTable('Application_Model_DbTable_Contact');
        }
        return $this->_dbTable;
    }

	public function save(Application_Model_Contact $contact)
    {
        $data = array(
            'name'    => $contact->getName(),
            'message' => $contact->getMessage(),
            'email'	  => $contact->getEmail(),
            'created' => date('Y-m-d H:i:s'),
        );

        $this->getDbTable()->insert($data);
    }
}