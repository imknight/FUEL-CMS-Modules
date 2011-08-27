<?php
require_once(FUEL_PATH.'/libraries/Fuel_base_controller.php');

class Dashboard extends Fuel_base_controller {
	
	function __construct()
	{
		parent::__construct();
	}
	
	function index()
	{
		$session_key = $this->fuel_auth->get_session_namespace();
		$user_data = $this->session->userdata($session_key);

		$this->load->module_model(FLASH_NEWS_FOLDER, 'flash_news_model');
		$vars = '';
		$vars['latest_news'] = $this->flash_news_model->find_all_array(array('active'=>'yes'),'date_added desc');
		$flash_news = $this->flash_news_model->find_one_array(array('active'=>'yes','sticky'=>'yes'),'date_added desc');
		//need to clear off from the session if changes has done
		if ($flash_news) {	
			$user_data['flash_news'] ='<strong>'.$flash_news['category'].'</strong> : '.$flash_news['news'];				
		}else{
			$user_data['flash_news'] = '';
		}
		$this->session->set_userdata($session_key, $user_data);
		$this->load->view('dashboard_view', $vars);
	}

}

/* End of file dashboard.php */
/* Location: ./fuel/modules/backup/controllers/dashboard.php */
