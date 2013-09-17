<?php

class Maintainance extends CI_Controller
{
	public function __construct()
		{

		parent:: __Construct();
        	$this->load->helper("url");
       		$this->load->model("Maintainance_Model");
        	$this->load->library("pagination");
		}
		
	public function viewForm(){
				if($this->session->userdata('user_name')) {
			$this->load->library("pagination");
			$this->load->model('Maintainance_Model');
			$data["vehicleno"]=$this->Maintainance_Model->getvehicle_No();
			$config = array();
  			$config["base_url"] = base_url() . "/maintainance/viewForm";
			$config["total_rows"] = $this->Maintainance_Model->record_count();
			$config["per_page"] = 5;
			$config["uri_segment"] = 3;
			$this->pagination->initialize($config);
			$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			$data["records"] = $this->Maintainance_Model->getAll($config["per_page"], $page);
			$data["links"] = $this->pagination->create_links();
		
	
		
                        $this->load->view('frontend/vehiclmaintanance', $data);
	}	
	else {
				redirect('user/login');
				}
		}
		public function addMaintainance()
		{       
			if($this->input->post('submit')){			
				$this->Maintainance_Model->setMaintainance();
			   	 redirect('maintainance/viewForm');
}
		}

	
		public function getMaintainance()
		{
			$this->load->model('Maintainance_Model');
			$data['records'] = $this->Maintainance_Model->getAllMaintainance();
			$this->load->view('frontend/vehiclmaintanance', $data); // load the view with the $data variable
			
			}
		public function editMaintainance($id = 0)
		{
		if($this->session->userdata('user_name')) {
			$this->load->database();
			$this->load->model('Maintainance_Model');
			$this->load->model('vehicle_model');
			$data = array();
			if($this->input->post('update'))
			{
				$this->Maintainance_Model->updateMaintainance();			
		

			}
			$data["vehicleno"]=$this->vehicle_model->getvehicle_No();
			$query = $this->Maintainance_Model->getMaintainance($id);
			$data['fid']['value'] = $query['id'];
			$data['fvehicle_id']['value'] = $query['vehicle_id'];
			$data['fengine_oil_change_date']['value'] = $query['engine_oil_change_date'];
			$data['ftyres_change_date']['value'] = $query['tyres_change_date'];
			$data['fgear_box_change_date']['value'] = $query['gear_box_change_date'];
			$data['fbattery_change_date']['value'] = $query['battery_change_date'];
			$data['fbrakes_change_date']['value'] = $query['brakes_change_date'];
			$data['fengine_oil_cost']['value'] = $query['engine_oil_cost'];
			$data['ftyres_cost']['value'] = $query['tyres_cost'];
			$data['fgear_box_cost']['value'] = $query['gear_box_cost'];
			$data['fbattery_cost']['value'] = $query['battery_cost'];
			$data['fbrakes_cost']['value'] = $query['brakes_cost'];
			$data['fservicing_date']['value'] = $query['servicing_date'];
			$data['fservicing_cost']['value'] = $query['servicing_cost'];
			
			$data['records'] = $this->Maintainance_Model->getAllMaintainance();
			
			$data['meta_title']  = 'Maintainance | VMS-1.0';
			
			$this->load->view('frontend/vehiclemaintananceedit', $data);
	}	
	else {
				redirect('user/login');
				}
		}
}

?>
