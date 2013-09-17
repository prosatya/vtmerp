<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Vehicle_Model extends CI_Model
{


			public function setVehicleIn() 
			{
				$data = array(
				'vehicle_id'	=>$this->input->post('vehicle_id'),
				'insurer'	   =>	$this->input->post('insurance'),
				'Insurance_expiry_date'	   =>	$this->input->post('insurance_ex_date'),
				'Insurance_cost'  =>	$this->input->post('insurance_cost'),
				'in_value'  =>	$this->input->post('value'),	
				'permit'	   =>	$this->input->post('permit'),
				'permit_expiry_date'	   =>	$this->input->post('permit_ex_date'),
				'permit_cost'  =>	$this->input->post('permit_cost'),	
				'fitness'	   =>	$this->input->post('fitness'),
				'fitness_expiry_date'	   =>	$this->input->post('fitness_ex_date'),
				'fitness_cost'  =>	$this->input->post('fitness_cost'),	
				'roadtax'	   =>	$this->input->post('roadtax'),
				'roadtax_expiry_date'	   =>	$this->input->post('roadtax_ex_date'),
				'roadtax_cost'  =>	$this->input->post('roadtax_cost'),	
				'puc'	   =>	$this->input->post('puc'),
				'puc_expiry_date'	   =>	$this->input->post('puc_ex_date'),
				'puc_cost'  =>	$this->input->post('puc_cost'),	
				'createdBy'	=>      $this->session->userdata('user_name'),
				'create_date'=> date('Y-m-d'),
				);
				$query = $this->db->insert('vehicle_insurance',$data);
				if($query){
				$last_user_id = $this->db->insert_id();
				return $last_user_id;
				} else{
				return false;
				}
			}

			public function getAllVehicleIn($limit, $start){
			$this->load->database();
			$this->db->limit($limit, $start);
			 $query = $this->db->get("vehicle_insurance");
			if ($query->num_rows() > 0)
			{ 
			
				return	 $query->result_array();
				
			}
			else {return NULL;}

		    } 
			public function record_count() {

			return $this->db->count_all("vehicle_insurance");

		    }

		public function getVehicle($id)
		{			
				$this->load->database();
				$query = $this->db->query("select * from vehicle_insurance where id = $id");
  
				 if ($query->num_rows() > 0)
				{ 
						return $query->row_array();
				}
				else {return NULL;}
			     
		} 

   		public function updateVehicle(){

				
				$data = array(
				'vehicle_id'	=>$this->input->post('vehicle_id'),
				'insurer'	   =>	$this->input->post('insurance'),
				'Insurance_expiry_date'	   =>	$this->input->post('insurance_ex_date'),
				'Insurance_cost'  =>	$this->input->post('insurance_cost'),
				'in_value'  =>	$this->input->post('value'),	
				'permit'	   =>	$this->input->post('permit'),
				'permit_expiry_date'	   =>	$this->input->post('permit_ex_date'),
				'permit_cost'  =>	$this->input->post('permit_cost'),	
				'fitness'	   =>	$this->input->post('fitness'),
				'fitness_expiry_date'	   =>	$this->input->post('fitness_ex_date'),
				'fitness_cost'  =>	$this->input->post('fitness_cost'),	
				'roadtax'	   =>	$this->input->post('roadtax'),
				'roadtax_expiry_date'	   =>	$this->input->post('roadtax_ex_date'),
				'roadtax_cost'  =>	$this->input->post('roadtax_cost'),	
				'puc'	   =>	$this->input->post('puc'),
				'puc_expiry_date'	   =>	$this->input->post('puc_ex_date'),
				'puc_cost'  =>	$this->input->post('puc_cost'),	
				'updatedBy'	   =>	$this->session->userdata('user_name'),
				'create_date'=> date("Y/m/d"),
				);
				 
				$this->db->where('id',$this->input->post('id'));
				 $this->db->update('vehicle_insurance',$data); 		
				
					}
	function getVehiclet($id) {
      $query = $this->db->query("SELECT * FROM vehicle_master WHERE id = '{$id}'");
	
  
        if ($query->num_rows > 0) {
            return $query->result();
        }
    }

		public function getAllVehicle($limit, $start){
			$this->load->database();
			$this->db->limit($limit, $start);
			 $query = $this->db->query("select vehicle_master.vehicle_no,vehicle_master.vehicle_type,vehicle_insurance.*  from vehicle_insurance join vehicle_master where vehicle_master.id=vehicle_insurance.vehicle_id");
			if ($query->num_rows() > 0)
			{ 
			
				return	 $query->result_array();
				
			}
			else {return NULL;}

		    } 
		function getVehicleS()
		{		
			$id=$this->input->post('vehicle_id');
			if($id != 'ALL'){
			$this->load->helper('pdf_helper');
			$query =$this->db->query("select vehicle_master.vehicle_no,vehicle_insurance.*  from vehicle_insurance join vehicle_master where vehicle_master.id='".$id."' and vehicle_insurance.vehicle_id='".$id."'");
				if($query->num_rows > 0)
				{
					return $query->result_array();
				}
			}
			else
			{
			$this->load->helper('pdf_helper');
			$query =$this->db->query("select vehicle_master.vehicle_no,vehicle_insurance.*  from vehicle_insurance join vehicle_master where vehicle_master.id=vehicle_insurance.vehicle_id");
				
			if($query->num_rows > 0)
				{
					return $query->result_array();
				}
		
			}

	}
		function getAllV()
		{		
			$id=$this->input->post('vehicle_id');
			$this->load->helper('pdf_helper');
			$query =$this->db->query("select vehicle_master.vehicle_no,vehicle_master.vehicle_type,vehicle_insurance.*  from vehicle_insurance join vehicle_master where vehicle_master.id = vehicle_insurance.vehicle_id");
		

			if($query->num_rows > 0)
			{
				return $query->result_array();
			}

	}

	function getvehicle_No()
	{

			 $query =$this->db->query("SELECT id,vehicle_no,vehicle_type FROM vehicle_master");
			if($query->num_rows > 0)
			{
				return $query->result_array();
			}

	}

	function getVehicleEx()
		{		
			$id=$this->input->post('vehicle_id');
			$v_type=$this->input->post('vehicle_type');
			$d=$this->input->post('date');
			$ed=$this->input->post('edate');
			
			if($id != 'ALL'){
			$this->load->helper('pdf_helper');
			
			$query =$this->db->query("select vehicle_master.vehicle_no,vehicle_master.vehicle_type,vehicle_insurance.*  from vehicle_insurance join vehicle_master where vehicle_master.id='".$id."' and vehicle_insurance.vehicle_id='".$id."'");
				if($query->num_rows > 0)
				{
					return $query->result_array();
				}
			}
			elseif($v_type != 'ALL'){
			$this->load->helper('pdf_helper');
			$query =$this->db->query("select vm.vehicle_no,vm.vehicle_type,vi.Insurance_cost,vi.permit_cost,vi.fitness_cost,vi.roadtax_cost,vi.puc_cost from vehicle_insurance as vi join vehicle_master as vm where  vi.vehicle_id= vm.id AND vm.vehicle_type='".$v_type."'");

				if($query->num_rows > 0)
				{
					return $query->result_array();
				}
			}
			elseif($d != '' && $ed != ''){
			$this->load->helper('pdf_helper');
			 $query =$this->db->query("select vm.vehicle_no,vm.vehicle_type,vi.Insurance_cost,vi.permit_cost,vi.fitness_cost,vi.roadtax_cost,vi.puc_cost from vehicle_insurance as vi join vehicle_master as vm where vi.vehicle_id= vm.id AND vi.create_date BETWEEN '".$d."' AND '".$ed."'");

				if($query->num_rows > 0)
				{
					return $query->result_array();
				}
			}
			else
			{
			$this->load->helper('pdf_helper');
			$query =$this->db->query("select vehicle_master.vehicle_no,vehicle_master.vehicle_type,vehicle_insurance.*  from vehicle_insurance join vehicle_master where vehicle_master.id=vehicle_insurance.vehicle_id");
				
			if($query->num_rows > 0)
				{
					return $query->result_array();
				}
		
			}

	}


}




?>
