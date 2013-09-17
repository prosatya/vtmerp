<?php 
class Ajax extends CI_Controller
{
	public function __construct() {
			       	 parent:: __construct();
		$this->load->helper("url");
	      $this->load->model("vehicle_model");
		$this->load->library("pagination");
		$this->load->database();
	    }
		function vehicleShow() {
		$id= $this->uri->segment(3);
		$this->load->model("fuel_model");
            	$arrV = $this->fuel_model->getVehiclet($id);
		
		error_reporting(0);
		foreach ($arrV as $v) {
           	 echo $arrFinal[$v->vehicle_type] = $v->vehicle_type.",";
		echo  $arrFinal[$v->make] = $v->make;
            }
      } 
		function vendorName()
		{

		$id= $this->uri->segment(3);
		$this->load->model("fuel_model");
		$arrV=$this->fuel_model->getVendorN($id);
		
		error_reporting(0);
		foreach($arrV as $v)	
			{
			echo $arrFinal[$v->vendor_name] = $v->vendor_name.",";
		echo  $arrFinal[$v->mobile] = $v->mobile;
			
			}	
		} 

		function distance()
		{
		 $id= $this->uri->segment(3);
		$a=explode('-', $id);
		$from=$a[0];
		$to=$a[1];
		$this->load->model("distance_model");	
       		$arrV = $this->distance_model->getDistance($from,$to);
			$a=count($arrV);
			if($a>0){
		foreach($arrV as $v)	
			{
			echo  $arrFinal[$v->distance] = $v->distance;
			}	
}
		}	
     
	function driverShow()
	{
	 $id= $this->uri->segment(3);
		$this->load->model("vehicletrip_model");
            $arrV = $this->vehicletrip_model->getDriverD($id);
		error_reporting(0);
		foreach ($arrV as $v) {
           	    echo $arrFinal[$v->license_no] = $v->license_no.",";
		echo  $arrFinal[$v->mobile] = $v->mobile;
            }
	
	}
		function materialCost(){
		$id=$this->uri->segment(3);
		$this->load->model("stockout_model");
		$arrV=$this->stockout_model->getMaterialCost($id);
	
				error_reporting(0);
		foreach ($arrV as $v) {
           	    echo $arrFinal[$v->cost] = $v->cost.",";
			echo $arrFinal[$v->quantity] = $v->quantity;
            }
	}
	

		function productionMaterial(){
		$id=$this->uri->segment(3);
		$this->load->model("production_model");
		$arrV=$this->production_model->getMaterialV($id);
		
				error_reporting(0);
		foreach ($arrV as $v) {
           	    echo $arrFinal[$v->size] = $v->size.",";
			echo $arrFinal[$v->cost] = $v->cost;
            }
	}
	
	function productionMaterialOut(){
		$id=$this->uri->segment(3);
		$this->load->model("production_model");
		$arrV=$this->production_model->getMaterialV($id);
		
				error_reporting(0);
		foreach ($arrV as $v) {
           	    echo $arrFinal[$v->size] = $v->size.",";
			echo $arrFinal[$v->quantity] = $v->quantity.",";
			echo $arrFinal[$v->cost] = $v->cost;
            }
	}
     
}
?>
