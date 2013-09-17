<?php
class Production extends CI_Controller
{
	public function __construct()
		{

		parent:: __Construct();
        	$this->load->model('production_model');
		$this->load->library('session');
		$this->load->helper("url");
		 $this->load->library("pagination");
		}
		public function index(){
		if($this->session->userdata('user_name')) {
			$this->load->model('production_model');
			$data['plants'] = $this->production_model->getPlant();			
			$data['materials'] = $this->production_model->getMaterials();
			$config = array();
  			$config["base_url"] = base_url() . "/production/productionEntry";
			$config["total_rows"] = $this->production_model->record_productionIn();
			$config["per_page"] = 5;
			$config["uri_segment"] = 3;
			$this->pagination->initialize($config);
			$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			$data["records"] = $this->production_model->getAllProductionIn($config["per_page"], $page);
			$data["links"] = $this->pagination->create_links();
		 	$this->load->view('frontend/productionEntry',$data);
			}
			else {
				redirect('user/login');
				}
	    
		}
		
		public function addProductionIn(){
		$this->load->database();
		$this->production_model->addProduct();	
		$this->index();
		 $this->session->set_flashdata('registrationmessage', 'Record Inserted Succesfully!');
		redirect('production/index');
		}	

		public function productionInEdit($id = 0){
			if($this->session->userdata('user_name')) {
			$this->load->database();
			$this->load->model('production_model');
			$data = array();
			if($this->input->post('update'))
			{
				$this->production_model->updateProductionIn();
			 $this->session->set_flashdata('registrationmessage', 'Record Updated!');
			redirect('production/index');
			}
			$data['plants'] = $this->production_model->getPlant();			
			$data['materials'] = $this->production_model->getMaterials();
			$query = $this->production_model->getProductionIn($id);
			$data['fid']['value'] = $query['productionIn_id'];
			$data['fplantId']['value'] = $query['plantId'];
			$data['fmaterialId']['value'] = $query['materialId'];
			$data['fquantityProduce']['value'] = $query['quantityProduce'];
			
				
			$data['main_content'] ='frontend/productionEntryEdit';
			$data['meta_title']  = 'Distance | VMS-1.0';
			$this->load->model('production_model');
			$config = array();
  			$config["base_url"] = base_url() . "/production/productionInEdit";
			$config["total_rows"] = $this->production_model->record_productionIn();
			$config["per_page"] = 5;

			$config['use_page_numbers'] = TRUE;
			$this->pagination->initialize($config);

			
			$data["records"] = $this->production_model->getAllProductionIn($config["per_page"], $config['use_page_numbers']);
			
			$data["links"] = $this->pagination->create_links();
		 	 
			$this->load->view('frontend/productionEntryEdit', $data);
			}
			else {
				redirect('user/login');
				}
	}
		
		public function stockOut(){
		if($this->session->userdata('user_name')) {
			$this->load->model('production_model');
			$data['plants'] = $this->production_model->getPlant();			
			$data['materials'] = $this->production_model->getMaterials();
			$config = array();
  			$config["base_url"] = base_url() . "/production/productionOut";
			$config["total_rows"] = $this->production_model->record_productionOut();
			$config["per_page"] = 5;
			$config["uri_segment"] = 3;
			$this->pagination->initialize($config);
			$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			$data["records"] = $this->production_model->getAllProductionOut($config["per_page"], $page);
			$data["links"] = $this->pagination->create_links();
		 	$this->load->view('frontend/productionOut',$data);
			}
			else {
				redirect('user/login');
				}
			
		}
		
		public function addProductionOut(){

		$this->load->database();
		$this->production_model->addProductOut();	
		$this->stockOut();
		 $this->session->set_flashdata('registrationmessage', 'Record Inserted Succesfully!');
		redirect('production/stockOut');
		}	
		
		public function productionOutEdit($id = 0){
			if($this->session->userdata('user_name')) {
			$this->load->database();
			$this->load->model('production_model');
			$data = array();
			if($this->input->post('update'))
			{
				$this->production_model->updateProductionOut();
			 $this->session->set_flashdata('registrationmessage', 'Record Updated!');
			
			}
			$data['plants'] = $this->production_model->getPlant();			
			$data['materials'] = $this->production_model->getMaterials();
			$query = $this->production_model->getProductionOut($id);
			$data['fid']['value'] = $query['stockId'];
			$data['fplantId']['value'] = $query['plantId'];
			$data['fmaterialId']['value'] = $query['materialId'];
			$data['fquantityOut']['value'] = $query['quantityOut'];
			
				
			$data['main_content'] ='frontend/productionEntryEdit';
			$data['meta_title']  = 'Distance | VMS-1.0';
			$this->load->model('production_model');
			$config = array();
  			$config["base_url"] = base_url() . "/production/productionOutEdit";
			$config["total_rows"] = $this->production_model->record_productionOut();
			$config["per_page"] = 5;

			$config['use_page_numbers'] = TRUE;
			$this->pagination->initialize($config);

			
			$data["records"] = $this->production_model->getAllProductionOut($config["per_page"], $config['use_page_numbers']);
			
			$data["links"] = $this->pagination->create_links();
		 	 
			$this->load->view('frontend/productionOutEdit', $data);
			}
			else {
				redirect('user/login');
				}
	}


		/*Production Material*/
		public function productionMaterial(){
		if($this->session->userdata('user_name')) {
			$this->load->model('production_model');
			$config = array();
  			$config["base_url"] = base_url() . "/production/productionMaterial";
			$config["total_rows"] = $this->production_model->record_count();
			$config["per_page"] = 5;
			$config["uri_segment"] = 3;
			$this->pagination->initialize($config);
			$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			$data["records"] = $this->production_model->getAllMaterial($config["per_page"], $page);
			$data["links"] = $this->pagination->create_links();
		 	$this->load->view('frontend/productionMaterialEntry',$data);
			}
			else {
				redirect('user/login');
				}
		}
		
		public function addProductionMaterial(){
		$this->load->database();
		$this->load->library('session');
		$this->production_model->addMaterial();	
		$this->productionMaterial();
		 $this->session->set_flashdata('registrationmessage', 'Material Added Succesfully!');
		redirect('production/productionMaterial');
		}	
		
		public function materialEdit($id = 0){
			if($this->session->userdata('user_name')) {
			$this->load->database();
			$this->load->model('production_model');
			$data = array();
			if($this->input->post('update'))
			{
				$this->production_model->updateMaterial();
			 $this->session->set_flashdata('registrationmessage', 'Material Updated!');
			
			}
			$query = $this->production_model->getMaterial($id);
			$data['fid']['value'] = $query['id'];
			$data['fmaterial']['value'] = $query['material'];
			$data['fsize']['value'] = $query['size'];
			$data['fquantity']['value'] = $query['quantity'];
			$data['fcost']['value'] = $query['cost'];
				
			$data['main_content'] ='frontend/productionMaterialEntry';
			$data['meta_title']  = 'Distance | VMS-1.0';
			$this->load->model('production_model');
			$config = array();
  			$config["base_url"] = base_url() . "/production/materialEdit";
			$config["total_rows"] = $this->production_model->record_count();
			$config["per_page"] = 5;

			$config['use_page_numbers'] = TRUE;
			$this->pagination->initialize($config);

			
			$data["records"] = $this->production_model->getAllmaterial($config["per_page"], $config['use_page_numbers']);
			
			$data["links"] = $this->pagination->create_links();
		 	  
			$this->load->view('frontend/productionMaterialEdit', $data);
			}
			else {
				redirect('user/login');
				}
	}
		

}

?>
