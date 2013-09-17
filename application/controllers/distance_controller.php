<?php
class Distance_Controller extends CI_Controller
{
       
	
    	public function __construct() {
        parent:: __construct();
        $this->load->helper("url");
        $this->load->model("distance_model");
        $this->load->library("pagination");
    }
		
		public function index(){
			$this->distance();
		}
	public function distance()
	{
	if($this->session->userdata('user_name')) {
			$this->load->model('distance_model');
			$config = array();
  			$config["base_url"] = base_url() . "/distance_controller/distance";
			$config["total_rows"] = $this->distance_model->record_count();
			$config["per_page"] = 5;
			$config["uri_segment"] = 3;
			$this->pagination->initialize($config);
			$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			$data["records"] = $this->distance_model->getAllDistance($config["per_page"], $page);
			$data["links"] = $this->pagination->create_links();
		 	$this->load->view('frontend/distanceMaster', $data); 
			}
			else {
				redirect('user/login');
				}
	}

	public function addDistance()
	{
		$this->load->model('distance_model');
		$this->distance_model->setDistance();
		$this->distance();
		 $this->session->set_flashdata('registrationmessage', 'Distance record saved!');
		redirect('distance_controller/distance');
	}

	function get_records(){
			echo "Distance Controller";

			$this->load->model('distance_model');
		 	
			$data['records'] = $this->distance_model->get_distance();
			$this->load->view('frontend/distanceMaster', $data); // load the view with the $data variable
			
	}

		public function edit_distance($id = 0){
			if($this->session->userdata('user_name')) {
			$this->load->database();
			$this->load->model('distance_model');
			$data = array();
			if($this->input->post('update'))
			{
				$this->distance_model->updateDistance();
			 $this->session->set_flashdata('registrationmessage', 'Distance record saved!');
			
			}
			$query = $this->distance_model->get_dist($id);
			
			$data['fid']['value'] = $query['id'];
			$data['ffrom']['value'] = $query['from_place'];
			$data['fto']['value'] = $query['to_place'];
			$data['fdistance']['value'] = $query['distance'];
			$data['fdate']['value'] = $query['create_date'];
			
			
			$data['main_content'] ='frontend/distanceMaster';
			$data['meta_title']  = 'Distance | VMS-1.0';
			$this->load->model('distance_model');
			$config = array();
  			$config["base_url"] = base_url() . "/distance_controller/distance";
			$config["total_rows"] = $this->distance_model->record_count();
			$config["per_page"] = 5;
			//$config["uri_segment"] = 3;
			$config['use_page_numbers'] = TRUE;
			$this->pagination->initialize($config);
//			$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			
			$data["records"] = $this->distance_model->getAllDistance($config["per_page"], $config['use_page_numbers']);
			
			$data["links"] = $this->pagination->create_links();
		 	  $this->session->set_flashdata('registrationmessage', 'Distance record saved!');
			$this->load->view('frontend/distanceEdit', $data);
			}
			else {
				redirect('user/login');
				}
	}
		

}

?>
