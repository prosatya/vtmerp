<?php if( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Vehicletrip_Model extends CI_Model 
{
	public function setVehicletrip() 
	{		
			$data = array(
			'vehicle_id'	                      =>	$this->input->post('vehicle_id'),
			'driver_id'                           =>	$this->input->post('driver_id'),
			'helper_id'  	                      =>	$this->input->post('helper_id'),	
			'place_from'	                      =>	$this->input->post('from'),
			'place_to'		                      =>	$this->input->post('to'), 
			'distance'	                          =>	$this->input->post('distance'),		
			'weight'			                      =>	$this->input->post('weight'),
			'material'		                      =>	$this->input->post('material'),
			'slip_no'			                  =>	$this->input->post('slip_no'),
			'royalty_no'	                      =>	$this->input->post('royalty_no'),
			'royalty_amount'		          =>	$this->input->post('royalty_amount'),
			'createdBy'	=>      $this->session->userdata('user_name'),
			'create_date'                      => date("Y/m/d"),
			);
			
			if($this->input->post('submit')){
			$query = $this->db->insert('vehicle_trip',$data);
			
			
			if($query){
			$last_user_id = $this->db->insert_id();
			return $last_user_id;
			} else{
			return false;
			}
		}
	}

	public function getAllVehicletrip()
	{
		$this->load->database();	
		$query = $this->db->get('vehicle_trip');
				
		return $query->result_array();
	}

		public function getAll($limit, $start){
			
			$this->db->limit($limit, $start);
			$query = $this->db->get("vehicle_trip");

			if ($query->num_rows() > 0)
			{ 
					return $query->result_array();
			}
			else {return NULL;}

		    } 
			public function record_count() {

			return $this->db->count_all("vehicle_trip");

		    }

		public function getVehicletrip($id)
		{
		$this->load->database();
				$query = $this->db->query("select * from vehicle_trip where id = $id");
  
        if ($query->num_rows() > 0)
        { 
			return $query->row_array();
        }
        else {return NULL;}
     
		}
		public function updateVehicletrip()
		{
			$this->load->database();
		  $data = array(
			'vehicle_id'	                      =>	$this->input->post('vehicle_id'),
			'driver_id'                           =>	$this->input->post('driver_id'),
			'helper_id'  	                      =>	$this->input->post('helper_id'),	
			'place_from'	                      =>	$this->input->post('place_from'),
			'place_to'		                      =>	$this->input->post('place_to'), 
			'distance'	                          =>	$this->input->post('distance'),		
			'weight'			                      =>	$this->input->post('weight'),
			'material'		                      =>	$this->input->post('material'),
			'slip_no'			                  =>	$this->input->post('slip_no'),
			'royalty_no'	                      =>	$this->input->post('royalty_no'),
			'royalty_amount'		          =>	$this->input->post('royalty_amount'),
			'updatedBy'	   =>	$this->session->userdata('user_name'),
			);
		 
		$this->db->where('id',$this->input->post('id'));
		$this->db->update('vehicle_trip',$data); 		
		
		}
		function getVehiclet($id) {
      $query = $this->db->query("SELECT * FROM vehicle_master WHERE id = '{$id}'");
	
  
        if ($query->num_rows > 0) {
            return $query->result();
        }
    }



	function getvehicle_No()
	{

			 $query =$this->db->query("SELECT id,vehicle_no FROM vehicle_master");
			if($query->num_rows > 0)
			{
				return $query->result();
			}

}



		function getDriverN()
		{
			$query =$this->db->query("SELECT id,first_name,last_name FROM driver WHERE driver_type='Driver'");
			if($query->num_rows > 0)
			{
				return $query->result();
			}		
		}


		function getHelperN()
		{	
			$query =$this->db->query("SELECT id,first_name,last_name FROM driver WHERE driver_type='Helper'");
			if($query->num_rows > 0)
			{
				return $query->result();
			}		
			
		}

		function getFrom()
		{
		$query =$this->db->query("SELECT from_place,id FROM distance_master");
			if($query->num_rows > 0)
			{
				return $query->result();
			}		
		}		
	function getTo()
		{
		$query =$this->db->query("SELECT to_place,id FROM distance_master");
			if($query->num_rows > 0)
			{
				return $query->result();
			}		
		}

		function getDriverD($id)
		{
		  
       			 $query = $this->db->query("SELECT * FROM driver WHERE id='$id'");
			

  
     		   if ($query->num_rows > 0) 
		  {
           		 return $query->result();
      		  }
		
		}
		
}
?>
