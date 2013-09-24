<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Welcome extends Controller_Application{
      
	public function action_index()
	{		
		$content = View::factory('welcome')
			->bind('messages', $messages)
			->bind('pager_links', $pager_links);
			
		$message = new Model_Message;
		
		$message_count = $message->count_all();
	
		$pagination = Pagination::factory(array(
			'total_items'    => $message_count,
			'items_per_page' => 3,
		));
		
		$pager_links = $pagination->render();
	
		$messages = $message->get_all($pagination->items_per_page, $pagination->offset);

		$this->template->content = $content;
	}
} // End Welcome
