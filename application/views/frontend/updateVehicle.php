<?php include("includes/header.php"); ?>

<script>
            $(document).ready(function(){
                $('#insurance_ex_date').Zebra_DatePicker();
$('#permit_ex_date').Zebra_DatePicker();
$('#fitness_ex_date').Zebra_DatePicker();
$('#roadtax_ex_date').Zebra_DatePicker();
$('#puc_ex_date').Zebra_DatePicker();
    //* validation
    $('#updatevehicle').validate({
     onkeyup: false,
     errorClass: 'error',
     validClass: 'valid',
     rules: {
      insurance: { required: true, },
      insurance_ex_date: { required: true, },
      insurance_cost:{ required: true,},
	permit: { required: true, },
      permit_ex_date: { required: true, },
      permit_cost:{ required: true,},
	fitness: { required: true, },
      fitness_ex_date: { required: true, },
      fitness_cost:{ required: true,},
	roadtax: { required: true, },
      roadtax_ex_date: { required: true, },
      roadtax_cost:{ required: true,},
	puc: { required: true, },
      puc_ex_date: { required: true, },
      puc_cost:{ required: true,},
      
      
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

		var vehicleid = $('#vehicle_id').val();
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
                        url: "index.php?ajax/vehicleShow/"+vehicleid, //The url where the server req would we made.
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
                                    <h3 style="color:#39c">Vehicle Insurance</h3>
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
			$attributes = array('name' => 'updatevehicle', 'id' => 'updatevehicle');	   
	  		echo form_open('vehicleInsurance/edit_vehicleIn', $attributes);
			echo form_hidden('id',$fid['value']);

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
<option value="<?php echo $row['id']; ?>"<?php if($row['id'] == $fid['value']){ ?> selected <?php }?>><?php echo $row['vehicle_no']; ?></option>
<?php
}
}

 ?>
</select>
				   			<!--	<?php $options = array(
								   ''	=> 'Select Vehicle ID',
								  '01'  => '01',
								  '02'    => '02',
								  '03'   => '03',
								  '04' => '04',
                							);
					$vid = array('id' => 'vehicle_id');

				echo form_dropdown('vehicle_id', $options,$vid);
?>-->


		
                                           <!--<?php $atts = array(
													  'name' => 'vehicle_id',
													  'id'   => 'vehicle_id',
													  'size' => 50
													  
													  
										   ); ?>
                                             <?php echo form_input($atts); ?>-->
                                            
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





			
										<td><div class="row-fluid"><label>Insurance<span class="f_req">*</span></label>
                                           <?php $atts = array(
													  'name' => 'insurance',
													  'id'   => 'insurance',
													  'size' => 50,
													'value'=> $finsurance['value'],
													  
													  
										   ); ?>
                                             <?php echo form_input($atts); ?>
                                            
                                       </div></td>
										<td><div class="row-fluid"><label>Insurance Expiry Date<span class="f_req">*</span></label>
                                        <?php $atts = array(
													  'name' => 'insurance_ex_date',
													  'id'   => 'insurance_ex_date',
													  'size' => 50,
												'value'=> $finsurance_expiry_date['value'],
													   
										   ); ?>
						                    <?php echo form_input($atts); ?>
                                        </div></td>
					
                                        <td><div class="row-fluid"><label>Insurance Cost<span class="f_req">*</span></label>
                                       <?php $atts = array(
													
													  'name' => 'insurance_cost',
													  'id'   => 'insurance_cost',
													  'size' => 35, 
												'value'=> $finsurance_cost['value'],
													
										   ); ?>
                                             <?php echo form_input($atts); ?>
                                        </div></td>

					<td><div class="row-fluid"><label>Value<span class="f_req">*</span></label>
                                       <?php $atts = array(
													
													  'name' => 'value',
													  'id'   => 'value',
													  'size' => 35,
												'value'=> $finsurance_value['value'],
										   ); ?>
                                             <?php echo form_input($atts); ?>
                                        </div></td>
</tr><tr style="border:none; background-color:#FFF;">
						



									
										
										<td><div class="row-fluid"><label>Permit<span class="f_req">*</span></label>
                                           <?php $atts = array(
													  'name' => 'permit',
													  'id'   => 'permit',
													  'size' => 50,
											'value'=> $fpermit['value'],
													  
													  
										   ); ?>
                                             <?php echo form_input($atts); ?>
                                            
                                       </div></td>
										<td><div class="row-fluid"><label>Permit Expiry Date<span class="f_req">*</span></label>
                                        <?php $atts = array(
													  'name' => 'permit_ex_date',
													  'id'   => 'permit_ex_date',
													  'size' => 50,
			 						'value'=> $fpermit_expiry_date['value'],			   
										   ); ?>
						                    <?php echo form_input($atts); ?>
                                        </div></td>
				
                                        <td><div class="row-fluid"><label>Permit Cost<span class="f_req">*</span></label>
                                       <?php $atts = array(
													
													  'name' => 'permit_cost',
													  'id'   => 'permit_cost',
													  'size' => 35,
								'value'=> $fpermit_cost['value'],
													
										   ); ?>
                                             <?php echo form_input($atts); ?>
                                        </div></td>
</tr><tr style="border:none; background-color:#FFF;">
					







					
										
								user/profile		<td><div class="row-fluid"><label>Fitness<span class="f_req">*</span></label>
                                           <?php $atts = array(
													  'name' => 'fitness',
													  'id'   => 'fitness',
													  'size' => 50,
												'value'=> $ffitness['value'],
													  
													  
										   ); ?>
                                             <?php echo form_input($atts); ?>
                                            
                                       </div></td>
										<td><div class="row-fluid"><label>Fitness Expiry Date<span class="f_req">*</span></label>
                                        <?php $atts = array(
													  'name' => 'fitness_ex_date',
													  'id'   => 'fitness_ex_date',
													  'size' => 50,
												'value'=> $ffitness_expiry_date['value'],
													   
										   ); ?>
						                    <?php echo form_input($atts); ?>
                                        </div></td>
					
                                        <td><div class="row-fluid"><label>Fitness Cost<span class="f_req">*</span></label>
                                       <?php $atts = array(
													
													  'name' => 'fitness_cost',
													  'id'   => 'fitness_cost',
													  'size' => 35,
											'value'=> $ffitness_cost['value'],
													
										   ); ?>
                                             <?php echo form_input($atts); ?>
                                        </div></td>
						</tr><tr style="border:none; background-color:#FFF;">			




										
										<td><div class="row-fluid"><label>Roadtax<span class="f_req">*</span></label>
                                           <?php $atts = array(
													  'name' => 'roadtax',
													  'id'   => 'roadtax',
													  'size' => 50,
												'value'=> $froadtax['value'],
													  
													  
										   ); ?>
                                             <?php echo form_input($atts); ?>
                                            
                                       </div></td>
										<td><div class="row-fluid"><label>Roadtax Expiry Date<span class="f_req">*</span></label>
                                        <?php $atts = array(
													  'name' => 'roadtax_ex_date',
													  'id'   => 'roadtax_ex_date',
													  'size' => 50,
								 			'value'=> $froadtax_expiry_date['value'],
													   
										   ); ?>
						                    <?php echo form_input($atts); ?>
                                        </div></td>
					
                                        <td><div class="row-fluid"><label>Roadtax Cost<span class="f_req">*</span></label>
                                       <?php $atts = array(
													
													  'name' => 'roadtax_cost',
													  'id'   => 'roadtax_cost',
													  'size' => 35,
								'value'=> $froadtax_cost['value'],
													
										   ); ?>
                                             <?php echo form_input($atts); ?>
                                        </div></td>
						</tr><tr style="border:none; background-color:#FFF;">			




										
										<td><div class="row-fluid"><label>Puc<span class="f_req">*</span></label>
                                           <?php $atts = array(
													  'name' => 'puc',
													  'id'   => 'puc',
													  'size' => 50,
									'value'=> $fpuc['value'],
													  
													  
										   ); ?>
                                             <?php echo form_input($atts); ?>
                                            
                                       </div></td>
										<td><div class="row-fluid"><label>Puc Expiry Date<span class="f_req">*</span></label>
                                        <?php $atts = array(
													  'name' => 'puc_ex_date',
													  'id'   => 'puc_ex_date',
													  'size' => 50,
											'value'=> $fpuc_expiry_date['value'],
													   
										   ); ?>
						                    <?php echo form_input($atts); ?>
                                        </div></td>
				
                                        <td><div class="row-fluid"><label>Puc Cost<span class="f_req">*</span></label>
                                       <?php $atts = array(
													
													  'name' => 'puc_cost',
													  'id'   => 'puc_cost',
													  'size' => 35,
							'value'=> $fpuc_cost['value'],
													
										   ); ?>
                                             <?php echo form_input($atts); ?>
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
										<th><center>Insurance</center></th>
										<th><center>Insurance Ex. Date</center></th>
                                        					
                                        					<th><center>Permit</center></th>
										<th><center>Permit Ex. Date</center></th>
                                        					
										<th><center>Fitness</center></th>
										<th><center>Fitness Ex. Date</center></th>
                                        					
										<th><center>RoadTax</center></th>
										<th><center>RoadTax Ex. Date</center></th>
                                        					
										<th><center>Puc</center></th>
										<th><center>Puc Ex. Date</center></th>
                                        					
									
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
										<td><center><?php echo $row['insurer']; ?></center></td>
									<?php $date1 = strtotime($row['Insurance_expiry_date']);
									$date1 = date('d-m-Y',$date1);?>

										<td><center><?php echo $date1; ?></center></td>
										
										<td><center><?php echo $row['permit']; ?></center></td>
									<?php $date2 = strtotime($row['permit_expiry_date']);
									$date2 = date('d-m-Y',$date2);?>

										<td><center><?php echo $date2; ?></center></td>
										
										<td><center><?php echo $row['fitness']; ?></center></td>
									<?php $date3 = strtotime($row['fitness_expiry_date']);
									$date3 = date('d-m-Y',$date3);?>
										<td><center><?php echo $date3; ?></center></td>
										
										<td><center><?php echo $row['roadtax']; ?></center></td>
									<?php $date4 = strtotime($row['roadtax_expiry_date']);
									$date4 = date('d-m-Y',$date4);?>
										<td><center><?php echo $date4; ?></center></td>
										
										<td><center><?php echo $row['puc']; ?></center></td>
									<?php $date5 = strtotime($row['puc_expiry_date']);
									$date5 = date('d-m-Y',$date5);?>
										<td><center><?php echo $date5; ?></center></td>
										
	

																				<td><center><a href="<?php echo base_url(); ?>/index.php?vehicleInsurance/edit_vehicleIn/<?php echo $row['id']; ?>" class="sepV_a" title="Edit"><i class="icon-pencil"></i></center></a>
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
