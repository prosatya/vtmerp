<?php include("includes/header.php");
error_reporting(0);
 ?>
            <!-- main content -->
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

     vehicle_ownership:{required: true},

     weight_capacity:{required: true},

     make:{required: true},
	weight_capacity:{number: true},
	make_year:{number: true},
	cost:{number: true},

    //  description:{required: true},

      

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

        </script>
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
     
                    if ($this->session->flashdata('registrationmessage') != ''){
      echo '<div class="box_error">';
                      echo $this->session->flashdata('registrationmessage'); 
                     echo '</div>';
     }
     ?>
     <?php
			$attributes = array('name' => 'vehicle', 'id' => 'vehicle');	   
	  		echo form_open('vehicle/editVehicle', $attributes);
			echo form_hidden('id',$fid['value']);
       ?>
                       <div class="displa_table">
                            <table class="table table-bordered table-striped" id="smpl_tbl" style="border:none">
								
								<tbody>
									<tr style="border:none; background-color:#FFF;">
										
										<td><div class="row-fluid"><label id="vehicle_no">Vehicle no<span class="f_req">*</span></label>
                                          
                                             <?php echo form_input('vehicle_no',$fvehicle_no['value']); ?>
                                       </div></td>
<td><div class="row-fluid"><label>Vehicle Type<span class="f_req">*</span></label>
                 <select name="vehicle_type"id="vehicle_type">
       <option value="">Select Vehicle</option>
       <option value ="Truck"<?php if('Truck' == $fvehicle_type['value']){ ?> selected="true" <?php }?>>Truck</option>
       <option value ="Dumpher"<?php if('Dumpher' == $fvehicle_type['value']){ ?> selected="true" <?php }?>>Dumpher</option>
       <option value ="JCB"<?php if('JCB' == $fvehicle_type['value']){ ?> selected="true" <?php }?>>JCB</option>
       <option value="Tractor"<?php if('Tractor' == $fvehicle_type['value']){ ?> selected="true" <?php }?>>Tractor</option>
       <option value ="Trala"<?php if('Trala' == $fvehicle_type['value']){ ?> selected="true" <?php }?>>Trala</option>
       <option value="Transit Mixtures"<?php if('Transit Mixtures' == $fvehicle_type['value']){ ?> selected="true" <?php }?>>Transit Mixtures</option>  
       <option value ="Tippers"<?php if('Tippers' == $fvehicle_type['value']){ ?> selected="true" <?php }?>>Tippers</option>
				</select>
                                        </div></td>

                                        <td><div class="row-fluid"><label id="make_year">Make Year<span class="f_req">*</span></label>
                                      
                                             <?php echo form_input('make_year',$fmake_year['value']); ?>
                                        </div></td>
									</tr>
									<tr>
										<td><div class="row-fluid"><label id="color">Color<span class="f_req">*</span></label>
                                            <?php echo form_input('color',$fcolor['value']); ?>
                                         </div></td>
										<td>
                                        <div class="row-fluid"><label id="chasis_no">Chasis No<span class="f_req">*</span></label>
                                          <?php echo form_input('chasis_no',$fchasis_no['value']); ?>
                                        </div></td>
                                         <td><div class="row-fluid"><label>Vehicle Ownership<span class="f_req">*</span></label>
Owner <input type="radio" name="myradio" value="Owner" id="owner"<?php if('Owner'==$fvehicle_ownership['value']) {  echo set_radio('myradio', 'Owner', TRUE); } ?> />
Lease  <input type="radio" name="myradio" value="Lease" id="lease"<?php if('Lease'==$fvehicle_ownership['value']) {  echo set_radio('myradio', 'Lease', TRUE); } ?> />

                                        </div>
                                        </td>
									</tr>
									<tr>
										<td><div class="row-fluid"><label>Vendor<span class="f_req"></span></label>

<select name="vendor_id"id="vendor_id">
<option value="">Select Vendor</option>
<?php
$a=count($vendorName);
			if($a>0){
		foreach($vendorName as $row){

?>
<option value="<?php echo $row['id']; ?>"<?php if($row->id == $fvendor_id['value']){ ?> selected="true" <?php }?>><?php echo $row['vendor_name']; ?></option>
<?php
}
}
 ?>
</select>
                                        </div></td>
										<td><div class="row-fluid"><label>Lease Start Date<span class="f_req"></span></label>
                                           <?php $atts = array(
													  'name' => 'lease_start_date',
													  'id'   => 'lease_start_date',
													  'size' => 50
													  
													  
										   ); ?>
                                             <?php echo form_input($atts,$flease_start_date['value']); ?>
                                            
                                       </div></td>
                                        <td><div class="row-fluid"><label>Lease End Date<span class="f_req"></span></label>
                                           <?php $atts = array(
													  'name' => 'lease_end_date',
													  'id'   => 'lease_end_date',
													  'size' => 50
													  
													  
										   ); ?>
                                             <?php echo form_input($atts,$flease_end_date['value']); ?>
                                            
                                       </div></td>
										
									</tr>
									<tr>
										<td><div class="row-fluid"><label id="cost">Cost<span class="f_req">*</span></label>
                                              <?php echo form_input('cost',$fcost['value']); ?>
                                        </div></td>
										<td><div class="row-fluid"><label id="weight_capacity">Weight Capacity<span class="f_req">*</span></label>
                                              <?php echo form_input('weight_capacity',$fweight_capacity['value']); ?>
                                        </div></td>
                                        <td><div class="row-fluid"><label id="model_no">Model No<span class="f_req">*</span></label>
                                                 <?php echo form_input('model_no',$fmodel_no['value']); ?>
                                        </div></td>
									
									</tr>
									<tr>
										<td><div class="row-fluid"><label id="make">Make<span class="f_req">*</span></label>
                                                <?php echo form_input('make',$fmake['value']); ?>
                                        </div></td>
						 <td><div class="row-fluid"><label>Meter Type<span class="f_req">*</span></label>
Km Wise <input type="radio" name="meter_type" value="km" id="owner"<?php if('km'==$fmeter_type['value']) {  echo set_radio('meter_type', 'Owner', TRUE); } ?> />
Hourly <input type="radio" name="meter_type" value="hourly" id="lease"<?php if('hourly'==$fmeter_type['value']) {  echo set_radio('meter_type', 'Lease', TRUE); } ?> />

                                        </div>
                                        </td>
										<td><div class="row-fluid"><label id="description">Description<span class="f_req">*</span></label>
                                                  <?php echo form_input('description',$fdescription['value']); ?>
                                        </div></td>
                                        
									</tr>
                                    <tr>
										<td rowspan="3">
                                         <?php  
										 $atts = array(
													  'name' => 'update',
													  'value'   => 'Update',
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
} ?>	
								</tbody>
							</table>
                         <p><?php echo $links; ?></p>
                        </div>
                    </div>
                        
                </div>
                
            </div>
            
		<?php include("includes/sidebar.php"); ?>	

