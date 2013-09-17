<?php

class Vendor extends CI_Controller
{
	public function __construct()
		{

		parent:: __Construct();
        	$this->load->helper("url");
       		$this->load->model("Vendor_Model");
        	$this->load->library("pagination");
		}
		
	public function viewForm(){
				if($this->session->userdata('user_name')) {
		$this->load->library("pagination");
		$this->load->model('Vendor_Model');
			$config = array();
  			$config["base_url"] = base_url() . "/vendor/viewForm";
			$config["total_rows"] = $this->Vendor_Model->record_count();
			$config["per_page"] = 5;
			$config["uri_segment"] = 3;
			$this->pagination->initialize($config);
			$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			$data["records"] = $this->Vendor_Model->getAll($config["per_page"], $page);
			$data["links"] = $this->pagination->create_links();
            $this->load->view('frontend/vendorMaster', $data);
	}
			else {
				redirect('user/login');
				}
		}
		public function addVendor()
		{       
			if($this->input->post('vendor')){			
				$this->Vendor_Model->setVendor();
				$this->session->set_flashdata('registrationmessage', 'Vendor record saved!');
			redirect('vendor/viewForm');
}
		}

	
		public function getVendor()
		{
			$this->load->model('Vendor_Model');
			$data['records'] = $this->Vendor_Model->getAllVendor();
			$this->load->view('frontend/vendorMaster', $data); // load the view with the $data variable
			
			}
		public function editVendor($id = 0)
		{
				if($this->session->userdata('user_name')) {
			$this->load->database();
			$this->load->model('Vendor_Model');
			$data = array();
			if($this->input->post('update'))
			{
				$this->Vendor_Model->updateVendor();	
				$this->session->set_flashdata('registrationmessage', 'Vendor record saved!');		
				redirect('vendor/viewForm');

			} 
			$query = $this->Vendor_Model->getVendor($id);
			$data['fid']['value'] = $query['id'];
			$data['fvendor_name']['value'] = $query['vendor_name'];
			$data['faddress1']['value'] = $query['address1'];
			$data['faddress2']['value'] = $query['address2'];
			$data['fcity']['value'] = $query['city'];
			$data['fstate']['value'] = $query['state'];
			$data['fpincode']['value'] = $query['pincode'];
			$data['fphone']['value'] = $query['phone'];
			$data['fmobile']['value'] = $query['mobile'];
			$data['fnotes']['value'] = $query['notes'];
			$data['fmaterial_supply']['value'] = $query['material_supply'];
			$data['main_content'] ='frontend/distanceMaster';
			$data['meta_title']  = 'Distance | VMS-1.0';
			$config = array();
  			$config["base_url"] = base_url() . "/vendor/viewForm";
			$config["total_rows"] = $this->Vendor_Model->record_count();
			$config["per_page"] = 5;
			$config['use_page_numbers'] = TRUE;
			$this->pagination->initialize($config);
			$data["records"] = $this->Vendor_Model->getAll($config["per_page"],$config['use_page_numbers']);
			$data["links"] = $this->pagination->create_links();
			
			$this->load->view('frontend/vendor_edit', $data);
}
			else {
				redirect('user/login');
				}
		}
		public function statusVendor($id = 0){
			$this->load->model('Vendor_Model');
			$this->Vendor_Model->changeStatus($id);
			redirect('vendor/viewForm');
		}
		
		public function vendorReports()
		{
			$config = array();
  			$config["base_url"] = base_url() . "/vendor/vendorReports";
			$config["total_rows"] = $this->Vendor_Model->record_count();
			$config["per_page"] = 15;
			$config["uri_segment"] = 3;
			$this->pagination->initialize($config);
			$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			$data["records"] = $this->Vendor_Model->getAll($config["per_page"], $page);
			$data["links"] = $this->pagination->create_links();
            $this->load->view('frontend/vendorReport', $data);
		}
		public function vendorPDFReports()
		{
			 $this->load->helper('pdf_helper');
			 $this->load->model('Vendor_Model');
			 $data['records'] = $this->Vendor_Model->getAllVendor();
			 $this->load->view('reports/vendorPDFReport',$data); 
			 // load the view with the $data variable
			
		}
}

?>
