<?php

class Driver extends CI_Controller
{
	public function __construct()
		{
		parent:: __Construct();
        	$this->load->helper("url");
       		$this->load->model("Driver_Model");
        	$this->load->library("pagination");
		}
	public function index(){
			$this->viewForm();
		}
		public function viewForm(){
		if($this->session->userdata('user_name')) {
			$this->load->database();
			
		   $this->load->model('Driver_Model');
			$config = array();
  			$config["base_url"] = base_url() . "/driver/viewForm";
			$config["total_rows"] = $this->Driver_Model->record_count();
			$config["per_page"] = 5;
			$config["uri_segment"] = 3;
			$this->pagination->initialize($config);
			$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			$data["records"] = $this->Driver_Model->getAllDriver($config["per_page"], $page);
			$data["links"] = $this->pagination->create_links();
		
                        $this->load->view('frontend/driverEntry', $data);
	}	
	else {
				redirect('user/login');
				}
		}
	
		public function addDriver()
		{
		
		$this->load->database();
		$this->load->model('Driver_Model');
		$this->Driver_Model->setDriver();
					$this->session->set_flashdata('registrationmessage', 'Fuel record saved!');
		redirect('driver/viewForm');
	}
	
		public function editDriver($id = 0){
		if($this->session->userdata('user_name')) {
			$this->load->database();
			$this->load->model('Driver_Model');
			$data = array();
			if($this->input->post('update'))
			{	
				$this->load->library('upload');
		 		$config['upload_path'] = './uploads/'; 
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['file_name']	= rand(100,10000000000);
				$config['max_size'] = '500';
				$config['max_width'] = '1024';
				$config['max_height'] = '768';
				$config['overwrite']	=	TRUE;
		
				
				$this->upload->initialize($config);
				$field_name = "image";
				$img = $this->input->post('image');
				if (!$this->upload->do_upload($field_name))
				{
			       // $error=array('error'=>$this->upload->display_errors());
					$this->session->set_flashdata('errormessage', $this->upload->display_errors());
				}
				else
				{
				$file_data = $this->upload->data();
				$path_info = pathinfo($_FILES["image"]["name"]); // "userfile" is the form input field name
				$fileExtension = $path_info['extension'];  
				$data = array('driverImage'	=> base_url().'uploads/'.$config['file_name'].'.'.$fileExtension,);
				$this->db->where('id', $this->input->post('id'));
				$this->db->update('driver', $data);		
				}
				$this->Driver_Model->updateDriver();
					$this->session->set_flashdata('registrationmessage', 'Fuel record saved!');
			}
			$query = $this->Driver_Model->getDriver($id);
			$data['fid']['value'] = $query['id'];
			$data['fdriver_image']['value'] = $query['driverImage'];
			$data['ffirst_name']['value'] = $query['first_name'];
			$data['flast_name']['value'] = $query['last_name'];
			$data['flicense_no']['value'] = $query['license_no'];
			$data['faddress1']['value'] = $query['address1'];
			$data['faddress2']['value'] = $query['address2'];
			$data['fcity']['value'] = $query['city'];
			$data['fpincode']['value'] = $query['pincode'];
			$data['fstate']['value'] = $query['state'];
			$data['fbloodgroup']['value'] = $query['bloodgroup'];
			$data['fjoining_date']['value'] = $query['joining_date'];
			
			$data['fmobile']['value'] = $query['mobile'];
			$data['fdriver_type']['value'] = $query['driver_type'];
			$config = array();
  			$config["base_url"] = base_url() . "/driver/viewForm";
			$config["total_rows"] = $this->Driver_Model->record_count();
			$config["per_page"] = 5;
			//$config["uri_segment"] = 3;
			$config['use_page_numbers'] = TRUE;
			$this->pagination->initialize($config);
			//$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			$data["records"] = $this->Driver_Model->getAllDriver($config["per_page"],$config['use_page_numbers']);
			$data["links"] = $this->pagination->create_links();
			$this->load->view('frontend/driveredit', $data);
		}
			else {
				redirect('user/login');
				}
	}

			public function driverReport()
		{	
			if($this->session->userdata('user_name')) {
			$this->load->database();
			
		   $this->load->model('Driver_Model');
			$config = array();
  			$config["base_url"] = base_url() . "/driver/driverReport";
			$config["total_rows"] = $this->Driver_Model->record_count();
			$config["per_page"] = 5;
			$config["uri_segment"] = 3;
			$this->pagination->initialize($config);
			$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			$data["records"] = $this->Driver_Model->getAllDriver($config["per_page"], $page);
			$data["links"] = $this->pagination->create_links();
		
                        $this->load->view('frontend/driver_report', $data);
	}	
	else {
				redirect('user/login');
				}
		
			
			}
		public function driverPdfReports()
		{
		$this->load->helper('pdf_helper');
			 $this->load->model('Driver_Model');
			 $data['records'] = $this->Driver_Model->getAllD();
			 $this->load->view('reports/driverPdfReport',$data); 
		}
		
}

?>
