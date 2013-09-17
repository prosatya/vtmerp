<?php ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Vendor extends CI_Model 
{
	public function setDistance() 
	{
			$data = array(
			'vendorname'	      =>	$this->input->post('vendorname'),
			'address1'	      =>	$this->input->post('address1'),
			'address2'  	      =>	$this->input->post('address2'),	
			'city'		      =>	$this->input->post('city'),
			'state'		      =>	$this->input->post('state'), 
			'pincode'	      =>	$this->input->post('pincode'),		
			'phone'		      =>	$this->input->post('phone'),
			'mobile'	      =>	$this->input->post('mobile'),
			'notes'		      =>	$this->input->post('notes'),
			'createdBy'	      =>        $this->session->userdata('user_name'),
			'msupply'	      =>	$this->input->post('msupply'),
			
			);
			$query = $this->db->insert('vendor_master',$data);
			
			
			if($query){
			$last_user_id = $this->db->insert_id();
			return $last_user_id;
			} else{
			return false;
			}
	}
}
?>
