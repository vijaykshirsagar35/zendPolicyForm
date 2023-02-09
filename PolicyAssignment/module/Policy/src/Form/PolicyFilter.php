<?php
namespace Policy\Form;

use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilter;

class PolicyFilter extends InputFilter
{
	public function __construct()
	{
		// self::__construct(); // parnt::__construct(); - trows and error
		$this->add(array(
			'name'     => 'first_name',
			'required' => true,
			'filters'  => array(
				array('name' => 'StripTags'),
				array('name' => 'StringTrim'),
			),
			'validators' => array(
				array(
					'name'    => 'StringLength',
					'options' => array(
						'encoding' => 'UTF-8',
						'min'      => 1,
						'max'      => 100,
					),
				),
			),
		));
                
                $this->add(array(
			'name'     => 'last_name',
			'required' => true,
			'filters'  => array(
				array('name' => 'StripTags'),
				array('name' => 'StringTrim'),
			),
			'validators' => array(
				array(
					'name'    => 'StringLength',
					'options' => array(
						'encoding' => 'UTF-8',
						'min'      => 1,
						'max'      => 100,
					),
				),
			),
		));
                
                $this->add(array(
			'name'     => 'policy_number',
			'required' => true,
			'filters'  => array(
				array('name' => 'Int'),
			),
			'validators' => array(
				array(
					'name'    => 'Digits',
				),
			),
		));
                
                
                $this->add(array(
			'name'     => 'start_date',
			'required' => true,
			'filters'  => array(
				array('name' => 'Date'),
			)
		));
                
                $this->add(array(
			'name'     => 'end_date',
			'required' => true,
			'filters'  => array(
				array('name' => 'Date'),
			)
		));
                
                $this->add(array(
			'name'     => 'premium',
			'required' => true,
			'filters'  => array(
				array('name' => 'Int'),
			),
			'validators' => array(
				array(
					'name'    => 'Digits',
				),
			),
		));
	}
}