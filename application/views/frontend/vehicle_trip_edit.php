<?php include("includes/header.php"); ?>
 <script>
            $(document).ready(function(){
    $('#dob').Zebra_DatePicker({
      view: 'years'
    });

    //* validation
     $('#vehicletrip').validate({

     onkeyup: false,

     errorClass: 'error',

     validClass: 'valid',

     rules: {

      vehicle_id: { required: true},

      driver_id: { required: true },

      helper_id:{ required: true},

      from:{required: true},

      to:{required: true},

	distance:{required: true},
 	
	weight:{required: true},

      material:{required: true},
	 
	  slip_no:{required:true},
	  

      royalty_no:{required: true},

      royalty_amount:{required: true},
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
        </script>
 <script type="text/javascript">
            $(document).ready(function () {
		var driverid = $('#driver_id').val();
		   console.log(driverid);
			 $.ajax({   
			     url: "<?php echo base_url(); ?>ajax/driverShow/"+driverid, //The url where the server req would we made.
                        async: false,
                        type: "GET", //The type which you want to use: GET/POST
                        dataType: "html", //Return data type (what we expect).
                        //This is the function which will be called if ajax call is successful.
                        success: function(data) {
			var d=data;
			var myArray = d.split(',');
		for(var i=0;i<myArray.length;i++){

		if(i==0){
		$('#license_no').val(myArray[i]);
		}
		else{
		$('#mobile').val(myArray[i]);
			}
		    }
			    }
                    })

            });
        </script>


  <script type="text/javascript">
            $(document).ready(function () {
		var helperid = $('#helper_id').val();
		   console.log(helperid);
			 $.ajax({   
			     url: "<?php echo base_url(); ?>ajax/driverShow/"+helperid, //The url where the server req would we made.
                        async: false,
                        type: "GET", //The type which you want to use: GET/POST
                        dataType: "html", //Return data type (what we expect).
                        //This is the function which will be called if ajax call is successful.
                        success: function(data) {
			var d=data;
			var myArray = d.split(',');
		for(var i=0;i<myArray.length;i++){

		if(i==0){
		$('#Hlicense_no').val(myArray[i]);
		}
		else{
		$('#Hmobile').val(myArray[i]);
			}
		    }
			    }
                    })

            });
        </script>


                 <script type="text/javascript">
           	 $(document).ready(function () {
		var fromid=$('#from').val();
		var toid=$('#to').val();
		var n=fromid+"-".concat(toid);
		    console.log(n);
		    $.ajax({   
		        url: "<?php echo base_url(); ?>ajax/distance/"+n, //The url where the server req would we made.
                        async: false,
                        type: "GET", //The type which you want to use: GET/POST
                        dataType: "html", //Return data type (what we expect).
                        //This is the function which will be called if ajax call is successful.
                        success: function(data) {
			var d=data;
			$('#distance').val(d);
			    }
               })
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

                 <script type="text/javascript">
            $(document).ready(function () {
		
                $('#to').change(function () {
                var fromid=$('#from').val();
		var toid=$('#to').val();
		var n=fromid+"-".concat(toid);
		
                    console.log(n);

                    $.ajax({   
		
                        url: "<?php echo base_url(); ?>ajax/distance/"+n, //The url where the server req would we made.
                        async: false,
                        type: "GET", //The type which you want to use: GET/POST
                        dataType: "html", //Return data type (what we expect).
                         
                        //This is the function which will be called if ajax call is successful.
                        success: function(data) {
			var d=data;
			

			$('#distance').val(d);
			    }

                    })
                });
            });
        </script>

              <script type="text/javascript">
            $(document).ready(function () {

                $('#driver_id').change(function () {
                    var driverid = $(this).attr('value');
                    console.log(driverid);
		
                    $.ajax({   
                        url: "<?php echo base_url(); ?>ajax/driverShow/"+driverid, //The url where the server req would we made.
                        async: false,
                        type: "GET", //The type which you want to use: GET/POST
                        dataType: "html", //Return data type (what we expect).
                         
                        //This is the function which will be called if ajax call is successful.
                        success: function(data) {
			var d=data;
			var myArray = d.split(',');
			for(var i=0;i<myArray.length;i++){
			if(i==0){
			$('#license_no').val(myArray[i]);
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
              <script type="text/javascript">
            $(document).ready(function () {

                $('#helper_id').change(function () {
                    var helperid = $(this).attr('value');
                    console.log(helperid);
                    $.ajax({   
                        url: "<?php echo base_url(); ?>ajax/driverShow/"+helperid, //The url where the server req would we made.
                        async: false,
                        type: "GET", //The type which you want to use: GET/POST
                        dataType: "html", //Return data type (what we expect).
                         
                        //This is the function which will be called if ajax call is successful.
                        success: function(data) {
			var d=data;
			var myArray = d.split(',');
			for(var i=0;i<myArray.length;i++){
			if(i==0){
			$('#Hlicense_no').val(myArray[i]);
			}
			else{
			$('#Hmobile').val(myArray[i]);
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
<h3 style="color:#39c">Vehicle Trip</h3>
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
			$attributes = array('name' => 'vehicletrip', 'id' => 'vehicletrip');	   
	  		echo form_open('vehicletrip/editVehicletrip', $attributes);
			echo form_hidden('id',$fid['value']);
			echo form_hidden('vehicle_no',$fvehicle_id['value']);
			echo form_hidden('driver_id',$fdriver_id['value']);
			echo form_hidden('helper_id',$fhelper_id['value']);
			echo form_hidden('from_place',$fplace_from['value']);
			echo form_hidden('to_place',$fplace_to['value']);


       ?>
                       <div class="displa_table">
       <table class="table table-bordered table-striped" id="smpl_tbl" style="border:none">
								
								<tbody>
									<tr style="border:none; background-color:#FFF;"> <td><div class="row-fluid"><label>Vehicle ID<span class="f_req">*</span></label>

 

<select name="vehicle_id"id="vehicle_id">
<option value="">Select Vehicle</option>
<?php
		foreach($vehicleno as $row){

?>
<option value="<?php echo $row->id; ?>"<?php if($row->id == $fvehicle_id['value']){  ?> selected <?php }?>><?php echo $row->vehicle_no; ?></option>
<?php
}

 ?>
</select>
                                            
                                       </div></td>
                                       
		<td><div class="row-fluid" id="vehicleType"><label>Vehicle Type<span class="f_req"></span></label>
                                           <?php $atts = array(
													  'name' => 'vehicle_type',
													  'id'   => 'vehicle_type',
													  'size' => 50,
									                                  'readonly'=>'readonly',
													  
										   ); ?>
                                             <?php echo form_input($atts); ?>
                                            
                                       </div></td>

										<td><div class="row-fluid"><label>Make<span class="f_req"></span></label>
                                        <?php $atts = array(
													  'name' => 'make',
													  'id'   => 'make',
													  'size' => 50,
													'readonly'=>'readonly',
													   
										   ); ?>
						                    <?php echo form_input($atts); ?>
                                        </div></td></tr>
                                        <tr style="border:none; background-color:#FFF;">
										<td><div class="row-fluid"><label>Driver<span class="f_req">*</span></label>

<select name="driver_id"id="driver_id">
<option value="">Select Driver</option>
<?php
		foreach($driverN as $row){

?>
<option value="<?php echo $row->id; ?>"<?php if($row->id == $fdriver_id['value']){ ?> selected <?php }?>><?php echo $row->first_name; echo'&nbsp'; echo $row->last_name; ?></option>
<?php
}

 ?>
</select>
                                            
                                       </div></td>

                                        <td><div class="row-fluid"><label>Driver License No<span class="f_req"></span></label>
                                       <?php $atts = array(
													
													  'name' => 'license_no',
													  'id'   => 'license_no',
													  'size' => 35,
													'readonly'=>'readonly',
													
										   ); ?>
                                             <?php echo form_input($atts); ?>
                                        </div></td>
									
										<td><div class="row-fluid"><label>Mobile<span class="f_req"></span></label>
                                           <?php $atts = array(
													  'name' => 'mobile',
													  'id'   => 'mobile',
													  'size' => 50,
												'readonly'=>'readonly',
													  
													  
										   ); ?>
                                             <?php echo form_input($atts); ?>
                                            
                                       </div></td>

</tr>
<tr style="border:none; background-color:#FFF;">

                                        <td><div class="row-fluid"><label>Helper Id<span class="f_req">*</span></label>
 <select name="helper_id"id="helper_id">
<option value="">Select Helper</option>
<?php
		foreach($helperN as $row){

?>
<option value="<?php echo $row->id; ?>"<?php if($row->id == $fhelper_id['value']){ ?> selected <?php }?>><?php echo $row->first_name; echo'&nbsp'; echo $row->last_name; ?></option>
<?php
}

 ?>
</select>

                                        </div></td>

                                 <td><div class="row-fluid"><label>Helper License No<span class="f_req"></span></label>
                                       <?php $atts = array(
													
													  'name' => 'Hlicense_no',
													  'id'   => 'Hlicense_no',
													  'size' => 35,
												'readonly'=>'readonly',
													
										   ); ?>
                                             <?php echo form_input($atts); ?>
                                        </div></td>
									
										<td><div class="row-fluid"><label>Mobile<span class="f_req"></span></label>
                                           <?php $atts = array(
													  'name' => 'Hmobile',
													  'id'   => 'Hmobile',
													  'size' => 50,
													'readonly'=>'readonly',
													  
													  
										   ); ?>
                                             <?php echo form_input($atts); ?>
                                            
                                       </div></td>
</tr>
<tr style="border:none; background-color:#FFF;">

									
										<td>
<div class="row-fluid"><label>Place From<span class="f_req">*</span></label>
                                       <select name="from"id="from">
<option value="">Select City</option>
<?php
		foreach($from as $row){

?>
<option value="<?php echo $row->from_place; ?>"<?php if($row->from_place == $fplace_from['value']){ ?> selected="true" <?php }?>><?php echo $row->from_place; ?></option>
<?php
}

 ?>
</select>
  </div>
</td>
										<td><div class="row-fluid"><label>Place To<span class="f_req">*</span></label>
                                       <select name="to"id="to">
<option value="">Select City</option>
<?php
		foreach($to as $row){

?>
<option value="<?php echo $row->to_place; ?>"<?php if($row->to_place == $fplace_to['value']){ ?> selected="true" <?php }?>><?php echo $row->to_place; ?></option>
<?php
}

 ?>
</select>
  </div></td>
                                        <td><div class="row-fluid"><label>Distance<span class="f_req"></span></label>
                                          <?php $atts = array(
													  'name' => 'distance',
													  'id'   => 'distance',
													  'size' => 50,
													'readonly'=>'readonly',
													   
										   ); ?>
						                    <?php echo form_input($atts); ?>
                                        </div></td>
</tr>
<tr style="border:none; background-color:#FFF;">
										
										<td><div class="row-fluid"><label>Weight<span class="f_req">*</span></label>
                                            <?php $atts = array(
													  'name' => 'weight',
													  'id'   => 'weight',
													  'size' => 50,
													'value'=> $fweight['value'],
													   
										   ); ?>
						                    <?php echo form_input($atts); ?>
                                        </div></td>
										<td><div class="row-fluid"><label>Material<span class="f_req">*</span></label>
                                        <?php $atts = array(
													  'name' => 'material',
													  'id'   => 'material',
													  'size' => 50,
												'value'=> $fmaterial['value'],
													   
										   ); ?>
						                    <?php echo form_input($atts); ?>
                                        </div></td>
                                 <td><div class="row-fluid"><label>Slip No<span class="f_req">*</span></label>
                                           <?php $atts = array(
													  'name' => 'slip_no',
													  'id'   => 'slip_no',
													  'size' => 50,
												'value'=> $fslip_no['value'],
													  
													  
										   ); ?>
                                             <?php echo form_input($atts); ?>
                                            
                                       </div></td>
</tr>
<tr style="border:none; background-color:#FFF;">
                                       <td><div class="row-fluid"><label>Royalty No<span class="f_req">*</span></label>
                                           <?php $atts = array(
													  'name' => 'royalty_no',
													  'id'   => 'royalty_no',
													  'size' => 50,
												'value'=> $froyalty_no['value'],
													  
													 
										   ); ?>
                                             <?php echo form_input($atts); ?>
                                            
                                       </div></td>
                                       <td><div class="row-fluid"><label>Royalty Amount<span class="f_req">*</span></label>
                                            <?php $atts = array(
													'name' =>'royalty_amount',
													'id' =>'royalty_amount',
													'size' =>50,
												'value'=> $froyalty_amount['value'],
													 
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
										<th><center>Vehicle Id</center></th>
                                     					        <th><center>Driver Id</center></th>
										<th><center>Helper Id</center></th>
					                                        <th><center>Place Form</center></th>
                                        					<th><center>Place To</center></th>
                                        					<th><center>Distance</center></th>
                                        					<th><center>Weight</center></th>
                                        					<th><center>Material</center></th>
                                        					<th><center>Slip No</center></th>
                                        					<th><center>Royalty No</center></th>
                                        					<th><center>Royalty Amount</center></th>
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
										<td><center><?php echo $sno; ?> </center></td>
										<td><center><?php echo $row['vehicle_id']; ?></center></td>
										<td><center><?php echo $row['driver_id']; ?></center></td>
										<td><center><?php echo $row['helper_id']; ?></center></td>
										<td><center><?php echo $row['place_from']; ?></center></td>
										<td><center><?php echo $row['place_to']; ?></center></td>
										<td><center><?php echo $row['distance']; ?></center></td>
										<td><center><?php echo $row['weight']; ?></center></td>
										<td><center><?php echo $row['material']; ?></center></td>
										<td><center><?php echo $row['slip_no']; ?></center></td>
										<td><center><?php echo $row['royalty_no']; ?></center></td>
										<td><center><?php echo $row['royalty_amount']; ?></center></td>
                                         
                                        
			                      
                                    

<td><center><a href="<?php echo base_url(); ?>/index.php?vehicletrip/editVehicletrip/<?php echo $row['id']; ?>" class="sepV_a" title="Edit"><i class="icon-pencil"></i></a></center>
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

