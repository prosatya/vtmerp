<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Production_model extends CI_Model
{
	public function addMaterial()
	{	
		$data = array(
				'material' => $this->input->post('material'),
				'size' => $this->input->post('size'),
				'quantity' => $this->input->post('quantity'),
				'cost' => $this->input->post('cost'),
				'createdDate' => date("Y/m/d"),
				'createdBy' => $this->session->userdata('user_name'),
				);
		$query = $this->db->insert('production_material',$data);
			
			if($query){
			$last_user_id = $this->db->insert_id();
			return $last_user_id;
			} else{
			return false;
				}
	} 

	public function getAllMaterial($limit, $start){
			
			$this->db->limit($limit, $start);
			$query = $this->db->get("production_material");

			if ($query->num_rows() > 0)
			{ 
					return $query->result_array();
			}
			else {return NULL;}

		    } 
			public function record_count() {

			return $this->db->count_all("production_material");

		    }
		
	public function getMaterial($id)
	{			
				$this->load->database();
				$query = $this->db->query("select * from production_material where id = '$id'");
  
        if ($query->num_rows() > 0)
        { 
			return $query->row_array();
        }
        else {return NULL;}
     
	} 

	public function updateMaterial(){

		$this->load->database();
		$data = array(
			'material'	=>	$this->input->post('material'),
			'size'		=>	$this->input->post('size'),	
			'quantity'		=>	$this->input->post('quantity'),	
			'cost' => $this->input->post('cost'),
			'updatedDate' => date('Y/m/d'),
			'updatedBy' => $this->session->userdata('user_name'),
			);
		 
		$this->db->where('id',$this->input->post('id'));
		$this->db->update('production_material',$data); 		
		
					}
	function getMaterialV($id){
		$query=$this->db->query("SELECT size,cost,quantity FROM production_material WHERE id='$id'");
		if($query->num_rows > 0)
			{
				return $query->result();
			}
	}
	public function getPlant()
	{			
				$this->load->database();
				$query = $this->db->query("select * from plants");
  
        if ($query->num_rows() > 0)
        { 
			return $query->result_array();
        }
        else {return NULL;}
     
	} 

		public function getMaterials()
	{			
				
				$query = $this->db->query("select * from production_material");
  
        if ($query->num_rows() > 0)
        { 
			return $query->result_array();
        }
        else {return NULL;}
     
	} 
	
	public function addProduct()
	{	$mid=$this->input->post('material');
		$data = array(
				'plantId' => $this->input->post('plant'),
				'materialId' => $this->input->post('material'),
				'quantityProduce' => $this->input->post('orderUnit'),
				'createdDate' => date("Y/m/d"),
				'createdBy' => $this->session->userdata('user_name'),
				);
		$query = $this->db->insert('production_in',$data);
			
			if($query){
		$query = "select quantity from production_material where id = '".$mid."'";
		$result= mysql_query($query);
		$row=mysql_fetch_array($result);
		$q = $row['quantity'];
			
		$newQuantity=$q+$this->input->post('orderUnit');		 
				
		$this->db->where('id',$this->input->post('material'));
		$data= array(
				'quantity' => $newQuantity,				
				);
		$this->db->update('production_material',$data);
			
			
			} else{
			return false;
				}		
	}
	
	public function getAllProductionIn($limit, $start){
			
			$this->db->limit($limit, $start);
			$this->db->select('*');
			$this->db->from('production_in');
			$this->db->join('plants', 'production_in.plantId = plants.id');
			$this->db->join('production_material', 'production_in.materialId = production_material.id');
			$query = $this->db->get();
			if ($query->num_rows() > 0)
			{ 
					return $query->result_array();
			}
			else {return NULL;}

		    } 
	public function record_productionIn(){

			return $this->db->count_all("production_in");

		    }

	public function getProductionIn($id)
	{			
				$this->load->database();
				$query = $this->db->query("select * from production_in where productionIn_id = '$id'");
  				
        if ($query->num_rows() > 0)
        { 
			return $query->row_array();
        }
        else {return NULL;}
     
	} 

	public function updateProductionIn(){
		$id=$this->input->post('id');
		$this->load->database();
		$query = "select * from production_in where productionIn_id = '$id'";
		$result= mysql_query($query);
		$row= mysql_fetch_array($result);
		$q=$row['quantityProduce'];
		$mid=$row['materialId'];
		$newQ=$this->input->post('orderUnit')-$q;
		
		$query1 = "select * from production_material where id = '$mid'";
		$result1= mysql_query($query1);
		$row1= mysql_fetch_array($result1);
		$q1=$row1['quantity'];
		$q2=$newQ+$q1;
		$data = array(
			
			'quantityProduce'		=>	$this->input->post('orderUnit'),	
			
			'updatedDate' => date('Y/m/d'),
			'updatedBy' => $this->session->userdata('user_name'),
			);
		 
		$this->db->where('productionIn_id',$this->input->post('id'));
		$this->db->update('production_in',$data); 		
		$data = array(
			
			'quantity'		=>	$q2,	
			
			'updatedDate' => date('Y/m/d'),
			'updatedBy' => $this->session->userdata('user_name'),
			);
		 
		$this->db->where('id',$mid);
		$this->db->update('production_material',$data); 
					}


		public function addProductOut()
		{	
			$mid=$this->input->post('material');
		$data = array(
				'plantId' => $this->input->post('plant'),
				'materialId' => $this->input->post('material'),
				'quantityOut' => $this->input->post('orderUnit'),
				'createdDate' => date("Y/m/d"),
				'createdBy' => $this->session->userdata('user_name'),
				);
		$query = $this->db->insert('production_out',$data);
			
			if($query){
		$query = "select quantity from production_material where id = '".$mid."'";
		$result= mysql_query($query);
		$row=mysql_fetch_array($result);
		$q = $row['quantity'];
			
		$newQuantity=$q-$this->input->post('orderUnit');		 
				
		$this->db->where('id',$this->input->post('material'));
		$data= array(
				'quantity' => $newQuantity,				
				);
		$this->db->update('production_material',$data);
			
			
			} else{
			return false;
				}		
	}


		public function getAllProductionOut($limit, $start){
			
			$this->db->limit($limit, $start);
			$this->db->select('*');
			$this->db->from('production_out');
			$this->db->join('plants', 'production_out.plantId = plants.id');
			$this->db->join('production_material', 'production_out.materialId = production_material.id');
			$query = $this->db->get();
			if ($query->num_rows() > 0)
			{ 
					return $query->result_array();
			}
			else {return NULL;}

		    } 
	public function record_productionOut(){

			return $this->db->count_all("production_in");

		    }
	public function updateProductionOut(){
		$id=$this->input->post('id');
		$this->load->database();
		$query = "select * from production_out where stockId = '$id'";
		$result= mysql_query($query);
		$row= mysql_fetch_array($result);
		$q=$row['quantityOut'];
		$mid=$row['materialId'];
		$newQ=$this->input->post('orderUnit')-$q;
		
		$query1 = "select * from production_material where id = '$mid'";
		$result1= mysql_query($query1);
		$row1= mysql_fetch_array($result1);
		$q1=$row1['quantity'];
		$q2=$q1-$newQ;
		$data = array(
			
			'quantityOut'		=>	$this->input->post('orderUnit'),	
			
			'updatedDate' => date('Y/m/d'),
			'updatedBy' => $this->session->userdata('user_name'),
			);
		 
		$this->db->where('stockId',$this->input->post('id'));
		$this->db->update('production_out',$data); 		
		$data = array(
			
			'quantity'		=>	$q2,	
			
			'updatedDate' => date('Y/m/d'),
			'updatedBy' => $this->session->userdata('user_name'),
			);
		 
		$this->db->where('id',$mid);
		$this->db->update('production_material',$data); 
					}

	public function getProductionOut($id)
	{			
				$this->load->database();
				$query = $this->db->query("select * from production_out where stockId = '$id'");
  				
        if ($query->num_rows() > 0)
        { 
			return $query->row_array();
        }
        else {return NULL;}
     
	} 
	
}

?>
