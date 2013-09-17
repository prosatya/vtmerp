<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Vehicle extends CI_Controller {
		public function __construct()
      	 {
            parent::__construct();
          $this->load->model('AddVehicle_Model');
		//   $this->load->helper("url");
            $this->load->library("pagination");
		   
        }
		public function index(){
			$this->viewForm();
		}
		public function viewForm(){
		if($this->session->userdata('user_name')) {
			$this->load->database();
			$this->load->model('AddVehicle_Model');
			$data["vendorName"]=$this->AddVehicle_Model->getVendorName();
	
			$config = array();
  			$config["base_url"] = base_url() . "/vehicle/viewForm";
			$config["total_rows"] = $this->AddVehicle_Model->record_count();
			$config["per_page"] = 5;
			$config["uri_segment"] = 3;
			$this->pagination->initialize($config);
			$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			$data["records"] = $this->AddVehicle_Model->getAllVehicle($config["per_page"], $page);
			$data["links"] = $this->pagination->create_links();
		
            $this->load->view('frontend/vehicleEntry', $data);
	}
	else {
				redirect('user/login');
				}
		}
	public function addVehicle()
		{      


		 $this->load->model("addvehicle_model");
			$this->load->helper("url");
			if($this->input->post('registration')){			
				$this->addvehicle_model->setVehicle();
			redirect('vehicle/viewForm');
}
		}
			public function getVehicle()
		{
			$this->load->model('AddVehicle_Model');
			$data['records'] = $this->AddVehicle_Model->getAllVehicle();
			$this->load->view('frontend/vehicleEntry', $data); // load the view with the $data variable
			}
	public function editVehicle($id = 0)
		{
		if($this->session->userdata('user_name')) {
			$this->load->database();
			$this->load->model('addvehicle_model');
			$data = array();
			if($this->input->post('update'))
			{
				$this->addvehicle_model->updateVehicle();			
		       $this->session->set_flashdata('registrationmessage', 'Vehicle record saved!');
				}
				//$data["vehicle_type"]=$this->addvehicle_model->getvehicle_type();
				$data["vendorName"]=$this->addvehicle_model->getVendorName();
				$query = $this->addvehicle_model->getVehicle($id);
				$data['fid']['value'] = $query['id'];
				$data['fvehicle_no']['value'] = $query['vehicle_no'];
				$data['fvehicle_type']['value'] = $query['vehicle_type'];
				$data['fmake_year']['value'] = $query['make_year'];
				$data['fengine_no']['value'] = $query['engine_no'];
				$data['fcolor']['value'] = $query['color'];
				$data['fchasis_no']['value'] = $query['chasis_no'];
				$data['fvehicle_ownership']['value'] = $query['vehicle_ownership'];
				$data['fvendor_id']['value'] = $query['vendor_id'];
				$data['flease_start_date']['value'] = $query['lease_start_date'];
				$data['flease_end_date']['value'] = $query['lease_end_date'];
				$data['fcost']['value'] = $query['cost'];
				$data['fmeter_type']['value'] = $query['meter_type'];
				$data['fweight_capacity']['value'] = $query['weight_capacity'];
				$data['fmodel_no']['value'] = $query['model_no'];
				$data['fmake']['value'] = $query['make'];
				$data['fdescription']['value'] = $query['description'];
				$config = array();
	  			$config["base_url"] = base_url() . "/vehicle/viewForm";
				$config["total_rows"] = $this->AddVehicle_Model->record_count();
				$config["per_page"] = 5;
				$config["uri_segment"] = 3;
				$config['use_page_numbers'] = TRUE;
				$this->pagination->initialize($config);
				$data["records"] = $this->AddVehicle_Model->getAllVehicle($config["per_page"], $config['use_page_numbers']);
				$data["links"] = $this->pagination->create_links();
				$this->load->view('frontend/vehicleEdit', $data);
}
	else {
				redirect('user/login');
				}
		}
		public function vehicleReport()
		{
				$config = array();
				$config["base_url"] = base_url() . "/vehicle/vehicleReport";
				$config["total_rows"] = $this->AddVehicle_Model->record_count();
				$config["per_page"] = 15;
				$config["uri_segment"] = 3;
				$this->pagination->initialize($config);
				$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
				$data["records"] = $this->AddVehicle_Model->getAllVehicle($config["per_page"], $page);
				$data["links"] = $this->pagination->create_links();
				$this->load->view('frontend/vehicleReports', $data);
		}
		public function vehiclePDFReports()
		{
			 $this->load->helper('pdf_helper');
			 $this->load->model('AddVehicle_Model');
			 $data['records'] = $this->AddVehicle_Model->getAllVehicle();
			 $this->load->view('reports/vehiclePDFReport',$data); 
		}	
}
?>
