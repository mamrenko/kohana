<?php defined('SYSPATH') or die('No direct script access.');

class Controller_User_Messages extends Controller{
      
	public function action_index()
	{
        
            URL::redirect();
	}
        
        
       public function action_get_messages() 
	{
		$id = $this->request->param('id');
	
		$messages = array(
			'1' => array(
				'This is test message one for user 1',
				'This is test message two for user 1',
				'This is test message three for user 1'
			),
			'2' => array(
				'This is test message one for user 2',
				'This is test message two for user 2',
				'This is test message three for user 2'
			)
		);
	
		$this->request->response = View::factory('profile/messages')
			->set('messages', $messages[$id]);
	}

} 
