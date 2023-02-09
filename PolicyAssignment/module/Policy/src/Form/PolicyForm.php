<?php
namespace Policy\Form;

use Zend\Form\Form;

class PolicyForm extends Form
{
    public function __construct($name = null)
    {
        parent::__construct('policy');
        $this->setAttribute('method', 'post');

        $this->add(array(
            'name' => 'first_name',
            'attributes' => array(
                'type'  => 'text',
            ),
            'options' => array(
                'label' => 'First Name',
            ),
        ));
		
        $this->add(array(
            'name' => 'last_name',
            'attributes' => array(
                'type'  => 'text',
            ),
            'options' => array(
                'label' => 'Last Name',
            ),
        ));

        $this->add(array(
            'name' => 'policy_number',
            'attributes' => array(
                'type'  => 'text',
            ),
            'options' => array(
                'label' => 'Policy number',
            ),
        ));	

        	
        

        $this->add(array(
            'name' => 'start_date',
            'attributes' => array(
                'type'  => 'text',
            ),
            'options' => array(
                'label' => 'Start Date',
            ),
        ));

        $this->add(array(
            'name' => 'end_date',
            'attributes' => array(
                'type'  => 'text',
            ),
            'options' => array(
                'label' => 'End Date',
            ),
        ));
		
        $this->add(array(
            'name' => 'premium',
            'attributes' => array(
                'type'  => 'text',
            ),
            'options' => array(
                'label' => 'Premium',
            ),
        ));
		
        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type'  => 'submit',
                'value' => 'Go',
                'id' => 'submitbutton',
            ),
        )); 
    }
}