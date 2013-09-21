<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Application extends Controller_Template {

	
        
        public function before() {
            parent::before();
            View::bind_global('site_name', $site_name);
            $site_name = 'Egotist Beta';
            
            $this->template->content = '';
            $this->template->styles = array('reset', 'common');
            $this->template->scripts = array();
        }
            
	
} 
