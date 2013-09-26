<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Message Model
 * Handles CRUD for user messages
 */
class Model_Message  extends ORM {
	
	// Table name used by this model
	protected $_table = 'messages';
	
	/**
	 * Adds a new message for a user
	 * 
	 * @param   string   user_id
	 * @param   string   user's message
	 * @return  Database
	 */ 
        
        public function create($user_id,$content){
            $this->clear();
            $this->user_id = $user_id;
            $this->content = $content;
            $this->date_published = time();
            return $this->save();
        }
        
        public function update($message_id, $content){
            $this->find($message_id);
            $this->content = $content;
            return $this->save();
        }
        
        public function get_all($limit, $offset = 0, $user_id = NULL){
            $this->order_by('date_published', 'DESC')
                    ->limit($limit)
                    ->offset ($offset);
            if($user_id)
            {
                $this->where('user_id', '=', $user_id); 
                
            }
            return $this->find_all();
        }

        

		
}