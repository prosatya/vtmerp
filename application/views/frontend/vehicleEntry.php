<?php include("includes/header.php"); ?>
<script>
$(document).ready(function(){ 
    $("#lease").click(function() {
         $("#vendorDiv").show();
         }); 
		 $("#owner").click(function() {
		          $("#vendorDiv").hide();
         }); 
});
</script>
 <script>
            $(document).ready(function(){
			$('#lease_start_date').Zebra_DatePicker();
			$('#lease_end_date').Zebra_DatePicker();
			$('#dob').Zebra_DatePicker({
		     // remember that the way you write down dates
    		 // depends on the value of the "format" property!
      		view: 'years'
    		});
     //* validation

    $('#vehicle').validate({

     onkeyup: false,

     errorClass: 'error',

     validClass: 'valid',

     rules: {

      vehicle_no: { required: true},

		vehicle_type: { required: true },
		make_year: { required: true },
		model_no: { required: true },
		vehicle_no:{required:true},
		engine_no: { required: true },
	    weight_capacity:{required: true},
	    make:{required: true},
    	chasis_no:{number: true},
	   
	    cost:{number: true,},
	meter_type:{required: true},	
	

      //description:{required: true},
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

     }

    });
    }); 
 $('#vendor_id').change(function () {

		
                    var vehicleid = $(this).attr('value');

                    console.log(vehicleid);

                    $.ajax({   
		
                        url: "index.php?ajax/vendorName/"+vehicleid, //The url where the server req would we made.
                        async: false,
                        type: "GET", //The type which you want to use: GET/POST
                        dataType: "html", //Return data type (what we expect).
                         
                        //This is the function which will be called if ajax call is successful.
                        success: function(data) {
			var d=data;

		var myArray = d.split(',');
		for(var i=0;i<myArray.length;i++){

		if(i==0){


			//$('#lease_startdate').val(myArray[i]);
}
else{
		
		//$('#lease_enddate').val(myArray[i]);
		

}
    }
	    }

                    })
                });
 </script>

 
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
                                     <h3 style="color:#39c">Vehicle Master</h3>
                                </li>
                                                          </ul>
                        </div>
                    </nav>
     <?php
        	
			$attributes = array('name' => 'vehicle', 'id' => 'vehicle');	   
	  		echo form_open('vehicle/addVehicle' , $attributes);
       ?>
       <div class="displa_table">
       <table class="table table-bordered table-striped" id="smpl_tbl" style="border:none">
								
								<tbody>
									<tr style="border:none; background-color:#FFF;">
										<td><div class="row-fluid"><label>Vehicle Type<span class="f_req">*</span></label>
                                        <select name="vehicle_type"id="vehicle_type">
                                        <option value="">Select Vehicle</option>
                                        <option value ="Truck">Truck</option>
                                        <option value ="Dumpher">Dumpher</option>
                                        <option value ="JCB">JCB</option>
                                        <option value="Tractor">Tractor</option>
                                        <option value ="Trala">Trala</option>
                                        <option value="Transit Mixtures">Transit Mixtures</option>                                 <option value ="Tippers">Tippers</option>
				</select>
                                        </div></td>
                                        <td><div class="row-fluid"><label>Make Year<span class="f_req"></span></label>
                                           <?php $atts = array(
													  'name' => 'make_year',
													  'id'   => 'make_year',
													  'size' => 35
										   ); ?>
                                             <?php echo form_input($atts); ?>
                                        </div></td>
                                          <td><div class="row-fluid"><label>Model No<span class="f_req"></span></label>
                                           <?php $atts = array(
													  'name' => 'model_no',
													  'id'   => 'model_no',
													  'size' => 50
													  
													  
										   ); ?>
                                             <?php echo form_input($atts); ?>
                                            
                                       </div></td>
									</tr>
                                    

						<tr style="border:none; background-color:#FFF;">
                        <td><div class="row-fluid"><label>Vehicle No<span class="f_req">*</span></label>
                                           <?php $atts = array(
													  'name' => 'vehicle_no',
													  'id'   => 'vehicle_no',
													  'size' => 50
													  
										   ); ?>
                                             <?php echo form_input($atts); ?>
                                            
                                       </div></td>
                                       <td><div class="row-fluid"><label>Engine No<span class="f_req">*</span></label>
                                           <?php $atts = array(
													  'name' => 'engine_no',
													  'id'   => 'engine_no',
													  'size' => 50
													  
										   ); ?>
                                             <?php echo form_input($atts); ?>
                                            
                                       </div></td>
                                       <td><div class="row-fluid"><label>Chasis No<span class="f_req"></span></label>
                                          <?php $atts = array(
													  'name' => 'chasis_no',
													  'id'   => 'chasis_no',
													  'size' => 50
													   
										   ); ?>
						                    <?php echo form_input($atts); ?>
                                        </div></td>
                                        </tr>
                                        <tr style="border:none; background-color:#FFF;">
					               <td><div class="row-fluid"><label>Color<span class="f_req"></span></label>
                                           <?php $atts = array(
													  'name' => 'color',
													  'id'   => 'color',
													  'size' => 50
													  
													  
										   ); ?>
                                             <?php echo form_input($atts); ?>
                                            
                                       </div></td>
                                       <td><div class="row-fluid"><label>Make<span class="f_req">*</span></label>
                                           <?php $atts = array(
													  'name' => 'make',
													  'id'   => 'make',
													  'size' => 50
													  
													  
										   ); ?>
                                             <?php echo form_input($atts); ?>
                                            
                                       </div></td>
                                        <td><div class="row-fluid"><label>Cost<span class="f_req"></span></label>
                                           <?php $atts = array(
													  'name' => 'cost',
													  'id'   => 'cost',
													  'size' => 50
													  
													  
										   ); ?>
                                             <?php echo form_input($atts); ?>
                                            
                                       </div></td>
                                       </tr>
                                       <tr style="border:none; background-color:#FFF;">
                                       <td><div class="row-fluid"><label>Weight Capacity<span class="f_req">*</span></label>
                                           <?php $atts = array(
													  'name' => 'weight_capacity',
													  'id'   => 'weight_capacity',
													  'size' => 50
													  
													  
										   ); ?>
                                             <?php echo form_input($atts); ?>
                                            
                                       </div></td>
										
                                        <td><div class="row-fluid"> <label id="vehicle_ownership">Vehicle Ownership<span class="f_req">*</span></label>
                                    
                                      Owner <input type="radio" name="myradio" value="Owner" id="owner" <?php echo set_radio('myradio', 'Owner', TRUE); ?> />
									  Lease  <input type="radio" name="myradio" value="Lease" id="lease" <?php echo set_radio('myradio', 'Lease'); ?> />
                                      </div></td>
				<td><div class="row-fluid"><label>Meter Type<span class="f_req"></span></label>
                                       <?php $atts = array(
													
													  'name' => 'meter_type',
													  'id'   => 'meter_type',
													'value' => 'km',
													'checked' => 'true'
										     ); ?>
                                            Km Wise <?php echo form_radio($atts); ?>
					<?php $atts = array(
													
													  'name' => 'meter_type',
													  'id'   => 'meter_type',
													'value' => 'hourly',
								     ); ?>
                                            Hourly <?php echo form_radio($atts); ?>
                                        </div></td>
					</tr>
<tr>
                              <td><div class="row-fluid"><label>Description<span class="f_req"></span></label>
                                       <?php $atts = array(
													
													  'name' => 'description',
													  'id'   => 'description',
													  'rows' => 1,
													   'cols' => 1,
										   ); ?>
                                             <?php echo form_textarea($atts); ?>
                                        </div></td>
                                   
										</tr>
                                      
                                        <tr id="vendorDiv" style="border:none; background-color:#FFF;display:none;">
                                        
                                        <td><div class="row-fluid" id="vendor_id"><label>Vendor Id<span class="f_req">*</span></label>

<select name="vendor_id"id="vendor_id">
<option value="">Select Vendor</option>
<?php

$a=count($vendorName);
			if($a>0){
		foreach($vendorName as $row){

?>
<option value="<?php echo $row['id']; ?>"><?php echo $row['vendor_name']; ?></option>
<?php
}
}
 ?>
</select></div></td>
										<td><div class="row-fluid"><label>Lease Start Date<span class="f_req"></span></label>
                                        <?php $atts = array(
													  'name' => 'lease_start_date',
													  'id'   => 'lease_start_date',
													  'size' => 50
													   
										   ); ?>
						                    <?php echo form_input($atts); ?>
                                        </div></td>
                                 <td><div class="row-fluid"><label>Lease End Date<span class="f_req"></span></label>
                                           <?php $atts = array(
													  'name' => 'lease_end_date',
													  'id'   => 'lease_end_date',
													  'size' => 50
													  
													  
										   ); ?>
                                             <?php echo form_input($atts); ?>
                                       </div></td></tr>
									
                                    <tr>
											<td rowspan="3">
                                        <?php  
										 $atts = array(
													  'name' => 'registration',
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
                                     	   </td></tr>
                                             
								</tbody>
							</table>
                        
                        </div>
                        <div class="displa_table">
                            <table class="table table-bordered table-striped" id="smpl_tbl">
								<thead>
									<tr>
										
										<th><center>S.No</center></th>
										<th><center>Vehicle No</center></th>
                                        					<th><center>Vehicle Type</center></th>
										<th><center>Make Year</center></th>
                                        					<th><center>Model No</center></th>
										<th><center>Engine No</center></th>
                                        					<th><center>Chasis No</center></th>
                                         					<th><center>Vehicle Ownership</center></th>
					                               		<th><center>Edit</center></th>
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
				<td><center><?php echo $sno; ?> </center></td>
				<td><center><?php echo $row['vehicle_no']; ?></center></td>
				<td><center><?php echo $row['vehicle_type']; ?></center></td>
				<td><center><?php echo $row['make_year']; ?></center></td>					      
				<td><center><?php echo $row['model_no']; ?></center></td>
				<td><center><?php echo $row['engine_no']; ?></center></td>
				<td><center><?php echo $row['chasis_no']; ?></center></td>
				<td><center><?php echo $row['vehicle_ownership']; ?></center></td>                                  
<td><center><a href="<?php echo base_url(); ?>/index.php?vehicle/editVehicle/<?php echo $row['id']; ?>" class="sepV_a" title="Edit"><i class="icon-pencil"></i></a></center></td>

									</tr>
								<?php } 
}?>	
								</tbody>
							</table>
                         <p><?php echo $links; ?></p>
                        </div>
                    </div>
                        
                </div>
                
            </div>
            
		<?php include("includes/sidebar.php"); ?>	

