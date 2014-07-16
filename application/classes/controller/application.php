<?php defined('SYSPATH') or die('No direct script access.');

 abstract class Controller_Application extends Controller_Template{
     public $assert_auth = FALSE;
     public $assert_auth_actions = FALSE;


     public function before() {
            parent::before();
            $this->_user_auth();
            View::bind_global('site_name', $site_name);
            $site_name = 'Egotist Beta';
            
            $this->template->content = '';
            $this->template->styles = array(
                'reset',
                'common',
                'select2.css');
            $this->template->scripts = array(
                'jquery',
                'jquery.dataTables',
                'tabl',
                'select2.js'
                
                );
        }
        protected function _user_auth() 
	{
		$action_name = Request::instance()->action;
		
		if (($this->assert_auth !== FALSE  && Auth::instance()->logged_in($this->assert_auth) === FALSE)
		|| (is_array($this->assert_auth_actions) && array_key_exists($action_name, $this->assert_auth_actions)
		&& Auth::instance()->logged_in($this->assert_auth_actions[$action_name]) === FALSE)) 
		{
			if (Auth::instance()->logged_in()) 
			{
				Request::instance()
					->redirect('admin/auth/noaccess');
			} 
			else 
			{
				Request::instance()
					->redirect('login');
			}
		}
	}

}

