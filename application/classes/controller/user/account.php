<?php defined('SYSPATH') or die('No direct script access.');

class Controller_User_Account extends Controller_Application{
      
	public function action_login()
	{		
		
		
		$content = View::factory('account/login');
			
		
		$this->template->content = $content;
	}
        
}  


