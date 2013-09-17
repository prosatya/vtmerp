<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Stockout_Model extends CI_Model
{


			public function setStockout() 
			{
				$data = array(
				'materialId'   =>$this->input->post('materialId'),
				'issuedTo'	   =>	$this->input->post('issuedTo'),
				'quantity'	   =>	$this->input->post('quantity'),
				'cost'         =>	$this->input->post('cost'),	
				'storageLoc'   =>	$this->input->post('storageLoc'),
				//'balence'      =>   $this ->input->post('balence'),
				'createdBy'	=>      $this->session->userdata('user_name'),
				'createdDate'=> date('Y/m/d'),
				);
				
				$query = $this->db->insert('stock_out',$data);
				$qty = $this->input->post('quantity');
				$mid = $this->input->post('materialId');
				
		//$query = $this->db->insert('stock_out',$data); 
						
		 $upquery = $this->db->query("UPDATE material_master SET quantity = quantity - $qty WHERE id = $mid");
		
			
			
				if($query){
				$last_user_id = $this->db->insert_id();
				return $last_user_id;
				} else{
				return false;
				}
			}

			public function getAllStockout($limit, $start){
			$this->load->database();
			$this->db->select('*');
			$this->db->from('material_master');
			$this->db->join('stock_out', 'material_master.id = stock_out.materialId','left inner');
			$this->db->limit($limit, $start);
			$query = $this->db->get();
			if ($query->num_rows() > 0)
			{ 
			
				return	 $query->result_array();
				
			}
			else {return NULL;}

		    } 
			public function record_count() {

			return $this->db->count_all("stock_out");

		    }

		public function getStockout($id)
		{			
				$this->load->database();
				$query = $this->db->query("select * from stock_out where id = $id");
  
				 if ($query->num_rows() > 0)
				{ 
						return $query->row_array();
				}
				else {return NULL;}
			     
		} 

   		public function updateStockout(){

				$data = array(
				'materialId'	    =>  $this->input->post('materialId'),
				'issuedTo'	        =>	$this->input->post('issuedTo'),
				'quantity'	        =>	$this->input->post('quantity'),
				'cost'              =>	$this->input->post('cost'),	
				'storageLoc'	    =>	$this->input->post('storageLoc'),
				//'balence'           =>   $this ->input->post('balance'),
				'updatedBy'	   =>	$this->session->userdata('user_name'),
				'createdDate'       => date('Y/m/d'),
				);
				 
			$this->db->where('id',$this->input->post('id'));
		    $this->db->update('stock_out',$data); 		
				
					}
	function getVehiclet($id) {
      $query = $this->db->query("SELECT * FROM vehicle_master WHERE id = '{$id}'");
	
  
        if ($query->num_rows > 0) {
            return $query->result();
        }
    }

	function getmaterialName(){
		$query=$this->db->query("SELECT id,materialName,cost,quantity FROM material_master");
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
	
		function getMaterialCost($id){
		$query=$this->db->query("SELECT cost,quantity FROM material_master WHERE id='$id'");
		if($query->num_rows > 0)
			{
				return $query->result();
			}
		
}



}




?>
