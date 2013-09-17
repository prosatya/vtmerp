<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Stockin_Model extends CI_Model
{


			public function setStockinmaster() 
			{
				$data = array(
				'materialId'	=>  $this->input->post('materialId'),				
				'vendorId'	    =>  $this->input->post('vendorId'),
				'quantity'	    =>	$this->input->post('quantity'),
				'cost'	        =>	$this->input->post('cost'),
				'storageLoc'    =>	$this->input->post('storageLoc'),
				'createdBy'	=>      $this->session->userdata('user_name'),
				'createdDate'   => date('Y/m/d'),
				);
				$qty = $this->input->post('quantity');
				$mid = $this->input->post('materialId');
				$query = $this->db->insert('stock_in',$data); 
				$upquery = $this->db->query("UPDATE material_master SET quantity = quantity + $qty WHERE id = $mid");
				if($query){
				$last_user_id = $this->db->insert_id();
				return $last_user_id;
				} else{
				return false;
				}
			}

		public function getAllStockinmaster($limit, $start){
			$this->load->database();
			$this->db->select('*');
			$this->db->from('material_master');
			$this->db->join('stock_in', 'material_master.id= stock_in.materialId','left inner');
			$this->db->limit($limit, $start);
			$query = $this->db->get();
			if ($query->num_rows() > 0)
			{ 
			
				return	 $query->result_array();
				
			}
			else {return NULL;}

		    } 
			public function record_count() {

			return $this->db->count_all("stock_in");

		    }

		public function getStockinmaster($id)
		{			
				$this->load->database();
				$query = $this->db->query("select * from stock_in where id = $id");
  
				 if ($query->num_rows() > 0)
				{ 
				 return $query->row_array();
				}
				else {return NULL;}
			     
		} 

   		public function updateStockinmaster(){

				
				$data = array(
				
				'materialId'  =>    $this->input->post('materialId'),				
				'vendorId'	  =>    $this->input->post('vendorId'),
				'quantity'	  =>	$this->input->post('quantity'),
				'cost'	      =>	$this->input->post('cost'),
				'storageLoc'  =>    $this->input->post('storageLoc'),
				'updatedBy'	   =>	$this->session->userdata('user_name'),
				'createdDate' =>    date("Y/m/d"),
				);
	
				 $this->db->where('id',$this->input->post('id'));
				 $this->db->update('stock_in',$data); 
				 
					}
	   function getVehiclet($id) {

      $query = $this->db->query("SELECT * FROM vehicle WHERE id = '{$id}'");
	      
        if ($query->num_rows > 0) {
            return $query->result();
        }
    }

function getmaterialName()
	{
      $query =$this->db->query("SELECT id,materialName FROM material_master");
			 
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

      $query = $this->db->query("SELECT * FROM vendor_master WHERE id = '{$id}'");
	
         
        if ($query->num_rows > 0) {
            return $query->result();
        }
    }
	function getquantity($id) {

      $query = $this->db->query("SELECT * FROM vendor_master WHERE id = '{$id}'");
	
         
        if ($query->num_rows > 0) {
            return $query->result();
        }
    }

}




?>
