<?php if( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tendor_Model extends CI_Model
{
	public function setTendor()
	{
		$data = array(
			'tender_for'	      =>	$this->input->post('tendorfor'),
			'location_for_tender_submission'	      =>	$this->input->post('lfts'),
			'work_location'  	      =>	$this->input->post('ws'),	
			'tender_type'		      =>	$this->input->post('tt'),
			'tender_no'		      =>	$this->input->post('tn'), 
			'name_of_work'	      =>	$this->input->post('now'),		
			'responsible_person'			=>	$this->input->post('rp'),
			'work_type'		=>	$this->input->post('wt'),
			'tender_source'			=>	$this->input->post('ts'),
			'intimation_date'		=>	$this->input->post('idate'),
			'last_date_of_tender_purchase'		=>	$this->input->post('ldotp'),
			'last_date_of_tender_submission'		=>	$this->input->post('ldots'),			
			'open_date_technical_tender'		=>	$this->input->post('odtt'),			
			'open_date_financial_tender'		=>	$this->input->post('odft'),			
			'document_cost'		=>	$this->input->post('dc'),			
			'tender_value'		=>	$this->input->post('tv'),
			'remarks'		=>	$this->input->post('remarks'),
				'createdBy'	=>      $this->session->userdata('user_name'),
			'create_date'		=>	date('y/m/d')
			);
			$query = $this->db->insert('tender_master',$data);
			
			
			if($query){
			$last_user_id = $this->db->insert_id();
			return $last_user_id;
			} else{
			return false;
			}
	}

	public function getTendor()
	{
		$this->load->database();	
		$query = $this->db->get('tender_master');
				
		return $query->result_array();
	}

	public function getTen($id)
	{
		$this->load->database();
				$query = $this->db->query("select * from tender_master where id = $id");
  
        if ($query->num_rows() > 0)
        { 
			return $query->row_array();
        }
        else {return NULL;}
     
	}

		public function getAllTendor()
	{
		$this->load->database();
		$this->load->helper('pdf_helper');	
		$query = $this->db->get('tender_master');
				
		return $query->result_array();
	}

	public function updateTendor()
		{
			$this->load->database();
		$data = array(
			'tender_for'	=>	$this->input->post('tender_for'),
			'location_for_tender_submission'		=>	$this->input->post('lfts'),	
			'work_location'		=>	$this->input->post('wl'),	
			'tender_type' => $this->input->post('tt'),
			'tender_no' => $this->input->post('tn'),	
			'name_of_work' => $this->input->post('now'),		
			'responsible_person' => $this->input->post('rp'),
			'work_type' => $this->input->post('wt'),
			'tender_source' => $this->input->post('ts'),
			'intimation_date' => $this->input->post('idate'),
			'last_date_of_tender_purchase' => $this->input->post('ldotp'),			
			'last_date_of_tender_submission' => $this->input->post('ldots'),			
			'open_date_technical_tender' => $this->input->post('odtt'),			
			'open_date_financial_tender' => $this->input->post('odft'),			
			'document_cost' => $this->input->post('dc'),
			'tender_value' => $this->input->post('tv'),
                        'remarks' => $this->input->post('remarks'),
			'updatedBy'	   =>	$this->session->userdata('user_name'),
			);
		 
		$this->db->where('id',$this->input->post('id'));
		$this->db->update('tender_master',$data); 		
		
		}

		public function getAll($limit, $start){
			$this->load->database();
			$this->db->limit($limit, $start);
			$query = $this->db->get("tender_master");

			if ($query->num_rows() > 0)
			{ 
					return $query->result_array();
			}
			else {return NULL;}

		    } 
			public function record_count() {

			return $this->db->count_all("tender_master");

		    }


}
?>
