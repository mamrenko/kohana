<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Message Model
 * Handles CRUD for user messages
 */
class Model_Message extends ORM {
	
	// Table name used by this model
	protected $_table = 'messages';
	
	// Define relationships
	//protected $_belongs_to = array('user' => array());
	
	// Define rules
	protected $_rules = array(
		'user_id' => array(
		'not_empty' => NULL,
			'digit' => NULL
		),
		'content' => array(
			'not_empty' => NULL,
			'min_length' => array(20),
			'max_length' => array(240),
		),
		'date_published' => array(
			'not_empty'  => NULL,
			'exact_length' => array(10)
		),
	);

	// Define filters
	protected $_filters = array(
		NULL => array('trim' => NULL)
	);
	
	// Define labels
	protected $_labels = array(
		'user_id' => 'User Id',
		'content' => 'Content',
		'date_published' => 'Date Published'
	);
	
	/**
	 * Adds a new message for a user
	 * 
	 * @param   int   	user_id
	 * @param   string  user's message
	 * @return  self
	 */ 
	public function create($user_id, $content) 
	{
		$this->clear();
		$this->user_id = $user_id;
		$this->content = $content;
		$this->date_published = time();
		return $this->save();

	}
	
	/**
	 * Updates a message
	 * 
	 * @param  int		message_id
	 * @param  string	content
	 * @return self
	 */
	public function edit($message_id, $content) 
	{
		$this->find($message_id);
		$this->content = $content;
		return $this->save();

	}
	
	/**
	 * Gets all messages
	 *
	 * @param	int	$limit
	 * @param	int	$offset
	 * @param	int	$user_id
	 * @return  self
	 */ 
	public function get_all($limit = 10, $offset = 0, $user_id = null)
	{
		$this->order_by('date_published', 'DESC')
			->limit($limit)
			->offset($offset);
		if ($user_id) 
		{						
			$this->where('user_id', '=', $user_id);
		}
		return $this->find_all();
	}
	
	/**
	 * Gets all messages from last 24 hours
	 * (Created in Have a Hero section of Chapter 6)
	 *
	 * @param	int	$limit
	 * @param	int	$offset
	 * @param	int	$user_id
	 * @return  self
	 */ 
	public function get_new($limit = 10, $offset = 0)
	{
		return $this->where('date_published', '>', time() - 86400)
			->order_by('date_published', 'DESC')
			->limit($limit)
			->offset($offset)
			->find_all();
	}
	
}