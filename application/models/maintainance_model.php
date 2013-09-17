<?php if( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Maintainance_Model extends CI_Model 
{
	public function setMaintainance() 
	{	//oil change	
			
			$data = array(
			'vehicleId'	    =>$this->input->post('vehicle_id'),
			'serviceDescription'=>'Engine Oil',
			'serviceDate'=>$this->input->post('Engine_oil_serviceDate'),
			'mileage'=>$this->input->post('Engine_oil_mileage'),
			'expenseType'=>'oil',
			'cost'=>$this->input->post('Engine_oil_cost'),
			'invoiceNumber'=>$this->input->post('Engine_oil_invoice'),
			'notes'=>$this->input->post('Engine_oil_notes'),
				'createdBy'	=>      $this->session->userdata('user_name'),
			'createDate'=>date('d-m-Y'),
				);		
				$engine_oil=$this->input->post('Engine_oil_mileage');
			
				$data1 = array(
			'vehicleId'	    =>$this->input->post('vehicle_id'),
			'serviceDescription'=>'Hydrolic Oil',
			'serviceDate'=>$this->input->post('Hydrolic_Oil_serviceDate'),
			'mileage'=>$this->input->post('Hydrolic_Oil_mileage'),
			'expenseType'=>'oil',
			'cost'=>$this->input->post('Hydrolic_Oil_cost'),
			'invoiceNumber'=>$this->input->post('Hydrolic_Oil_invoice'),
			'notes'=>$this->input->post('Hydrolic_Oil_notes'),
				'createdBy'	=>      $this->session->userdata('user_name'),
			'createDate'=>date('d-m-Y'),
				);	
							
				$Hydrolic_oil=$this->input->post('Hydrolic_Oil_mileage');
			
						$data2 = array(
			'vehicleId'	    =>$this->input->post('vehicle_id'),
			'serviceDescription'=>'Steering Oil',
			'serviceDate'=>$this->input->post('Steering_Oil_serviceDate'),
			'mileage'=>$this->input->post('Steering_Oil_mileage'),
			'expenseType'=>'oil',
			'cost'=>$this->input->post('Steering_Oil_cost'),
			'invoiceNumber'=>$this->input->post('Steering_Oil_invoice'),
			'notes'=>$this->input->post('Steering_Oil_notes'),
				'createdBy'	=>      $this->session->userdata('user_name'),
			'createDate'=>date('d-m-Y'),
				);		
				$Steering_oil=$this->input->post('Steering_Oil_mileage');
			$data3 = array(
			'vehicleId'	    =>$this->input->post('vehicle_id'),
			'serviceDescription'=>'Break',
			'serviceDate'=>$this->input->post('Breaks_Oil_serviceDate'),
			'mileage'=>$this->input->post('Breaks_Oil_mileage'),
			'expenseType'=>'oil',
			'cost'=>$this->input->post('Breaks_Oil_cost'),
			'invoiceNumber'=>$this->input->post('Breaks_Oil_invoice'),
			'notes'=>$this->input->post('Breaks_oil_notes'),
				'createdBy'	=>      $this->session->userdata('user_name'),
			'createDate'=>date('d-m-Y'),
				);		
				$Breaks_oil=$this->input->post('Breaks_Oil_mileage');
			//Engine oil
							if($this->input->post('submit')){
				if($engine_oil!= null){
			$query = $this->db->insert('vehiclemaintainance',$data);
			}
}
		//hydrolic
						if($this->input->post('submit')){
			if($Hydrolic_oil!= null){
			$query = $this->db->insert('vehiclemaintainance',$data1);
			}
}
		//steering
			if($this->input->post('submit')){
				if($Steering_oil!= null){
			$query = $this->db->insert('vehiclemaintainance',$data2);
			}
}

		//break
			if($this->input->post('submit')){
				if($Breaks_oil!= null){
			$query = $this->db->insert('vehiclemaintainance',$data3);
			}
}

//captive
		//wheel
		$data4 = array(
			'vehicleId'	    =>$this->input->post('vehicle_id'),
			'serviceDescription'=>'Wheel Basing',
			'serviceDate'=>$this->input->post('Wheel_Basing_serviceDate'),
			'mileage'=>$this->input->post('Wheel_Basing_mileage'),
			'expenseType'=>'Captive',
			'cost'=>$this->input->post('Wheel_Basing_cost'),
			'invoiceNumber'=>$this->input->post('Wheel_Basing_invoice'),
			'notes'=>$this->input->post('Wheel_Basing_notes'),
				'createdBy'	=>      $this->session->userdata('user_name'),
			'createDate'=>date('d-m-Y'),
				);		
				$Wheel_Basing_oil=$this->input->post('Wheel_Basing_mileage');
			if($this->input->post('submit')){
		if($Wheel_Basing_oil!= null){
			$query = $this->db->insert('vehiclemaintainance',$data4);
			}
}
			
			//Brake liner
		$data5 = array(
			'vehicleId'	    =>$this->input->post('vehicle_id'),
			'serviceDescription'=>'Break Liner',
			'serviceDate'=>$this->input->post('bl_serviceDate'),
			'mileage'=>$this->input->post('bl_mileage'),
			'expenseType'=>'oil',
			'cost'=>$this->input->post('bl_cost'),
			'invoiceNumber'=>$this->input->post('bl_invoice'),
			'notes'=>$this->input->post('bl_notes'),
				'createdBy'	=>      $this->session->userdata('user_name'),
			'createDate'=>date('d-m-Y'),
				);		
				$bl_oil=$this->input->post('bl_mileage');
			if($this->input->post('submit')){
		if($bl_oil!= null){
			$query = $this->db->insert('vehiclemaintainance',$data5);
			}
		}
		
		//GEAR
		$data6 = array(
			'vehicleId'	    =>$this->input->post('vehicle_id'),
			'serviceDescription'=>'Gear',
			'serviceDate'=>$this->input->post('Gear_serviceDate'),
			'mileage'=>$this->input->post('Gear_mileage'),
			'expenseType'=>'oil',
			'cost'=>$this->input->post('Gear_cost'),
			'invoiceNumber'=>$this->input->post('Gear_invoice'),
			'notes'=>$this->input->post('Gear_notes'),
				'createdBy'	=>      $this->session->userdata('user_name'),
			'createDate'=>date('d-m-Y'),
				);		
				$Gear_oil=$this->input->post('Gear_mileage');
			if($this->input->post('submit')){
		if($Gear_oil!= null){
			$query = $this->db->insert('vehiclemaintainance',$data6);
			}
		}

		//bearing
		$data7 = array(
			'vehicleId'	    =>$this->input->post('vehicle_id'),
			'serviceDescription'=>'Bearing',
			'serviceDate'=>$this->input->post('Bearing_serviceDate'),
			'mileage'=>$this->input->post('Bearing_mileage'),
			'expenseType'=>'oil',
			'cost'=>$this->input->post('Bearing_cost'),
			'invoiceNumber'=>$this->input->post('Bearing_invoice'),
			'notes'=>$this->input->post('Bearing_notes'),
				'createdBy'	=>      $this->session->userdata('user_name'),
			'createDate'=>date('d-m-Y'),
				);		
				$Bearing_oil=$this->input->post('Bearing_mileage');
			if($this->input->post('submit')){
		if($Bearing_oil!= null){
			$query = $this->db->insert('vehiclemaintainance',$data7);
			}
		}

	//ring
		$data8 = array(
			'vehicleId'	    =>$this->input->post('vehicle_id'),
			'serviceDescription'=>'Ring',
			'serviceDate'=>$this->input->post('Ring_serviceDate'),
			'mileage'=>$this->input->post('Ring_mileage'),
			'expenseType'=>'oil',
			'cost'=>$this->input->post('Ring_cost'),
			'invoiceNumber'=>$this->input->post('Ring_invoice'),
			'notes'=>$this->input->post('Ring_notes'),
				'createdBy'	=>      $this->session->userdata('user_name'),
			'createDate'=>date('d-m-Y'),
				);		
				$Ring_oil=$this->input->post('Ring_mileage');
			if($this->input->post('submit')){
		if($Ring_oil!= null){
			$query = $this->db->insert('vehiclemaintainance',$data8);
			}
	}
	//liner
		$data9 = array(
			'vehicleId'	    =>$this->input->post('vehicle_id'),
			'serviceDescription'=>'Liner',
			'serviceDate'=>$this->input->post('Liner_serviceDate'),
			'mileage'=>$this->input->post('Liner_mileage'),
			'expenseType'=>'oil',
			'cost'=>$this->input->post('Liner_cost'),
			'invoiceNumber'=>$this->input->post('Liner_invoice'),
			'notes'=>$this->input->post('Liner_notes'),
				'createdBy'	=>      $this->session->userdata('user_name'),
			'createDate'=>date('d-m-Y'),
				);		
				$Liner_oil=$this->input->post('Liner_mileage');
			if($this->input->post('submit')){
		if($Liner_oil!= null){
			$query = $this->db->insert('vehiclemaintainance',$data9);
			}
	}
	//piston
		$data10 = array(
			'vehicleId'	    =>$this->input->post('vehicle_id'),
			'serviceDescription'=>'Piston',
			'serviceDate'=>$this->input->post('Piston_serviceDate'),
			'mileage'=>$this->input->post('Piston_mileage'),
			'expenseType'=>'oil',
			'cost'=>$this->input->post('Piston_cost'),
			'invoiceNumber'=>$this->input->post('Piston_invoice'),
			'notes'=>$this->input->post('Piston_notes'),
				'createdBy'	=>      $this->session->userdata('user_name'),
			'createDate'=>date('d-m-Y'),
				);		
				$Piston_oil=$this->input->post('Piston_mileage');
			if($this->input->post('submit')){
		if($Piston_oil!= null){
			$query = $this->db->insert('vehiclemaintainance',$data10);
			}
		}

	//wiring
		$data11 = array(
			'vehicleId'	    =>$this->input->post('vehicle_id'),
			'serviceDescription'=>'Wiring',
			'serviceDate'=>$this->input->post('wiring_serviceDate'),
			'mileage'=>$this->input->post('wiring_mileage'),
			'expenseType'=>'oil',
			'cost'=>$this->input->post('wiring_cost'),
			'invoiceNumber'=>$this->input->post('wiring_invoice'),
			'notes'=>$this->input->post('wiring_notes'),
				'createdBy'	=>      $this->session->userdata('user_name'),
			'createDate'=>date('d-m-Y'),
				);		
				$wiring_oil=$this->input->post('wiring_mileage');
			if($this->input->post('submit')){
		if($wiring_oil!= null){
			$query = $this->db->insert('vehiclemaintainance',$data11);
			}
}
}
				
	public function getAllMaintainance()
	{
		$this->load->database();	
		$query = $this->db->get('vehiclemaintainance');
				
		return $query->result_array();
	}

		public function getAll($limit, $start){
			
			$this->db->limit($limit, $start);
			$query = $this->db->get("vehiclemaintainance");

			if ($query->num_rows() > 0)
			{ 
					return $query->result_array();
			}
			else {return NULL;}

		    } 
			public function record_count() {

			return $this->db->count_all("vehiclemaintainance");

		    }

		public function getMaintainance($id)
		{
		$this->load->database();
				$query = $this->db->query("select * from vehicle_maintainance where id = $id");
  
        if ($query->num_rows() > 0)
        { 
			return $query->row_array();
        }
        else {return NULL;}
     
		}
		public function updateMaintainance()
		{
			$this->load->database();
		    $data = array(
			'vehicle_id'	                      =>	$this->input->post('vehicle_id'),
			'engine_oil_change_date'  =>	$this->input->post('engine_oil_change_date'),
			'tyres_change_date'  	      =>	$this->input->post('tyres_change_date'),	
			'gear_box_change_date'	  =>	$this->input->post('gear_box_change_date'),
			'battery_change_date'		  =>	$this->input->post('battery_change_date'), 
			'brakes_change_date'	      =>	$this->input->post('brakes_change_date'),		
			'engine_oil_cost'			      =>	$this->input->post('engine_oil_cost'),
			'tyres_cost'		                  =>	$this->input->post('tyres_cost'),
			'gear_box_cost'			      =>	$this->input->post('gear_box_cost'),
			'battery_cost'		              =>	$this->input->post('battery_cost'),
			'brakes_cost'	               	  =>	$this->input->post('brakes_cost'),
			'servicing_date'		          =>	$this->input->post('servicing_date'),
			'servicing_cost'		          =>	$this->input->post('servicing_cost'),
			'updatedBy'	   =>	$this->session->userdata('user_name'),
			);
		 
		$this->db->where('id',$this->input->post('id'));
		$this->db->update('vehiclemaintainance',$data); 		
		
		}

function getvehicle_No()
	{

			 $query =$this->db->query("SELECT id,vehicle_no FROM vehicle_master");
			if($query->num_rows > 0)
			{
				return $query->result();
			}

}
}
?>
