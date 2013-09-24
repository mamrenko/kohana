<?php defined('SYSPATH') or die('No direct script access.');
class Model_Message{
    protected $_table = 'messages';
    public function add($user_id, $message)
    {
        $data = array('user_id', 'message', 'date_published');
        return DB::insert($this->_table, $data)
            ->values($user_id, $message, time())
            ->execute();
    }
    
    public function get_all($limit = 10, $offset = 0)
	{
		return DB::select()
			->from($this->_table)
			->order_by('date_published')
			->limit($limit)
			->offset($offset)
			->execute()
			->as_array();
	}
    
    public function delete($user_id, $message)
    {
        return DB::delete($this->_table)
                ->where('user_id', '=', $user_id)
                ->where('message', '=', $message)
                ->execute();
        
    }
    public function count_all()
    {
        return DB::select(DB::expr('COUNT(*) AS message_count'))
                ->from($this->_table)
                ->execute()
                ->get('message_count');
    }
    
}
