<?php defined('SYSPATH') or die('No direct script access.');

class Model_User extends Model_Auth_User {
	
	protected $_has_many = array(
		'user_tokens' => array('model' => 'user_token'),
		'roles'       => array(
			'model' => 'role', 
			'through' => 'roles_users'
		),
		'messages'	  => array('model' => 'message')
	);

	protected $_labels = array(
		'username'         => 'Username',
		'email'            => 'Email Address',
		'password'         => 'Password',
		'password_confirm' => 'Password Confirmation'
	);
	
	protected $_ignored_columns = array('password_confirm');
 
	public function validate_create($array) 
	{		
		$array = Validate::factory($array)
			->label('username', $this->_labels['username'])
			->label('email', $this->_labels['email'])
			->rules('username', $this->_rules['username'])
			->rules('email', $this->_rules['email'])
			->rules('password', $this->_rules['password']);
 
		foreach($this->_callbacks as $key => $value)
		{
			foreach ($value as $validator) 
			{
				$array->callback($key, array($this, $validator));
			}
			
		}		
 
		return $array;
	}
	
	public function validate_update($array) 
	{
		$array = Validate::factory($array)
			->rules('username', $this->_rules['username'])
			->rules('email', $this->_rules['email'])
			->label('username', $this->_labels['username'])
			->label('email', $this->_labels['email']);
 	
		foreach($this->_callbacks as $key => $value)
		{
			$array->callback($key, array($this, $value));
		}		
 
		return $array;
	}
	
	public function validate_update_password($array) 
	{		
		$array = Validate::factory($array)
			->rules('password', $this->_rules['password'])
			->rules('password_confirm', $this->_rules['password_confirm'])
			->label('password', $this->_labels['password'])
			->label('password_confirm', $this->_labels['password_confirm']);		
 
		return $array;
	}
	
}