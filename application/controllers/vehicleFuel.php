<?php
class VehicleFuel extends CI_Controller
{
	public function __construct() {

        parent:: __construct();
        $this->load->helper("url");
      $this->load->model("fuel_model");
        $this->load->library("pagination");


    }
	 public function index(){
			$this->viewVehicleFuel();
		}
		public function viewVehicleFuel(){
		if($this->session->userdata('user_name')) {
			$this->load->database();
			$this->load->model('fuel_model');
			$data["vehicleno"]=$this->fuel_model->getvehicle_No();
			$data["vendorName"]=$this->fuel_model->getVendorName();
			
			$config = array();
  			$config["base_url"] = base_url() . "/vehicleFuel/viewVehicleFuel";
			$config["total_rows"] = $this->fuel_model->record_count();
			$config["per_page"] = 5;
			$config["uri_segment"] = 3;
			$this->pagination->initialize($config);
			$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			$data["records"] = $this->fuel_model->getAllVehicleFuel($config["per_page"], $page);
			$data["links"] = $this->pagination->create_links();
			
		 	$this->load->view('frontend/vehicleFuelView', $data);
				 
			}
			else {
				redirect('user/login');
				}
		}

		public function addVehicleFuel()
	{
		
		$this->load->database();
		$this->load->model('fuel_model');
		$this->fuel_model->setVehicleFuel();
					$this->session->set_flashdata('registrationmessage', 'Fuel record saved!');
				$this->viewVehicleFuel();		

	}

	public function edit_vehicleFuel($id = 0){
		if($this->session->userdata('user_name')) {
			$this->load->database();
			$this->load->model('fuel_model');
			$data = array();
			if($this->input->post('updatefuel'))
			{
				
				
				$this->fuel_model->updateVehicleFuel();
					$this->session->set_flashdata('registrationmessage', 'Fuel record saved!');
			}
			$data["vehicleno"]=$this->fuel_model->getvehicle_No();
			$data["vendorName"]=$this->fuel_model->getVendorName();
			$query = $this->fuel_model->getVehicleFuel($id);
			$data['fid']['value'] = $query['id'];
			$data['fdiesel_vendor']['value'] = $query['diesel_vendor'];
			$data['fmaterial_supply']['value'] = $query['material_supply'];	
			$data['fmobile']['value'] = $query['mobile'];
			$data['fdiesel_slip_no']['value'] = $query['diesel_slip_no'];
			$data['fstart_reading']['value'] = $query['start_reading'];
			$data['fclose_reading']['value'] = $query['close_reading'];
			$data['ftotal_reading']['value'] = $query['total_reading'];
			$data['faverage']['value'] = $query['average'];
			
			$data['fopening_km']['value'] = $query['opening_km'];
			$data['fclosing_km']['value'] = $query['closing_km'];
			$data['fquantity']['value'] = $query['quantity'];
			$config = array();
  			$config["base_url"] = base_url() . "/vehicleFuel/edit_vehicleFuel";
			$config["total_rows"] = $this->fuel_model->record_count();
			$config["per_page"] = 5;
			//$config["uri_segment"] = 3;
			$config['use_page_numbers'] = TRUE;
			$this->pagination->initialize($config);
			//$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			$data["records"] = $this->fuel_model->getAllVehicleFuel($config["per_page"],$config['use_page_numbers']);
			$data["links"] = $this->pagination->create_links();
		 	$this->load->view('frontend/updateVehicleFuel', $data); 

			
			
			//$data['meta_title']  = 'Distance | VMS-1.0';
			
		
		}
			else {
				redirect('user/login');
				}
		}
	function vehicleReport () {
			$this->load->model('fuel_model');
			$config = array();
			$data["vehicleno"]=$this->fuel_model->getvehicle_No();
  			$config["base_url"] = base_url() . "/vehicleFuel/vehicleReport";
			$config["total_rows"] = $this->fuel_model->record_count();
			$config["per_page"] = 15;
			$config["uri_segment"] = 3;
			$this->pagination->initialize($config);
			$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			$data["records"] = $this->fuel_model->getAllVehicleFuel($config["per_page"], $page);
			$data["links"] = $this->pagination->create_links();
			$this->load->view('frontend/vehicle_reportFuel',$data);
		
	}
	function vehiclePDFReport () 
	{
		
		$data["records"] = $this->fuel_model->getAll();
		$this->load->view('reports/vehiclePdfReportFuel',$data);
		
	}	
		function searchFuel()
		{
		if($this->session->userdata('user_name')) {
			$this->load->helper('pdf');
			if($this->input->post('Search'))
			{
				if($this->input->post('vehicle_id') != "0")
				{	
					$id=$this->input->post('vehicle_id');
					$fromDate=$this->input->post('from_date');
					$todate=$this->input->post('to_date');
					$data['ids']=$id;
					$data['fromDates']=$fromDate;
					$data['todates']=$todate;
					$this->load->database();
					$this->load->model('fuel_model');
					$data["vehicleno"]=$this->fuel_model->getvehicle_No();
					$config = array();
					$config["base_url"] = base_url() . "/vehicleFuel/vehicleReport";
					$config["total_rows"] = $this->fuel_model->record_count();
					$config["per_page"] = 15;
					$config["uri_segment"] = 3;
					$this->pagination->initialize($config);
					$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
					$data['records']=$this->fuel_model->search($id,$fromDate,$todate);
					$data["links"] = $this->pagination->create_links();
				}
				elseif($this->input->post('from_date') != "" || $this->input->post('to_date') != "")
				{
				$fromDate=$this->input->post('from_date');
				$todate=$this->input->post('to_date');
				$data['fromDates']=$fromDate;
				$data['todates']=$todate;
				$this->load->database();
				$this->load->model('fuel_model');
				$data["vehicleno"]=$this->fuel_model->getvehicle_No();
				$config = array();
				$config["base_url"] = base_url() . "/vehicleFuel/vehicleReport";
				$config["total_rows"] = $this->fuel_model->record_count();
				$config["per_page"] = 15;
				$config["uri_segment"] = 3;
				$this->pagination->initialize($config);
				$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
				$data['records']=$this->fuel_model->search1($fromDate,$todate);
				$data["links"] = $this->pagination->create_links();
				}else
				{
				$config = array();
				$data["vehicleno"]=$this->fuel_model->getvehicle_No();
				$config["base_url"] = base_url() . "/vehicleFuel/vehicleReport";
				$config["total_rows"] = $this->fuel_model->record_count();
				$config["per_page"] = 15;
				$config["uri_segment"] = 3;
				$this->pagination->initialize($config);
				$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
				$data["records"] = $this->fuel_model->getAllVehicleFuel($config["per_page"], $page);
				$data["links"] = $this->pagination->create_links();
				}
				$this->load->view('frontend/vehicle_reportFuel',$data);
			}//search

				else{
				if($this->input->post('vehicle_id') != "0")
				{
					$id=$this->input->post('vehicle_id');
					$fromDate=$this->input->post('from_date');
					$todate=$this->input->post('to_date');
					$data['records']=$this->fuel_model->search($id);
				}elseif($this->input->post('from_date') != "" || $this->input->post('to_date') != "")
				{
					$id=$this->input->post('vehicle_id');
					$fromDate=$this->input->post('from_date');
					$todate=$this->input->post('to_date');
					$data['records']=$this->fuel_model->search1($fromDate,$todate);
				}
				else{
					$data["records"] = $this->fuel_model->getAllVehicleFuels();
				}
				$this->load->view('reports/vehiclePdfReportFuel',$data);
			}//session	
}
			else {
				redirect('user/login');
				}
		}//function

		function vehiclePDFReportSearch ($ids,$formDates,$todates) 
		{
			$data['records']=$this->fuel_model->search($id,$fromDate,$todate);
			$this->load->view('reports/vehiclePdfReportFuel',$data);
		}	
}
 ?>
