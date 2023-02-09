<?php

namespace Policy\Model;
// I don't have the filters here now I can implement the Interface
// Use with Zend\Db\ResultSet\ResultSet. You send it as argument to the Adapter ot TableDataGateway
/*
The form�s bind() method attaches the model to the form. This is used in two ways:

When displaying the form, the initial values for each element are extracted from the model.
After successful validation in isValid(), the data from the form is put back into the model.
These operations are done using a hydrator object. There are a number of hydrators, but the default 
one is Zend\Stdlib\Hydrator\ArraySerializable which expects to find two methods in the model: 
getArrayCopy() and exchangeArray(). We have already written exchangeArray() in our Album entity, 
so just need to write getArrayCopy():
*/
class Policy // implements ArrayObject - but I should define a lot of methods
{
    public $id;
    public $first_name;
    public $last_name;
    public $policy_number;	
    public $start_date;	
    public $end_date;	
    public $premium;	
	// ArrayObject, or at least implement exchangeArray. For Zend\Db\ResultSet\ResultSet to work
	// 1) hydration!!!!! <- This is enough for resultSet to work but not for the form
    public function exchangeArray($data) 
    {
        $this->id     = (!empty($data['id'])) ? $data['id'] : null;
        $this->first_name = (!empty($data['first_name'])) ? $data['first_name'] : null;
        $this->last_name = (!empty($data['last_name'])) ? $data['last_name'] : null;
        $this->policy_number = (!empty($data['policy_number'])) ? $data['policy_number'] : null;
        $this->start_date = (!empty($data['start_date'])) ? $data['start_date'] : null;
        $this->end_date = (!empty($data['end_date'])) ? $data['end_date'] : null;
        $this->premium = (isset($data['premium'])) ? $data['premium'] : null;
    }
	// 2) Extraction. For extraction the standard Hydrator the Form expects getArrayCopy to be able to bind
	// -> Extracts the data
    // Add the following method:
    public function getArrayCopy()
    {
        return get_object_vars($this);
    }	
}