<?php defined('SYSPATH') or die('No direct script access.');

class Controller_User_Messages extends Controller_Application {

	public $assert_auth_actions = array(
		'add' => array('login'),
		'edit' => array('login'),
		'delete' => array('login')
	);

	public function action_index()
	{		
		URL::redirect();	
   	}

	public function action_get_messages() 
	{
		
		$messages = new Model_Message;
		
		$user_id = $this->request->param('id');
		
		if ($user_id) 
		{
			$message_count = $messages->where('user_id', '=', $user_id)->count_all();	
		}
		else 
		{
			$message_count = $messages->count_all();
		}
		
		$pagination = Pagination::factory(array(
  			'total_items'    => $message_count,
  			'items_per_page' => 3,
  		));
		
		$pager_links = $pagination->render();
		
		$messages = $messages->get_all($pagination->items_per_page, $pagination->offset, $user_id);
	
		$this->template->content = View::factory('profile/messages')
			->set('messages', $messages)
			->set('pager_links', $pager_links);
	}
	
	public function action_new() {
		$messages = new Model_Message;
		
		$message_count = $messages->where('date_published', '>', time() - 86400)->count_all();
		
		$pagination = Pagination::factory(array(
  			'total_items'    => $message_count,
  			'items_per_page' => 5,
  		));
		
		$pager_links = $pagination->render();
		
		$messages = $messages->get_new($pagination->items_per_page, $pagination->offset);
	
		$this->template->content = View::factory('profile/messages')
			->set('messages', $messages)
			->set('pager_links', $pager_links);
	}
	
	public function action_add() 
	{
		//$user = Auth::instance()->get_user();

		$message = new Model_Message;
		
		$user_id = $this->request->param('id');
		
		//$message->user = $user;
		
		$this->template->content = View::factory('profile/message_form')
			->bind('errors', $errors);
		
		if ($_POST)
		{
                        $_POST['user_id'] = $user_id;
			$_POST['date_published'] = time();
			$message->values($_POST);
			if ($message->check())
			{
				$message->save();
				$redirect = ("messages/get_messages/$user_id");
				Request::instance()->redirect($redirect);
			}
			else 
			{
				$errors = $message->validate()->errors('messages/add');
			}

		}		
		
	}
	
	public function action_edit() 
	{
		
		$user = Auth::instance()->get_user();
		
		$message_id = $this->request->param('message_id');
		
		$messages = new Model_Message;
		
		$message = $messages->find($message_id);
		
		if ($message->user_id != $user_id) {
			throw new Exception("User is not owner of the message");
		}
		
		$this->template->content = View::factory('profile/message_form')
			->set('value', $message->content);
		
		if ($_POST && $_POST['content'])
		{
			$messages->edit($message_id, $_POST['content']);
			$redirect = url::site("messages/get_messages/$user_id");
			Request::instance()->redirect($redirect);
		}		
		
	}
	
	public function action_delete() 
	{
		
		$user = Auth::instance()->get_user();
		
		$message_id = $this->request->param('message_id');
		
		$messages = new Model_Message;
		
		$message->find($message_id);
		
		if ($message->user_id != $user_id) {
			throw new Exception("User is not owner of the message");
		}

		$messages->delete($message_id);
		
		$redirect = url::site("messages/get_messages/$user_id");
		Request::instance()->redirect($redirect);
		
	}
	
}