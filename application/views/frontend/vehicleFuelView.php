<?php include("includes/header.php"); ?>
<script>
            $(document).ready(function(){
              
    //* validation
    $('#vehicleFuel').validate({
     onkeyup: false,
     errorClass: 'error',
     validClass: 'valid',
     rules: {
	vehicle_id:{required: true,},
      diesel_vendor: { required: true, },
	material_supply: { required: true, },
	mobile: { required: true, },
      diesel_slip_no: { required: true, },
      start_reading:{ required: true,
		number: true,},
	close_reading: { required: true,number: true, },
      total_reading: { required: true,number: true, },
      average:{ required: true, number: true,},
	slip_no: { required: true, },
      opening_km: { required: true,number: true,},
      closing_km:{ required: true,number: true,},
	quantity:{ required: true,number: true,},
     },
     highlight: function(element) {
      $(element).closest('div').addClass("f_error");
      setTimeout(function() {
       boxHeight()
      }, 200)
     },
     unhighlight: function(element) {
      $(element).closest('div').removeClass("f_error");
      setTimeout(function() {
       boxHeight()
      }, 200)
     },
     errorPlacement: function(error, element) {
      $(element).closest('div').append(error);
     }
    });
            });
        </script>

   <script type="text/javascript">
            $(document).ready(function () {


                $('#vehicle_id').change(function () {

			var vehicleid = $(this).attr('value');
			//console.log(vehicleid);

			$.ajax({   
		
                        url: "<?php echo base_url(); ?>ajax/vehicleShow/"+vehicleid, //The url where the server req would we made.
                        async: false,
                        type: "POST", //The type which you want to use: GET/POST
                        dataType: "html", //Return data type (what we expect).
                             
                        //This is the function which will be called if ajax call is successful.
                        success: function(data) {
			var d=data;
	
		
		var myArray = d.split(',');
		for(var i=0;i<myArray.length;i++){

		if(i==0){


			$('#vehicle_type').val(myArray[i]);
}
else{
		
		$('#make').val(myArray[i]);

}
    } 
}
         })

                });

 });
        </script>

	<!--<script type="text/javascript">
            $(document).ready(function () {


                $('#diesel_vendor').change(function () {

		
                    var vehicleid = $(this).attr('value');

                    console.log(vehicleid);

                    $.ajax({   
		
                        url: "<?php echo base_url(); ?>/ajax/vendorName/"+vehicleid, //The url where the server req would we made.
                        async: false,
                        type: "POST", //The type which you want to use: GET/POST
                        dataType: "html", //Return data type (what we expect).
                             
                        //This is the function which will be called if ajax call is successful.
                        success: function(data) {
			var d=data;

		var myArray = d.split(',');
		for(var i=0;i<myArray.length;i++){

		if(i==0){


			$('#material_supply').val(myArray[i]);
}
else{
		
		$('#mobile').val(myArray[i]);
		

}
    }
    }
})

        });
            });
        </script>

-->
            <!-- main content -->
            <div id="contentwrapper">
                <div class="main_content">
                    
                    <nav>
                        <div id="jCrumbs" class="breadCrumb module">
                            <ul>
                                <li>
                                    <a href="#"><i class="icon-home"></i></a>
                                </li>
                                <li>
                                    <h3 style="color:#39c">Vehicle Fuel</h3>
                                </li>
                            </ul>
                        </div>
                    </nav>
<?php 
     
                    if ($this->session->flashdata('registrationmessage') != ''){
      echo '<div class="box_error">';
                      echo $this->session->flashdata('registrationmessage'); 
                     echo '</div>';
     }
     ?>
     <?php   	
			$attributes = array('name' => 'vehicleFuel', 'id' => 'vehicleFuel');	   
	  		echo form_open('vehicleFuel/addVehicleFuel' , $attributes);
			
       ?>
                        
                        <div class="displa_table">
                            <table class="table table-bordered table-striped" id="smpl_tbl" style="border:none">
								
								<tbody>

<tr style="border:none; background-color:#FFF;"> <td><div class="row-fluid"><label>Vehicle_ID<span class="f_req">*</span></label>

<select name="vehicle_id"id="vehicle_id">
<option value="">Select Vehicle</option>
<?php
$a=count($vehicleno);
			if($a>0){
		foreach($vehicleno as $row){

?>
<option value="<?php echo $row->id; ?>"><?php echo $row->vehicle_no; ?></option>
<?php
}
}
 ?>
</select>
                                            
                                       </div></td>				

		<td><div class="row-fluid" id="vehicleType"><label>Vehicle Type<span class="f_req">*</span></label>
                                           <?php $atts = array(
													  'name' => 'vehicle_type',
													  'id'   => 'vehicle_type',
													  'size' => 50,
									                                  'readonly'=>'readonly',
											
													  
													  
										   ); ?>
                                             <?php echo form_input($atts); ?>
                                            
                                       </div></td>

										<td><div class="row-fluid"><label>Make<span class="f_req">*</span></label>
                                        <?php $atts = array(
													  'name' => 'make',
													  'id'   => 'make',
													  'size' => 50,
													'readonly'=>'readonly',
													   
										   ); ?>
						                    <?php echo form_input($atts); ?>
                                        </div></td>

                          </tr>



<tr style="border:none; background-color:#FFF;"> 
		<td><div class="row-fluid" id="vehicleType"><label>Vendor Name<span class="f_req">*</span></label>
<!--<select name="diesel_vendor"id="diesel_vendor">
<option value="">Select Vendor</option>
<?php
$a=count($vendorName);
			if($a>0){
		foreach($vendorName as $row){

?>
<option value="<?php echo $row->vendor_name; ?>"><?php echo $row->vendor_name; ?></option>
<?php
}
}
 ?>
</select>

<div class="row-fluid" id="vehicleType"><label>Diesel_Vendor<span class="f_req">*</span></label>-->
                                           <?php $atts = array(
													  'name' => 'diesel_vendor',
													  'id'   => 'diesel_vendor',
													  'size' => 50,		  
										   ); ?>
                                             <?php echo form_input($atts); ?>
                                            
                                       </div></td>

										<td><div class="row-fluid"><label>Material Supply<span class="f_req">*</span></label>
                                        <?php $atts = array(
													  'name' => 'material_supply',
													  'id'   => 'material_supply',
													  'size' => 50,
												
													
													   
										   ); ?>
						                    <?php echo form_input($atts); ?>
                                        </div></td>

						
										<td><div class="row-fluid"><label>Mobile<span class="f_req">*</span></label>
                                           <?php $atts = array(
													  'name' => 'mobile',
													  'id'   => 'mobile',
													  'size' => 50,
														
													  
													  
										   ); ?>
                                             <?php echo form_input($atts); ?>
                                            
                                       </div></td>
						</tr>







									<tr style="border:none; background-color:#FFF;"> 
		
										<td><div class="row-fluid"><label>Diesel_Slip_No.<span class="f_req">*</span></label>
                                        <?php $atts = array(
													  'name' => 'diesel_slip_no',
													  'id'   => 'diesel_slip_no',
													  'size' => 50,
													
													   
										   ); ?>
						                    <?php echo form_input($atts); ?>
                                        </div></td>

						
										<td><div class="row-fluid"><label>Start_Reading<span class="f_req">*</span></label>
                                           <?php $atts = array(
													  'name' => 'start_reading',
													  'id'   => 'start_reading',
													  'size' => 50
													  
													  
										   ); ?>
                                             <?php echo form_input($atts); ?>
                                            
                                       </div></td>
					
										<td><div class="row-fluid"><label>Close_Reading<span class="f_req">*</span></label>
                                        <?php $atts = array(
													  'name' => 'close_reading',
													  'id'   => 'close_reading',
													  'size' => 50
													   
										   ); ?>
						                    <?php echo form_input($atts); ?>
                                        </div></td>
					
	</tr>
					<tr style="border:none; background-color:#FFF;">

                                        <td><div class="row-fluid"><label>Total_Reading<span class="f_req">*</span></label>
                                       <?php $atts = array(
													
													  'name' => 'total_reading',
													  'id'   => 'total_reading',
													  'size' => 35
													
										   ); ?>
                                             <?php echo form_input($atts); ?>
                                        </div></td>									
										
										<td><div class="row-fluid"><label>Average<span class="f_req">*</span></label>
                                           <?php $atts = array(
													  'name' => 'average',
													  'id'   => 'average',
													  'size' => 50
													  
													  
										   ); ?>
                                             <?php echo form_input($atts); ?>
                                            
                                       </div></td>
 				<td><div class="row-fluid"><label>Opening KM <span class="f_req">*</span></label>
                                       <?php $atts = array(
													
													  'name' => 'opening_km',
													  'id'   => 'opening_km',
													  'size' => 35
													
										   ); ?>
                                             <?php echo form_input($atts); ?>
                                        </div></td>
		

									
					
									
                                        		</tr>
	<tr style="border:none; background-color:#FFF;">			
				<td><div class="row-fluid"><label>Closing KM<span class="f_req">*</span></label>
                                           <?php $atts = array(
													  'name' => 'closing_km',
													  'id'   => 'closing_km',
													  'size' => 50
													  
													  
										   ); ?>
                                             <?php echo form_input($atts); ?>
                                            
                                       </div></td>
			<td><div class="row-fluid"><label>Quantity<span class="f_req">*</span></label>
                                           <?php $atts = array(
													  'name' => 'quantity',
													  'id'   => 'quantity',
													  'size' => 50
													  
													  
										   ); ?>
                                             <?php echo form_input($atts); ?>
                                            
                                       </div></td>						
			</tr>

					
                                    <tr>
							
                                       						<td rowspan="3">
                                        <?php  
										 $atts = array(
													  'name' => 'vehicle_fuel',
													  'value'   => 'Submit',
													  'class' => "btn btn-inverse",
										   );
										  echo form_submit($atts);
										  ?>
                                         
                                          <?php
										  $atts = array(
													  'name' => 'cancel',
													  'value'   => 'Cancel',
													  'class' => "btn btn-inverse",
													  
													  
										   );
                                          echo form_reset($atts); ?>
                                     	   </td>
									</tr>
                                    
								</tbody>
							</table>
                        
                        </div>
                        <div class="displa_table">
                            <table class="table table-bordered table-striped" id="smpl_tbl">
								<thead>
									<tr>
										
										<th><center>S.No<center></th>
										<th><center>Diesel Vendor<center></th>
										<th><center>Diesel Slip No<center></th>
                                        					<th><center>Start Reading<center></th>
										<th><center>Close Reading<center></th>
										<th><center>Total Reading<center></th>
										<th><center>Average<center></th>
										
										<th><center>Opening Km<center></th>
										<th><center>Closing Km<center></th>
										<th><center>Quantity<center></th>
										<th><center>Edit<center></th>
									</tr>
								</thead>
								<tbody>
                                <?php
		$a=count($records);
			if($a>0){
								$sno = 0;
								foreach($records as $row){
									$sno = $sno + 1;
								 ?>
									<tr>
										<td><center><?php echo $sno; ?></center> </td>
										<td><center><?php echo $row['diesel_vendor']; ?></center></td>
										<td><center><?php echo $row['diesel_slip_no']; ?></center></td>
										<td><center><?php echo $row['start_reading']; ?></center></td>
										<td><center><?php echo $row['close_reading']; ?></center></td>
										<td><center><?php echo $row['total_reading']; ?></center></td>
										<td><center><?php echo $row['average']; ?></center></td>
										<td><center><?php echo $row['opening_km']; ?></center></td>
										<td><center><?php echo $row['closing_km']; ?></center></td>
										<td><center><?php echo $row['quantity']; ?></center></td>
																				<td><center><a href="<?php echo base_url(); ?>/index.php?vehicleFuel/edit_vehicleFuel/<?php echo $row['id']; ?>" class="sepV_a" title="Edit"><i class="icon-pencil"></i></a></center>
				</td>
									</tr>
								<?php } 
}
?>	
								</tbody>
							</table>
                         <p><?php echo $links; ?></p>
                        </div>
                    </div>
                        
                </div>
                
            </div>
            
		<?php include("includes/sidebar.php"); ?>	

