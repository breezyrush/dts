<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

private $user_id;

	function __construct() {
		parent::__construct();

		$this->load->model('home_model');		

		$this->data['page_title'] = 'DTS - Home';
		$this->data['jquery_enabled'] = true;
		$this->data['js_scripts'] = array(base_url() . 'js/home_script.js');
		$this->data['cs_scripts'] = array(base_url() . 'css/home_style.css');
	}
	
	public function index() {
		
		
		if (!$this->session->userdata('is_logged_in')) {
			redirect('login');
		}
		else {
			$this->data['logged_in'] = true;
<<<<<<< HEAD
/*			echo "Welcome! " . $this->session->userdata('username'); */
			$this->data['main_content'] = 'home_view';
			$this->load->view('includes/template.php', $this->data);
=======
			$this->data['username'] = $this->session->userdata('username');
			
			$user_id = $this->home_model->get_user_id();
			
			$this->data['user_info'] = $this->home_model->get_user_info($user_id);
			// $this->data['first_name'] = $this->home_model->first_name;
			// $this->data['last_name'] = $this->home_model->last_name;
			// $this->data['profession'] = $this->home_model->profession;
			// $this->data['location'] = $this->home_model->location;
			//$this->home_model->get_tracking_ids();
			
			//$this->data['feeds'] = array();




			$this->data['main_content'] = 'home_view';
			$this->load->view('includes/template.php', $this->data);
			
>>>>>>> upstream/master

		}
		$this->load->view('send_view');
		
	}
	
	public function page() {
		
	}
	
	public function logout() {
		$this->session->set_userdata(array(
				'username' => '',
				'is_logged_in' => '' 
			));
		$this->session->sess_destroy();
		redirect('login');
	}
	

}


?>
