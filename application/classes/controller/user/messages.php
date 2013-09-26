<?php defined('SYSPATH') or die('No direct script access.');

class Controller_User_Messages extends Controller_Application {

	public function action_index()
	{		
		URL::redirect();	
   	}

	public function action_get_messages() 
	{
		
		$messages = new Model_Message;
		
		$user_id = $this->request->param('id');
		
		$message_count = $messages->count_all($user_id);
		
		$pagination = Pagination::factory(array(
  			'total_items'    => $message_count,
  			'items_per_page' => 2,
  		));
		
		$pager_links = $pagination->render();
		
		$messages = $messages->get_all($pagination->items_per_page, $pagination->offset, $user_id);
	
		$this->template->content = View::factory('profile/messages')
			->set('messages', $messages)
			->set('pager_links', $pager_links);
	}
	
	public function action_new() {
		$messages = new Model_Message;
		
		$message_count = $messages->count_new();
		
		$pagination = Pagination::factory(array(
  			'total_items'    => $message_count,
  			'items_per_page' => 2,
  		));
		
		$pager_links = $pagination->render();
		
		$messages = $messages->get_new($pagination->items_per_page, $pagination->offset);
	
		$this->template->content = View::factory('profile/messages')
			->set('messages', $messages)
			->set('pager_links', $pager_links);
	}
	
	public function action_add() 
	{
		$messages = new Model_Message;
		
		$user_id = $this->request->param('id');
		
		$this->template->content = View::factory('profile/message_form');
		
		if (isset($_POST['content']))
		{
			$messages->add($user_id, (string) $_POST['content']);
			//$redirect = URL::site("messages/get_messages/$user_id");
                        $redirect = ("messages/get_messages/$user_id");
			Request::instance()->redirect($redirect);
		}		
		
	}
	
	public function action_edit() 
	{
		
		$user_id = $this->request->param('user_id');
		
		$message_id = $this->request->param('message_id');
		
		$messages = new Model_Message;
		
		$message = $messages->get_message($message_id);
		
		if ($message['user_id'] != $user_id) {
			throw new Exception("User is not owner of the message");
		}
		
		$this->template->content = View::factory('profile/message_form')
			->bind('value', $message['content']);
		
		if ($_POST && $_POST['content'])
		{
			$messages->edit($message_id, $_POST['content']);
			$redirect = ("messages/get_messages/$user_id");
			Request::instance()->redirect($redirect);
		}		
		
	}
	
	public function action_delete() 
	{
		
		$user_id = $this->request->param('user_id');
		
		$message_id = $this->request->param('message_id');
		
		$messages = new Model_Message;
		
		$message = $messages->get_message($message_id);
		
		if ($message['user_id'] != $user_id) {
			throw new Exception("User is not owner of the message");
		}

		$messages->delete($message_id);
		
		$redirect = ("messages/get_messages/$user_id");
		Request::instance()->redirect($redirect);
		
	}
	
}