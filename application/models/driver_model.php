<?php if( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Driver_Model extends CI_Model 
{
	public function setDriver() 
	{		
		   $data = array(
			'first_name'	                      =>	$this->input->post('first_name'),
			'last_name'                        =>	$this->input->post('last_name'),
			'license_no'			              =>	$this->input->post('license_no'),
			'address1'  	                      =>	$this->input->post('address1'),	
			'address2'	                      =>	$this->input->post('address2'),
			'city'		                              =>	$this->input->post('city'), 
			'pincode'			                  =>	$this->input->post('pincode'),
			'state'	                              =>	$this->input->post('state'),		
			'bloodgroup'		                  =>	$this->input->post('bloodgroup'),
			'joining_date'		              =>	$this->input->post('joining_date'),
			'mobile'	                              =>	$this->input->post('mobile'),
			'createdBy'	=>      $this->session->userdata('user_name'),
			'driver_type'		                  =>	$this->input->post('driver_type'),
			'create_date'                      => date("Y/m/d"),
			);
			
			$query = $this->db->insert('driver',$data);
			
			
				if($query){
				$last_user_id = $this->db->insert_id();
				return $last_user_id;
				} else{
				return false;
				}
			}
	public function getAllDriver($limit, $start){
			$this->load->database();
			$this->db->limit($limit, $start);
			 $query = $this->db->get("driver");
			if ($query->num_rows() > 0)
			{ 
			
				return	 $query->result_array();
				
			}
			else {return NULL;}

		    } 
			public function record_count() {

			return $this->db->count_all("driver");

		    }

		public function getDriver($id)
		{			
				$this->load->database();
				$query = $this->db->query("select * from driver where id = $id");
  
				 if ($query->num_rows() > 0)
				{ 
						return $query->row_array();
				}
				else {return NULL;}
			     
		} 

		public function updateDriver()
		{
			$this->load->database();
		   $data = array(
			'first_name'	                      =>	$this->input->post('first_name'),
			'last_name'                        =>	$this->input->post('last_name'),
			'license_no'			              =>	$this->input->post('license_no'),
			'address1'  	                      =>	$this->input->post('address1'),	
			'address2'	                      =>	$this->input->post('address2'),
			'city'		                              =>	$this->input->post('city'), 
			'pincode'			                  =>	$this->input->post('pincode'),
			'state'	                              =>	$this->input->post('state'),		
			'bloodgroup'		              =>	$this->input->post('bloodgroup'),
			'joining_date'		              =>	$this->input->post('joining_date'),
			'updatedBy'	   =>	$this->session->userdata('user_name'),
			'driver_type'		                  =>	$this->input->post('driver_type'),
			'mobile'	                              =>	$this->input->post('mobile'),
			
			);
		 
		$this->db->where('id',$this->input->post('id'));
		$this->db->update('driver',$data); 		
		
		}
		public function getAllD(){
			$this->load->database();
			
			 $query = $this->db->get("driver");
			if ($query->num_rows() > 0)
			{ 
			
				return	 $query->result_array();
				
			}
			else {return NULL;}
			
			$this->record_count();
		    } 
			 
		    
}
?>
