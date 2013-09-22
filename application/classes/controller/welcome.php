<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Welcome extends Controller_Application{
      
	public function action_index()
	{
       
		
		$content = View::factory('welcome')
			->bind('random', $random)
                        ->bind('datar', $datar);
		$random = rand(1, 10);
                $datar = Date::days('2', '2014');
		

		$this->template->content = $content;
	}

} // End Welcome
