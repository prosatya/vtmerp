<?php

class Tendor extends CI_Controller
{
	public function __construct()
	{
		parent:: __Construct();
        	$this->load->helper("url");
       		$this->load->model("tendor_model");
        	$this->load->library("pagination");
	}
	public function tendorMaster()
	{	$config = array();
		if($this->session->userdata('user_name')) {
  			$config["base_url"] = base_url() . "/tendor/tendorMaster";
			$config["total_rows"] = $this->tendor_model->record_count();
			$config["per_page"] = 5;
			$config["uri_segment"] = 3;
			$this->pagination->initialize($config);
			$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			$data["records"] = $this->tendor_model->getAll($config["per_page"], $page);
			$data["links"] = $this->pagination->create_links();
		
		$this->load->view('frontend/tendorMaster',$data);
	}	
	else {
				redirect('user/login');
				}
		}

	public function addTendor()
	{
		$this->tendor_model->setTendor();
		$this->session->set_flashdata('registrationmessage', 'Tendor record saved!');
		redirect('tendor/tendorMaster');
	}

	public function showTendor()
		{
		$data['records']=$this->tendor_model->getTendor();
		$this->load->view('frontend/tendorMaster',$data);		
		}
	
	public function editTendor($id = 0)
		{
				if($this->session->userdata('user_name')) {	
		$data = array();
			if($this->input->post('update'))
			{
				$this->tendor_model->updateTendor();	
		$this->session->set_flashdata('registrationmessage', 'Tendor record saved!');		
				
				redirect('tendor/tendorMaster');
			}
			$query = $this->tendor_model->getTen($id);
			$data['fid']['value'] = $query['id'];
			$data['ftender_for']['value'] = $query['tender_for'];
			$data['flocation_for_tender_submission']['value'] = $query['location_for_tender_submission'];
			$data['fwork_location']['value'] = $query['work_location'];
			$data['ftender_type']['value'] = $query['tender_type'];
			$data['ftender_no']['value'] = $query['tender_no'];
			$data['fname_of_work']['value'] = $query['name_of_work'];
			$data['fresponsible_person']['value'] = $query['responsible_person'];
			$data['fwork_type']['value'] = $query['work_type'];
			$data['ftender_source']['value'] = $query['tender_source'];
			$data['fintimation_date']['value'] = $query['intimation_date'];
			$data['flast_date_of_tender_purchase']['value'] = $query['last_date_of_tender_purchase'];
			$data['flast_date_of_tender_submission']['value'] = $query['last_date_of_tender_submission'];
			$data['fopen_date_technical_tender']['value'] = $query['open_date_technical_tender'];
			$data['fopen_date_financial_tender']['value'] = $query['open_date_financial_tender'];
			$data['fdocument_cost']['value'] = $query['document_cost'];
			$data['ftender_value']['value'] = $query['tender_value'];
			$data['fremarks']['value'] = $query['remarks'];
			$config["base_url"] = base_url() . "/vendor/viewForm";
			$config["total_rows"] = $this->tendor_model->record_count();
			$config["per_page"] = 5;
			//$config["uri_segment"] = 3;
			
			$config['use_page_numbers'] = TRUE;
			$this->pagination->initialize($config);
			//$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			$data["records"] = $this->tendor_model->getAll($config["per_page"],$config['use_page_numbers']);
			$data["links"] = $this->pagination->create_links();
			
			$data['main_content'] ='frontend/tendorMaster';
			$data['meta_title']  = 'Distance | VMS-1.0';
			
			$this->load->view('frontend/tendor_edit', $data);
	}	
	else {
				redirect('user/login');
				}
		}


	function tendorReport(){
			//$data['member']= $this->vehicle_model->alldata();
			$config = array();
  			$config["base_url"] = base_url() . "/tendor/tendorReport";
			$config["total_rows"] = $this->tendor_model->record_count();
			$config["per_page"] = 15;
			$config["uri_segment"] = 3;
			$this->pagination->initialize($config);
			$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			$data["records"] = $this->tendor_model->getAll($config["per_page"], $page);
			$data["links"] = $this->pagination->create_links();
			$this->load->view('frontend/tendorReport',$data);
	}
	
	function tendorPDFReport () 
	{
		$data["records"] = $this->tendor_model->getAllTendor();
		$this->load->view('reports/tendorPdfReport',$data);
		
	}
}
?>
