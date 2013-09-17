<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class AddVehicle_Model extends CI_Model {


	/****************************************
		## ADD NEW USER FROM REGISTRATION FORM
	******************************************/

	function setVehicle() 
	{
			$data = array(
			'vehicle_no'	=>	$this->input->post('vehicle_no'),
			'vehicle_type'	=>$this->input->post('vehicle_type'),
			'make_year'		=>	$this->input->post('make_year'),	
			'color'		=>	$this->input->post('color'),	
			'chasis_no'	=>	$this->input->post('chasis_no'),
			'vehicle_ownership'		=>	$this->input->post('myradio'),	
			'vendor_id'	=>	$this->input->post('vendor_id'),
			'lease_start_date'	=>	$this->input->post('lease_start_date'),
			'lease_end_date'	=>	$this->input->post('lease_end_date'),
			'cost'	=>	$this->input->post('cost'),
			'meter_type' => $this->input->post('meter_type'),
			'weight_capacity'	=>	$this->input->post('weight_capacity'),
			'model_no'	=>	$this->input->post('model_no'),
			'make'	=>	$this->input->post('make'),
			'createdBy'	=>      $this->session->userdata('user_name'),
			'description'  => $this->input->post('description'),

			'create_date' => date("Y/m/d"),);
			if($this->input->post('registration')){
			$query = $this->db->insert('vehicle_master',$data);
			
			
			if($query){
			$last_user_id = $this->db->insert_id();
			return $last_user_id;
			} else{
			return false;
			}
		}
	}

	public function getAllVehicle()
	{
		$this->load->database();	
		$query = $this->db->get('vehicle_master');
				
		return $query->result_array();
	}

	
		public function getAll($limit, $start){
			
			$this->db->limit($limit, $start);
			$query = $this->db->get("vehicle_master");

			if ($query->num_rows() > 0)
			{ 
					return $query->result_array();
			}
			else {return NULL;}

		    } 
			public function record_count() {

			return $this->db->count_all("vehicle_master");

		    }

		public function getVehicle($id)
		{
		$this->load->database();
				$query = $this->db->query("select * from vehicle_master where id = $id");
  
        if ($query->num_rows() > 0)
        { 
			return $query->row_array();
        }
        else {return NULL;}
     
		}
		public function updateVehicle()
		{
			$this->load->database();
		    $data = array(
			'vehicle_no'	=>	$this->input->post('vehicle_no'),
			'vehicle_type'		=>	$this->input->post('vehicle_type'),	
			'make_year'		=>	$this->input->post('make_year'),	
			'color' => $this->input->post('color'),
			'chasis_no' => $this->input->post('chasis_no'),	
			'vehicle_ownership' => $this->input->post('vehicle_ownership'),		
			'vendor_id' => $this->input->post('vendor_id'),
			'lease_start_date' => $this->input->post('lease_start_date'),
			'lease_end_date' => $this->input->post('lease_end_date'),
			'cost' => $this->input->post('cost'),
			'meter_type' => $this->input->post('meter_type'),
			'weight_capacity' => $this->input->post('weight_capacity'),
			'model_no' => $this->input->post('model_no'),
			'make' => $this->input->post('make'),
			'description' => $this->input->post('description'),
			);
		 
		$this->db->where('id',$this->input->post('id'));
		$this->db->update('vehicle_master',$data); 		
		
		}
			function getVendorName(){
			$this->load->database();
				$query = $this->db->query("select id,vendor_name from vendor_master");
  
        if ($query->num_rows() > 0)
        { 
			return $query->result_array();
        }
        else {return NULL;}
     
		}
}
?>
