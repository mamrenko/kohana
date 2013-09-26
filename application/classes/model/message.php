<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Message Model
 * Handles CRUD for user messages
 */
class Model_Message {
	
	// Table name used by this model
	protected $_table = 'messages';
	
	/**
	 * Adds a new message for a user
	 * 
	 * @param   string   user_id
	 * @param   string   user's message
	 * @return  Database
	 */ 
	public function add($user_id, $message) 
	{
		$data = array('user_id', 'content', 'date_published');
		
		return DB::insert($this->_table, $data)
			->values(array($user_id, $message, time()))
			->execute();
	}
	
	/**
	 * Updates a message
	 * 
	 * @param  int		message_id
	 * @param  string	content
	 * @return Database
	 */
	public function edit($message_id, $content) 
	{
		return DB::update($this->_table)
			->set(array(
				'content' => $content
			))
			->where('id', '=', $message_id)
			->execute();
	}
	
	/**
	 * Gets a message based on id
	 * 
	 * @param 	int		message_id
	 * @return 	Database
	 */
	public function get_message($message_id) 
	{
		return DB::select()
			->from($this->_table)
			->where('id', '=', $message_id)
			->execute()
			->current();
	}
	
	/**
	 * Gets all messages
	 *
	 * @param	int	$limit
	 * @param	int	$offset
	 * @param	int	$user_id
	 * @return  array
	 */ 
	public function get_all($limit = 10, $offset = 0, $user_id = null)
	{
		$query = DB::select()
			->from($this->_table)
			->order_by('date_published', 'DESC')
			->limit($limit)
			->offset($offset);
			
		if ($user_id) 
		{						
			$query->where('user_id', '=', (int) $user_id);
		}
		
		return $query->execute()->as_array();

	}
	
	/**
	 * Gets all messages from last 24 hours
	 *
	 * @param	int	$limit
	 * @param	int	$offset
	 * @return  array
	 */ 
	public function get_new($limit = 10, $offset = 0)
	{
		$query = DB::select()
			->from($this->_table)
			->where('date_published', '>', time() - 86400)
			->order_by('date_published', 'DESC')
			->limit($limit)
			->offset($offset);		
		return $query->execute()->as_array();

	}
	
	/**
     * Counts all messages
	 * 
	 * @param	int	$user_id [OPTIONAL]
	 * @return 	int
	 */
	public function count_all($user_id = null) 
	{
		$query = DB::select(DB::expr('COUNT(*) AS message_count'))
			->from($this->_table);
		
		if ($user_id) 
		{
			$query->where('user_id', '=', (int) $user_id);
		}
		return $query->execute()->get('message_count');
	}
	
	/**
     * Counts all messages from last 24 hours
	 * 
	 * @return 	int
	 */
	public function count_new() 
	{
		$query = DB::select(DB::expr('COUNT(*) AS message_count'))
			->from($this->_table)
			->where('date_published', '>', time() - 86400);
		return $query->execute()->get('message_count');
	}
	
	/**
	 * Deletes a message from the DB
	 * 
	 * @param   int   id
	 * @return  Database
	 */ 
	public function delete($id)
	{
		return DB::delete($this->_table)
			->where('id', '=', $id)
			->execute();
	}

		
}