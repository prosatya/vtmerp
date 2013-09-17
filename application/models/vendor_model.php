<?php if( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Vendor_Model extends CI_Model 
	{
	public function setVendor() 
	{		
			$data = array(
			'vendor_name'	  =>	$this->input->post('vname'),
			'address1'	      =>	$this->input->post('address1'),
			'address2'  	  =>	$this->input->post('address2'),	
			'city'		      =>	$this->input->post('city'),
			'state'		      =>	$this->input->post('state'), 
			'pincode'	      =>	$this->input->post('pincode'),		
			'phone'			  =>	$this->input->post('phone'),
			'mobile'		  =>	$this->input->post('mobile'),
			'notes'			  =>	$this->input->post('notes'),
				'createdBy'	=>      $this->session->userdata('user_name'),
			'material_supply' =>	$this->input->post('msupply'),
			'create_date'     => date("Y/m/d"),
			);
			if($this->input->post('vendor')){
			$query = $this->db->insert('vendor_master',$data);
			if($query){
			$last_user_id = $this->db->insert_id();
			return $last_user_id;
			} else{
			return false;
			}
		}
	}

	public function getAllVendor()
	{
		$this->load->database();	
		$query = $this->db->get('vendor_master');
		return $query->result_array();
	}

	
		public function getAll($limit, $start){
			
			$this->db->limit($limit, $start);
			$query = $this->db->get("vendor_master");

			if ($query->num_rows() > 0)
			{ 
					return $query->result_array();
			}
			else {return NULL;}

		    } 
			public function record_count() {

			return $this->db->count_all("vendor_master");

		    }

		public function getVendor($id)
		{
		$this->load->database();
				$query = $this->db->query("select * from vendor_master where id = $id");
  
        if ($query->num_rows() > 0)
        { 
			return $query->row_array();
        }
        else {return NULL;}
     
		}
		public function updateVendor()
		{
			$this->load->database();
		$data = array(
			'vendor_name'	=>	$this->input->post('vname'),
			'address1'		=>	$this->input->post('address1'),	
			'address2'		=>	$this->input->post('address2'),	
			'city' => $this->input->post('city'),
			'state' => $this->input->post('state'),	
			'pincode' => $this->input->post('pincode'),		
			'phone' => $this->input->post('phone'),
			'mobile' => $this->input->post('mobile'),
			'notes' => $this->input->post('notes'),
			'material_supply' => $this->input->post('material_supply'),
			);
		 
		$this->db->where('id',$this->input->post('id'));
		$this->db->update('vendor_master',$data); 		
		
		}
		public function changeStatus($id)
		{
			$this->load->database();
			$query = $this->db->query("select delete_status from vendor_master where id = $id");
			if ($query->num_rows() > 0)
			{
			   $row = $query->row();

			    $st=$row->delete_status;
				if($st == 1)
				{			
				$data = array(
               			'delete_status' => 0,
           			 );
			
			  $this->db->where('id',$id);
			  $this->db->update('vendor_master',$data);
				}
			else{
				$data = array(
				'delete_status' => 1,
				);
			$this->db->where('id',$id);
			  $this->db->update('vendor_master',$data);

				}			
			} 
		}
}
?>
