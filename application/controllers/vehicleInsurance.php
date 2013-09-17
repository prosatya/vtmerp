<?php
class VehicleInsurance extends CI_Controller
{
	public function __construct() {
        parent:: __construct();
        $this->load->helper("url");
      $this->load->model("vehicle_model");
        $this->load->library("pagination");
    }/*
	 public function index(){
			$this->viewVehicleInsurance();
		}*/
		public function viewVehicleInsurance(){
			$data = array();
			$config = array();
		if($this->session->userdata('user_name')) {
			$this->load->database();
			$this->load->model('vehicle_model');
			$data["vehicleno"]=$this->vehicle_model->getvehicle_No();

			$config["base_url"] = base_url() . "/vehicleInsurance/ViewVehicleInsurance";
			$config["total_rows"] = $this->vehicle_model->record_count();
			$config["per_page"] = 5;
			$config["uri_segment"] = 3;
			$this->pagination->initialize($config);
			$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			$data["records"] = $this->vehicle_model->getAllVehicleIn($config["per_page"], $page);
			$data["links"] = $this->pagination->create_links();
		 	$this->load->view('frontend/vehicleInsuranceView',$data);
					
			
	 
			}
			else {
				redirect('user/login');
				}
		}

		public function addVehicleIn()
	{

		$this->load->database();
		$this->load->model('vehicle_model');
		$this->vehicle_model->setVehicleIn();
			$this->session->set_flashdata('registrationmessage', 'Insurance record saved!');
		redirect('vehicleInsurance/viewVehicleInsurance');
	}

	public function edit_vehicleIn($id = 0){
					if($this->session->userdata('user_name')) {
			$this->load->database();
			$this->load->model('vehicle_model');
			$data = array();
			if($this->input->post('update'))
			{
				
				$this->vehicle_model->updateVehicle();
			}
			$data["vehicleno"]=$this->vehicle_model->getvehicle_No();
			$query = $this->vehicle_model->getvehicle($id);
			$data['fid']['value'] = $query['id'];
			$data['fvehicle_id']['value'] = $query['vehicle_id'];
			$data['finsurance']['value'] = $query['insurer'];
			$data['finsurance_expiry_date']['value'] = $query['Insurance_expiry_date'];
			$data['finsurance_cost']['value'] = $query['Insurance_cost'];
			$data['finsurance_value']['value'] = $query['in_value'];
			$data['fpermit']['value'] = $query['permit'];
			$data['fpermit_expiry_date']['value'] = $query['permit_expiry_date'];
			$data['fpermit_cost']['value'] = $query['permit_cost'];
			$data['ffitness']['value'] = $query['fitness'];
			$data['ffitness_expiry_date']['value'] = $query['fitness_expiry_date'];
			$data['ffitness_cost']['value'] = $query['fitness_cost'];
			$data['froadtax']['value'] = $query['roadtax'];
			$data['froadtax_expiry_date']['value'] = $query['roadtax_expiry_date'];
			$data['froadtax_cost']['value'] = $query['roadtax_cost'];
			$data['fpuc']['value'] = $query['puc'];
			$data['fpuc_expiry_date']['value'] = $query['puc_expiry_date'];
			$data['fpuc_cost']['value'] = $query['puc_cost'];
			$config = array();
  			$config["base_url"] = base_url() . "/vehicleInsurance/edit_vehicleIn";
			$config["total_rows"] = $this->vehicle_model->record_count();
			$config["per_page"] = 5;
			//$config["uri_segment"] = 3;
			$config['use_page_numbers'] = TRUE;
			$this->pagination->initialize($config);
			
			//$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			$data["records"] = $this->vehicle_model->getAllVehicleIn($config["per_page"],$config['use_page_numbers']);
			$data["links"] = $this->pagination->create_links();
		 	$this->load->view('frontend/updateVehicle', $data); 

			
			
			//$data['meta_title']  = 'Distance | VMS-1.0';
			
		
			}
			else {
				redirect('user/login');
				}
		}

	function insuranceReport () {
					if($this->session->userdata('user_name')) {
			//$data['member']= $this->vehicle_model->alldata();
			$config = array();
  			$this->load->model('vehicle_model');
			$data["vehicleno"]=$this->vehicle_model->getvehicle_No();
			$config["base_url"] = base_url() . "/vehicleInsurance/insuranceReport";
			$config["total_rows"] = $this->vehicle_model->record_count();
			$config["per_page"] = 5;
			$config["uri_segment"] = 3;
			$this->pagination->initialize($config);
			$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			$data["records"] = $this->vehicle_model->getAllVehicle($config["per_page"], $page);
			$data["links"] = $this->pagination->create_links();
			$this->load->view('frontend/insuranceReport',$data);
			}
			else {
				redirect('user/login');
				}
		}

	function searchVehicle($id=0){
			if($this->input->post('search'))
			{
			$this->load->model('vehicle_model');
			$data["vehicleno"]=$this->vehicle_model->getvehicle_No();	
			$data["records"] = $this->vehicle_model->getVehicleS($id);		
			$this->load->view('frontend/insuranceReport',$data);
			}else{
			if($this->input->post('export'))
			{
			if($this->input->post('vehicle_id') != 'ALL')
			$this->load->helper('pdf_helper');
			$data["records"] = $this->vehicle_model->getVehicleS($id);
			$this->load->view('reports/insurancePdfReport',$data);
			}else{
			$this->load->helper('pdf_helper');
			$data["records"] = $this->vehicle_model->getAllV();
			$this->load->view('reports/insurancePdfReport',$data);
			}
			}			
			}
	function insurancePDFReport () 
	{
		$data["records"] = $this->vehicle_model->getAllV();
		$this->load->view('reports/insurancePdfReport',$data);
		
	}
		
		function insuranceReportEx () {
					if($this->session->userdata('user_name')) {
			//$data['member']= $this->vehicle_model->alldata();
			$config = array();
  			$this->load->model('vehicle_model');
			$data["vehicleno"]=$this->vehicle_model->getvehicle_No();
			$config["base_url"] = base_url() . "/vehicleInsurance/insurance_expenses_report";
			$config["total_rows"] = $this->vehicle_model->record_count();
			$config["per_page"] = 5;
			$config["uri_segment"] = 3;
			$this->pagination->initialize($config);
			$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			$data["records"] = $this->vehicle_model->getAllVehicle($config["per_page"], $page);		
			$data["links"] = $this->pagination->create_links();
			$this->load->view('frontend/insurance_expenses_report',$data);
			}
			else {
				redirect('user/login');
				}
		}
	
		function searchVehicleEx($id=0){
			if($this->input->post('search'))
			{
			$this->load->model('vehicle_model');
			$data["vehicleno"]=$this->vehicle_model->getvehicle_No();	
			$data["records"] = $this->vehicle_model->getVehicleEx($id);
			$this->load->view('frontend/insurance_expenses_report',$data);
			}else{
			if($this->input->post('export'))
			{
			if($this->input->post('vehicle_id') != 'ALL')
			$this->load->helper('pdf_helper');
			$data["records"] = $this->vehicle_model->getVehicleEx($id);
			$this->load->view('reports/insurancePdfReportEx',$data);
			}else{
			$this->load->helper('pdf_helper');
			$data["records"] = $this->vehicle_model->getAllV();
			$this->load->view('reports/insurancePdfReportEx',$data);
			}
			}			
			}
}
 ?>
