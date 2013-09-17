<?php
class Stockinmaster extends CI_Controller
{
	public function __construct() {
	parent:: __construct();
        $this->load->helper("url");
	    $this->load->model('stockin_model');
        $this->load->library("pagination");
	    $this->load->database();
    }
	    public function index(){
			$this->viewForm();
		}
		public function viewForm(){
		if($this->session->userdata('user_name')) {
			$data["user_name"] = $this->session->userdata('user_name');
			$this->load->database();
			$this->load->model('stockin_model');
			$data["materialName"]=$this->stockin_model->getmaterialName();
			$data["vendorName"]=$this->stockin_model->getVendorName();
			$config = array();
  			$config["base_url"] = base_url() . "/stockinmaster/viewForm";
			$config["total_rows"] = $this->stockin_model->record_count();
			$config["per_page"] = 5;
			$config["uri_segment"] = 3;
			$this->pagination->initialize($config);
			$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			$data["records"] = $this->stockin_model->getAllStockinmaster($config["per_page"], $page);
			$data["links"] = $this->pagination->create_links();
			
		 	$this->load->view('frontend/stockin',$data);
				 
			}
			else {
				redirect('user/login');
				}
		}

		public function addStockinmaster()
	{
		
		$this->load->database();
		$this->load->model('stockin_model');
			if($this->input->post('submit')){			
		$this->stockin_model->setStockinmaster();
		$this->session->set_flashdata('registrationmessage', 'Stock record saved!');
		redirect('stockinmaster/viewForm');
}
	}

	public function editStockinmaster($id = 0){
		if($this->session->userdata('user_name')) {
			$this->load->database();
			$this->load->model('stockin_model');
			$data = array();
			if($this->input->post('update'))
			{
				
				
				$this->stockin_model->updateStockinmaster();
				$this->session->set_flashdata('registrationmessage', 'Material       record saved!');
			}
			$data["materialName"]=$this->stockin_model->getmaterialname();
			$data["vendorName"]=$this->stockin_model->getVendorName();
			$query = $this->stockin_model->getStockinmaster($id);
			$data['fid']['value'] = $query['id'];
			$data['fmaterialId']['value'] = $query['materialId'];
			$data['fvendorId']['value'] = $query['vendorId'];
			$data['fquantity']['value'] = $query['quantity'];
			$data['fcost']['value'] = $query['cost'];
			$data['fstorageLoc']['value'] = $query['storageLoc'];
			//$data['fbalence']['value'] = $query['balence'];
			
			$config = array();
  			$config["base_url"] = base_url() . "/stockinmaster/editstockinmaster";
			$config["total_rows"] = $this->stockin_model->record_count();
			$config["per_page"] = 5;
			//$config["uri_segment"] = 3;
			$config['use_page_numbers'] = TRUE;
			$this->pagination->initialize($config);
			//$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			$data["records"] = $this->stockin_model->getAllStockinmaster($config["per_page"],$config['use_page_numbers']);
			$data["links"] = $this->pagination->create_links();
		 	$this->load->view('frontend/stockinedit', $data); 

			
			
			//$data['meta_title']  = 'Distance | VMS-1.0';
			
		
	}
			else {
				redirect('user/login');
				}
		}
	
	

}
 ?>
