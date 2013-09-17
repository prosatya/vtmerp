<?php

class Vehicletrip extends CI_Controller
{
	public function __construct()
		{

		parent:: __Construct();
        	$this->load->helper("url");
       		$this->load->model("Vehicletrip_Model");
        	$this->load->library("pagination");
		}
		
	public function viewForm(){
				if($this->session->userdata('user_name')) {
		$this->load->library("pagination");
		$this->load->model('Vehicletrip_Model');
		$data["vehicleno"]=$this->Vehicletrip_Model->getvehicle_No();
		$data["driverN"]=$this->Vehicletrip_Model->getDriverN();
		$data["helperN"]=$this->Vehicletrip_Model->getHelperN();
		$data["from"]=$this->Vehicletrip_Model->getFrom();
		$data["to"]=$this->Vehicletrip_Model->getTo();
			$config = array();
  			$config["base_url"] = base_url() . "/vehicletrip/viewForm";
			$config["total_rows"] = $this->Vehicletrip_Model->record_count();
			$config["per_page"] = 5;
			$config["uri_segment"] = 3;
			$this->pagination->initialize($config);
			$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			$data["records"] = $this->Vehicletrip_Model->getAll($config["per_page"], $page);
			$data["links"] = $this->pagination->create_links();
		
	
		
                        $this->load->view('frontend/vehicle_trip', $data);
	}
			else {
				redirect('user/login');
				}
		}
	
		public function addVehicletrip()
		{       
			if($this->input->post('submit')){			
				$this->Vehicletrip_Model->setVehicletrip();
					$this->session->set_flashdata('registrationmessage', 'Trip record saved!');
			    redirect('vehicletrip/viewForm');
}
		}

		public function getVehicletrip()
		{
			$this->load->model('Vehicletrip_Model');
			$data['records'] = $this->Vehicletrip_Model->getAllVehicletrip();
			$this->load->view('frontend/vehicle_trip', $data); // load the view with the $data variable
			
			}
		public function editVehicletrip($id = 0)
		{
				if($this->session->userdata('user_name')) {
			$this->load->database();
			$this->load->model('Vehicletrip_Model');
			$data = array();
			if($this->input->post('update'))
			{
				$this->Vehicletrip_Model->updateVehicletrip();		
					$this->session->set_flashdata('registrationmessage', 'Trip record saved!');	
					

			}
			$data["vehicleno"]=$this->Vehicletrip_Model->getvehicle_No();
			$data["driverN"]=$this->Vehicletrip_Model->getDriverN();
			$data["helperN"]=$this->Vehicletrip_Model->getHelperN();
			$data["from"]=$this->Vehicletrip_Model->getFrom();
			$data["to"]=$this->Vehicletrip_Model->getTo();
			$query = $this->Vehicletrip_Model->getVehicletrip($id);
			$data['fid']['value'] = $query['id'];
			$data['fvehicle_id']['value'] = $query['vehicle_id'];
			$data['fdriver_id']['value'] = $query['driver_id'];
			$data['fhelper_id']['value'] = $query['helper_id'];
			$data['fplace_from']['value'] = $query['place_from'];
			$data['fplace_to']['value'] = $query['place_to'];
			$data['fdistance']['value'] = $query['distance'];
			$data['fweight']['value'] = $query['weight'];
			$data['fmaterial']['value'] = $query['material'];
			$data['fslip_no']['value'] = $query['slip_no'];
			$data['froyalty_no']['value'] = $query['royalty_no'];
			$data['froyalty_amount']['value'] = $query['royalty_amount'];	$config = array();
  			$config["base_url"] = base_url() . "/vehicletrip/viewForm";
			$config["total_rows"] = $this->Vehicletrip_Model->record_count();
			$config["per_page"] = 5;
			//$config["uri_segment"] = 3;
			$config['use_page_numbers'] = TRUE;
			$this->pagination->initialize($config);
			//$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			$data["records"] = $this->Vehicletrip_Model->getAll($config["per_page"], $config['use_page_numbers']);
			
			$data["links"] = $this->pagination->create_links();
			$data['meta_title']  = 'Vehicletrip | VMS-1.0';
			
			$this->load->view('frontend/vehicle_trip_edit', $data);
	}
			else {
				redirect('user/login');
				}
		}
	
		
}

?>
