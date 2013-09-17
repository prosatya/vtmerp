<?php if( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Material_Model extends CI_Model 
	{
	public function setMaterialmaster() 
	{		
			$data = array(
			'materialName'	  =>	$this->input->post('materialName'),
			'materialType'    =>	$this->input->post('materialType'),
			'baseUnit'  	  =>	$this->input->post('baseUnit'),	
			'orderUnit'	      =>	$this->input->post('orderUnit'),
			'issueUnit'		  =>	$this->input->post('issueUnit'), 
			'cost'	          =>	$this->input->post('cost'),	
			'quantity'        =>    $this->input->post('quantity'),	
			'reorderLevel'	  =>	$this->input->post('reorderLevel'),
			'description'	  =>	$this->input->post('description'),
			'createdBy'	=>      $this->session->userdata('user_name'),
			'createDate'      =>    date("Y/m/d"),
			);
			
			$query = $this->db->insert('material_master',$data);
					
		//$query = $this->db->query("UPDATE material_master SET quantity = 'quantity+$data', WHERE id = $id");
			
				if($query){
				$last_user_id = $this->db->insert_id();
				return $last_user_id;
				} else{
				return false;
				}
		}
		public function getAllMaterialmaster($limit, $start)
		{
			$this->db->limit($limit, $start);
			$query = $this->db->get("material_master");
			if ($query->num_rows() > 0)
			{ 
				return $query->result_array();
			}
			else {return NULL;}
		    } 
			
		public function record_count() 
		{
			return $this->db->count_all("material_master");
		}

		public function getMaterialmaster($id)
		{
			$this->load->database();
			$query = $this->db->query("select * from material_master where id = $id");
  
	        if ($query->num_rows() > 0)
    	    { 
				return $query->row_array();
        	}
	        else {return NULL;}
		}
		public function updateMaterialmaster()
		{
			$this->load->database();
		    $data = array(
			'materialName'	 =>	$this->input->post('materialName'),
			'materialType'   =>	$this->input->post('materialType'),
			'baseUnit'  	 =>	$this->input->post('baseUnit'),	
			'orderUnit'	     =>	$this->input->post('orderUnit'),
			'issueUnit'		 =>	$this->input->post('issueUnit'), 
			'cost'	         =>	$this->input->post('cost'),
			'quantity'       => $this->input->post('quantity'),		
			'reorderLevel'	 =>	$this->input->post('reorderLevel'),
			'description'	 =>	$this->input->post('description'),
			'updatedBy'	   =>	$this->session->userdata('user_name'),
			);
		 
		$this->db->where('id',$this->input->post('id'));
		$this->db->update('material_master',$data); 		
		}
		public function getAllMaterial()
		{
			$this->load->database();	
			$query = $this->db->get('material_master');
			return $query->result_array();
		}
}
?>
