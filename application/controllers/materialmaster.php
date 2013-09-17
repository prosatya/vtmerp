<?php

class Materialmaster extends CI_Controller
{
	public function __construct()
		{

		parent:: __Construct();
        	$this->load->helper("url");
       		$this->load->model("Material_Model");
        	$this->load->library("pagination");
		}
		 public function index(){
			$this->viewForm();
		}
		
	public function viewForm(){
		if($this->session->userdata('user_name')) {
			$this->load->database();
		    $this->load->model('Material_Model');
			$config = array();
  			$config["base_url"] = base_url() . "/materialmaster/viewForm";
			$config["total_rows"] = $this->Material_Model->record_count();
			$config["per_page"] = 5;
			$config["uri_segment"] = 3;
			$this->pagination->initialize($config);
			$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			$data["records"] = $this->Material_Model->getAllMaterialmaster($config["per_page"], $page);
			$data["links"] = $this->pagination->create_links();
            $this->load->view('frontend/materialmaster', $data);
		}	
	    else {
				redirect('user/login');
			 }
		}
	
		public function addMaterialmaster()
		{
			$this->load->database();
			$this->load->model('Material_Model');
			$this->Material_Model->setMaterialmaster();
			$this->session->set_flashdata('registrationmessage', 'Material record saved!');
			redirect('materialmaster/viewForm');
		}

	
		public function getMaterialmaster()
		{
			$this->load->model('Material_Model');
			$data['records'] = $this->Material_Model->getAllMaterialmaster();
			$this->load->view('frontend/materialmaster', $data); 
			// load the view with the $data variable
			
		}
		
		public function editMaterialmaster($id = 0)
		{
		if($this->session->userdata('user_name')) {
			$this->load->database();
			$this->load->model('Material_Model');
			$data = array();
			if($this->input->post('update'))
			{
				$this->Material_Model->updateMaterialmaster();
		$this->session->set_flashdata('registrationmessage', 'Material record saved!');			
			}
			$query = $this->Material_Model->getMaterialmaster($id);
			$data['fid']['value'] = $query['id'];
			$data['fmaterialName']['value'] = $query['materialName'];
			$data['fmaterialType']['value'] = $query['materialType'];
			$data['fbaseUnit']['value'] = $query['baseUnit'];
			$data['forderUnit']['value'] = $query['orderUnit'];
			$data['fissueUnit']['value'] = $query['issueUnit'];
			$data['fcost']['value'] = $query['cost'];
			$data['fquantity']['value']=$query['quantity'];
			$data['freorderLevel']['value'] = $query['reorderLevel'];
			$data['fdescription']['value'] = $query['description'];
	        $config = array();
  			$config["base_url"] = base_url() . "/materialmaster/editMaterialmaster";
			$config["total_rows"] = $this->Material_Model->record_count();
			$config["per_page"] = 5;
//			$config["uri_segment"] = 3;
			$config['use_page_numbers'] = TRUE;
			$this->pagination->initialize($config);
//			$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			$data["records"] = $this->Material_Model->getAllMaterialmaster($config["per_page"],$config['use_page_numbers']);
			$data["links"] = $this->pagination->create_links();
			
			$data['meta_title']  = 'Materialmaster | VMS-1.0';
			
			$this->load->view('frontend/materialmasteredit', $data);
		}	
	    else {
				redirect('user/login');
			 }
		}
		public function materialReports()
		{
			$config = array();
  			$config["base_url"] = base_url() . "/materialmaster/materialReports";
			$config["total_rows"] = $this->Material_Model->record_count();
			$config["per_page"] = 50;
			$config["uri_segment"] = 3;
			$this->pagination->initialize($config);
			$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			$data["records"] = $this->Material_Model->getAllMaterialmaster($config["per_page"], $page);
			$data["links"] = $this->pagination->create_links();
            $this->load->view('frontend/materialReport', $data);
		}
		public function materialPDFReports()
		{
			 $this->load->helper('pdf_helper');
			 $this->load->model('Material_Model');
			 $data['records'] = $this->Material_Model->getAllMaterial();
			 $this->load->view('reports/materialPDFReport',$data); 
			 // load the view with the $data variable
			
		}
}

?>
