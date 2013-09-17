<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fuel_model extends CI_Model
{
			public function setVehicleFuel() 
			{
				$data = array(
				'vehicle_id'	=>$this->input->post('vehicle_id'),
				'material_supply' => $this->input->post('material_supply'),
				'mobile' 		=> $this->input->post('mobile'),				
				'diesel_vendor'	=>$this->input->post('diesel_vendor'),
				'diesel_slip_no'	   =>	$this->input->post('diesel_slip_no'),
				'start_reading'	   =>	$this->input->post('start_reading'),
				'close_reading'  =>	$this->input->post('close_reading'),	
				'total_reading'	   =>	$this->input->post('total_reading'),
				'average'	   =>	$this->input->post('average'),
				'createdBy'	=>      $this->session->userdata('user_name'),
				'opening_km'	   =>	$this->input->post('opening_km'),
				'closing_km'	   =>	$this->input->post('closing_km'),
				'quantity'	   =>	$this->input->post('quantity'),
				'create_date'=> date('Y/m/d'),
				);
				
				$query = $this->db->insert('vehicle_fuel',$data);
			
			
				if($query){
				$last_user_id = $this->db->insert_id();
				return $last_user_id;
				} else{
				return false;
				}
			}

			public function getAllVehicleFuel($limit, $start)
			{
			$this->load->database();	
			$this->db->select('*');
			$this->db->from('vehicle_master');
			$this->db->join('vehicle_fuel', 'vehicle_master.id= vehicle_fuel.vehicle_id');
			$this->db->limit($limit, $start);
			// WHERE id = $id ... goes here somehow...
			$query = $this->db->get();

			
			
			
			if ($query->num_rows() > 0)
			{ 
				return	 $query->result_array();
			}
			else {return NULL;}

		    	} 

			public function getAllVehicleFuels()
			{
			 $this->load->database();
			$this->db->select('*');
			$this->db->from('vehicle_master');
			$this->db->join('vehicle_fuel', 'vehicle_master.id= vehicle_fuel.vehicle_id');
			 $query = $this->db->get();
			 if ($query->num_rows() > 0)
			 { 
				return	 $query->result_array();
  			 }
			 else {return NULL;}
		    	} 

			public function record_count() 
			{
				return $this->db->count_all("vehicle_fuel");
	  	        }

		public function getVehicleFuel($id)
		{			
				$this->load->database();
				$query = $this->db->query("select * from vehicle_fuel where id = $id");
  
				 if ($query->num_rows() > 0)
				{ 
						return $query->row_array();
				}
				else {return NULL;}
			     
		} 

   		public function updateVehicleFuel(){

				
				$data = array(
				'diesel_vendor'	=>$this->input->post('diesel_vendor'),
				'material_supply' => $this->input->post('material'),
				'mobile' 		=> $this->input->post('mobile'),
				'diesel_slip_no'	   =>	$this->input->post('diesel_slip_no'),
				'start_reading'	   =>	$this->input->post('start_reading'),
				'close_reading'  =>	$this->input->post('close_reading'),	
				'total_reading'	   =>	$this->input->post('total_reading'),
				'average'	   =>	$this->input->post('average'),
				'opening_km'	   =>	$this->input->post('opening_km'),
				'closing_km'	   =>	$this->input->post('closing_km'),
				'quantity'	   =>	$this->input->post('quantity'),
				'updatedBy'	   =>	$this->session->userdata('user_name'),
				'create_date'=> date("Y/m/d"),
				);
	
				 $this->db->where('id',$this->input->post('id'));
				 $this->db->update('vehicle_fuel',$data); 		
				
					}
	function getVehiclet($id) {

      $query = $this->db->query("SELECT * FROM vehicle_master WHERE id = '{$id}'");
	
         
        if ($query->num_rows > 0) {
            return $query->result();
        }
    }


function getvehicle_No()
	{

			 $query =$this->db->query("SELECT id,vehicle_no,vehicle_type FROM vehicle_master");
			if($query->num_rows > 0)
			{
				return $query->result();
			}

	}
	
	function getVendorName()
	{
	$query=$this->db->query("SELECT id,vendor_name FROM vendor_master");
		if($query->num_rows > 0)
		{
			return $query->result();
		}
	}
		function getVendorN($id) {

      $query = $this->db->query("SELECT * FROM vendor_master WHERE vendor_name = '{$id}'");
	
         
        if ($query->num_rows > 0) {
            return $query->result();
        }
    }
		public function getAll(){
			$this->load->database();
			$this->load->helper('pdf_helper');
			$query = $this->db->get("vehicle_fuel");
			if ($query->num_rows() > 0)
			{ 
			
				return	 $query->result_array();
				
			}
			else {return NULL;}

		    } 

		function search($id,$fromDate,$todate)
			{
		$query= $this->db->query("SELECT vehicle_master.id,vehicle_master.vehicle_no,vehicle_master.vehicle_type,vehicle_fuel.* FROM vehicle_fuel join vehicle_master WHERE vehicle_master.id ='".$id."' and vehicle_fuel.vehicle_id='".$id."'");

		
			if($query->num_rows > 0){
				return $query->result_array();
			}
			}
		function search1($fromDate,$todate)
			{
		$query= $this->db->query("SELECT vehicle_master.id,vehicle_master.vehicle_no,vehicle_master.vehicle_type,vehicle_fuel.* FROM vehicle_fuel join vehicle_master WHERE vehicle_fuel.create_date BETWEEN '".$fromDate."' AND '".$todate."' AND vehicle_master.id = vehicle_fuel.vehicle_id");

		
			if($query->num_rows > 0){
				return $query->result_array();
			}
			}
}




?>
