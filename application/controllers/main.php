<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*************************************************
## @ Package Firebird
## Main Controller
## From V 1.0
*************************************************/

class Main extends CI_Controller {

	public function index(){
/*		$data = array();
		$data['main_content'] ='frontend/home';
		$data['meta_title']  = 'Carlax';
		$this->load->view('frontend/includes/template', $data);*/
		$data = array();
		$this->load->model('User_Model');
		$userdata 		= $this->User_Model->check_user();

		if($userdata){
			redirect('user/profile');
		}else{ 		$this->load->library('session');	
		$data = array();
		$data['main_content'] ='frontend/login';
		$data['meta_title']  = 'Login | Vehicle Management';
		$this->load->view('frontend/login', $data);
		 }
	}

}

/* End of file main.php */
/* Location: ./application/controllers/main.php */