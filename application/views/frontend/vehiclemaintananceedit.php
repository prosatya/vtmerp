<?php include("includes/header.php"); ?>
            <!-- main content -->
          <script>

            $(document).ready(function(){
			 $('#engine_oil_change_date').Zebra_DatePicker();
				  $('#tyres_change_date').Zebra_DatePicker();
				   $('#gear_box_change_date').Zebra_DatePicker(); 
				    $('#battery_change_date').Zebra_DatePicker();
					 $('#brakes_change_date').Zebra_DatePicker();
					  $('#servicing_date').Zebra_DatePicker();

    $('#dob').Zebra_DatePicker({

     // remember that the way you write down dates

     // depends on the value of the "format" property!

      view: 'years'

    });

    //* validation

    $('#maintainance').validate({

     onkeyup: false,

     errorClass: 'error',

     validClass: 'valid',

     rules: {

      vehicle_id: { required: true},

      engine_oil_change_date: { required: true },

      tyres_change_date:{ required: true},

      gear_box_change_date:{required: true},

      battery_change_date:{required: true},

      brakes_change_date:{required: true},

      engine_oil_cost:{required: true},

      tyres_cost:{required: true,number:true,},
	  brakes_cost:{required:true,number:true,},
	  

      gear_box_cost:{required: true,number:true,},

      battery_cost:{required: true,number:true,},

     
       servicing_date:{required:true,},
      servicing_cost:{required: true,number:true,},

      

      description:{required: true},

      

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
   <script type="text/javascript">
            $(document).ready(function () {

		var vehicleid = $('#vehicle_id').val();
//                $('#vehicle_id').ready(function () {

		
//                    var vehicleid = $(this).val();

                    console.log(vehicleid);

                    $.ajax({   
		
                        url: "<?php echo base_url(); ?>ajax/vehicleShow/"+vehicleid, //The url where the server req would we made.
                        async: false,
                        type: "GET", //The type which you want to use: GET/POST
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
                //});
            });
        </script>

<script type="text/javascript">
            $(document).ready(function () {

                $('#vehicle_id').change(function () {

		
                    var vehicleid = $(this).attr('value');

                    console.log(vehicleid);

                    $.ajax({   
		
                        url: "<?php echo base_url(); ?>ajax/vehicleShow/"+vehicleid, //The url where the server req would we made.
                        async: false,
                        type: "GET", //The type which you want to use: GET/POST
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

            <div id="contentwrapper">
                <div class="main_content">
                    
                    <nav>
                        <div id="jCrumbs" class="breadCrumb module">
                            <ul>
                                <li>
                                    <a href="#"><i class="icon-home"></i></a>
                                </li>
                                <li>
                                            <h3 style="color:#39c">Vehicle Maintainance</h3>
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
			$attributes = array('name' => 'maintainance', 'id' => 'maintainance');	   
	  		echo form_open('maintainance/editMaintainance', $attributes);
			echo form_hidden('id',$fid['value']);
			echo form_hidden('vehicle_no',$fvehicle_id['value']);
			
       ?>
                       <div class="displa_table">
                            <table class="table table-bordered table-striped" id="smpl_tbl" style="border:none">
								
								<tbody>


<tr style="border:none; background-color:#FFF;"> <td><div class="row-fluid"><label>Vehicle_ID<span class="f_req">*</span></label>

 
<?//php echo form_dropdown('vehicle_id', $vehicleno,'id="vehicle_id"',set_value('experience'(isset($vehicleno->vehicle_id)) ? $fvehicle_id['value']));?>

<select name="vehicle_id"id="vehicle_id">
<option value="">Select Vehicle</option>
<?php
		foreach($vehicleno as $row){

?>
<option value="<?php echo $row->id; ?>"<?php if($row->id == $fvehicle_id['value']){ ?> selected <?php }?>><?php echo $row->vehicle_no; ?></option>
<?php
}

 ?>
</select>
</div>
</td>				

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
										
                                        <td><div class="row-fluid"><label>Tyres Change Date<span class="f_req">*</span></label>
                                      <?php $atts = array(
													  'name' => 'tyres_change_date',
													  'id'   => 'tyres_change_date',
													  'size' => 50
													   
										   ); ?>

                                             <?php echo form_input($atts,$ftyres_change_date['value']); ?>
                                        </div></td>
									
										<td><div class="row-fluid"><label >Gear Box Change Date<span class="f_req">*</span></label>
					<?php $atts = array(
													  'name' => 'gear_box_change_date',
													  'id'   => 'gear_box_change_date',
													  'size' => 50
													   
										   ); ?>
						
                                            <?php echo form_input($atts,$fgear_box_change_date['value']); ?>
                                         </div></td>
										<td>
                                        <div class="row-fluid"><label >Battery Change Date<span class="f_req">*</span></label>
										<?php $atts = array(
													  'name' => 'battery_change_date',
													  'id'   => 'battery_change_date',
													  'size' => 50
													   
										   ); ?>

			
					
                                          <?php echo form_input($atts,$fbattery_change_date['value']); ?>
                                        </div></td>
</tr>
<tr style="border:none; background-color:#FFF;">
                                         <td><div class="row-fluid"><label>Brakes Change Date<span class="f_req">*</span></label>


									<?php $atts = array(
													  'name' => 'brakes_change_date',
													  'id'   => 'brakes_change_date',
													  'size' => 50
													   
										   ); ?>

                                          <?php echo form_input($atts,$fbrakes_change_date['value']); ?>
                                        </div>
                                        </td>
										<td><div class="row-fluid"><label id="engine_oil_cost">Engine Oil Cost <span class="f_req">*</span></label>
                                           <?php echo form_input('engine_oil_cost',$fengine_oil_cost['value']); ?>
                                        </div></td>
										<td><div class="row-fluid"><label id="tyres_cost">Tyres Cost<span class="f_req"></span></label>
                                          <?php echo form_input('tyres_cost',$ftyres_cost['value']); ?>
                                        </div></td>
</tr>
<tr style="border:none; background-color:#FFF;">

                                        <td><div class="row-fluid"><label id="gear_box_cost">Gear Box Cost<span class="f_req">*</span></label>
                                             <?php echo form_input('gear_box_cost',$fgear_box_cost['value']); ?>
                                        </div></td>
										
									
										<td><div class="row-fluid"><label id="battery_cost">Battery Cost<span class="f_req">*</span></label>
                                              <?php echo form_input('battery_cost',$fbattery_cost['value']); ?>
                                        </div></td>
										<td><div class="row-fluid"><label id="brakes_cost">Brakes Cost<span class="f_req">*</span></label>
                                              <?php echo form_input('brakes_cost',$fbrakes_cost['value']); ?>
                                        </div></td>
</tr>

<tr style="border:none; background-color:#FFF;">

                                          <td><div class="row-fluid"><label>Servicing Date<span class="f_req">*</span></label>


									<?php $atts = array(
													  'name' => 'servicing_date',
													  'id'   => 'servicing_date',
													  'size' => 50
													   
										   ); ?>

                                          <?php echo form_input($atts,$fservicing_date['value']); ?>
                                        </div>
                                        </td>

										<td><div class="row-fluid"><label id="servicing_cost">Servicing Cost<span class="f_req">*</span></label>
                                                <?php echo form_input('servicing_cost',$fservicing_cost['value']); ?>
                                        </div></td>
                                       
                                 
										
									</tr>
                                    <tr>
										<td rowspan="3">
                                           <?php  
										 $atts = array(
													  'name' => 'update',
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
										
										<th><center>S.No</center></th>
										<th><center>Vehicle Id</center></th>
                                        					<th><center>Engine Oil Change Date</center></th>
										<th><center>Tyres Change Date</center></th>
											<th><center>Gear Box Change Date</center></th>
											<th><center>Battery Change Date</center></th>
											<th><center>Brakes Change Date</center></th>
											
										<th><center>Edit</center></th>
									</tr>
								</thead>
								<tbody>
                           <?php
								$sno = 0;
							$a=count($records);
			if($a>0){
								foreach($records as $row){
									$sno = $sno + 1;
								 ?>
									<tr>
										<td><center><?php echo $sno; ?></center> </td>
										<td><center><?php echo $row['vehicle_id']; ?></center></td>
								<td><center><?php echo $row['engine_oil_change_date']; ?></center></td>
                                        <td><center><?php echo $row['tyres_change_date']; ?></center></td>
                                        <td><center><?php echo $row['gear_box_change_date']; ?></center></td>
                                        <td><center><?php echo $row['battery_change_date']; ?></center></td>
					<td><center><?php echo $row['brakes_change_date']; ?></center></td>
                                        
                                        
			                      
                                    

<td><center><a href="<?php echo base_url(); ?>/index.php?maintainance/editMaintainance/<?php echo $row['id']; ?>" class="sepV_a" title="Edit"><i class="icon-pencil"></i></center></a>
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

