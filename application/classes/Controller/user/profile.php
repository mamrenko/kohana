<?php defined('SYSPATH') or die('No direct script access.');

class Controller_User_Profile extends Controller_Application{
      
	public function action_index()
	{		
		$this->request->param('id');
		
		$content = View::factory('profile/public')
			->set('username', 'Test User')
			->bind('messages', $messages);
		
		$id = $this->request->param('id');
		
		$messages_uri = "messages/get_messages/$id";
		
		//$messages = Request::factory($messages_uri)->execute()->response;
		$messages = Request::factory($messages_uri)->execute()->body();
		$this->template->content = $content;
	}
        
}  



