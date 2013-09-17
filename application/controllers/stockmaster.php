<?php
class Stockmaster extends CI_Controller
{
	public function __construct() {
        parent:: __construct();
        $this->load->helper("url");
			$this->load->model('stockout_model');
        $this->load->library("pagination");
    }
	 public function index(){
			$this->viewForm();
		}
		public function viewForm(){
			$data = array();
			$config = array();
		if($this->session->userdata('user_name')) {
			$this->load->database();
			$this->load->model('stockout_model');
			$data["materialname"]=$this->stockout_model->getmaterialName();
			
			$config["base_url"] = base_url() . "/stockmaster/viewForm";
			$config["total_rows"] = $this->stockout_model->record_count();
			$config["per_page"] = 5;
			$config["uri_segment"] = 3;
			$this->pagination->initialize($config);
			$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			$data["records"] = $this->stockout_model->getAllStockout($config["per_page"], $page);
			$data["links"] = $this->pagination->create_links();
		 	$this->load->view('frontend/stockout',$data);
					
			
	 
			}
			else {
				redirect('user/login');
				}
		}

		public function addStockout()
	{

		$this->load->database();
		$this->load->model('Stockout_Model');
		$this->stockout_model->setStockout();
		$this->session->set_flashdata('registrationmessage', 'StockOut record saved!');
		redirect('stockmaster/viewForm');
	}

	public function editStockout($id = 0){
					if($this->session->userdata('user_name')) {
			$this->load->database();
			$this->load->model('Stockout_Model');
			$data = array();
			if($this->input->post('update'))
			{
				
				$this->Stockout_Model->updateStockout();
		$this->session->set_flashdata('registrationmessage', 'StockOut record saved!');
			}
			$data["materialname"]=$this->stockout_model->getmaterialName();
			$query = $this->stockout_model->getStockout($id);
			$data['fid']['value'] = $query['id'];
			$data['fmaterialId']['value'] = $query['materialId'];
			$data['fcost']['value'] =    $query['cost'];
			$data['fissuedTo']['value'] = $query['issuedTo'];
			$data['fquantity']['value'] = $query['quantity'];
			$data['fstorageLoc']['value'] = $query['storageLoc'];
			//$data['fbalence']['value'] = $query['balence'];
			
			$config = array();
  			$config["base_url"] = base_url() . "/stockmaster/editStockout";
			$config["total_rows"] = $this->stockout_model->record_count();
			$config["per_page"] = 5;
//			$config["uri_segment"] = 3;
			$config['use_page_numbers'] = TRUE;
			$this->pagination->initialize($config);
		
//			$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			$data["records"] = $this->stockout_model->getAllStockout($config["per_page"],$config['use_page_numbers']);
			$data["links"] = $this->pagination->create_links();
		 	$this->load->view('frontend/stockoutedit', $data); 

			
			
			//$data['meta_title']  = 'Distance | VMS-1.0';
			
		
			}
			else {
				redirect('user/login');
				}
		}

	

}
 ?>
