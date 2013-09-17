<?php include("includes/header.php"); ?>
 
          
 <script>

            $(document).ready(function(){
				 
					 $('#joining_date').Zebra_DatePicker();			 

  
    //* validation

    $('#driver').validate({

     onkeyup: false,

     errorClass: 'error',

     validClass: 'valid',

     rules: {

      first_name: { required: true},

      last_name: { required: true },

      address1:{ required: true},

      

      city:{required: true},

      state:{required: true},

      pincode:{required: true,digits:true},

      joining_date:{required: true},
	 
	  license_no:{required:true},
	  

      mobile:{required: true},


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
                                    <h3 style="color:#39C" >Driver</h3>
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
			$attributes = array('name' => 'driver', 'id' => 'driver');	   
	  		echo form_open_multipart('driver/editDriver', $attributes);
			echo form_hidden('id',$fid['value']);
       ?>
                       <div class="displa_table">
                            <table class="table table-bordered table-striped" id="smpl_tbl" style="border:none">
								
								<tbody>
				<tr style="border:none; background-color:#FFF;">
						<?php echo form_label('Driver Image:', 'image'); ?>				
						<td><div class="row-fluid">
					<img src="<?php if($fdriver_image['value'] == NULL ) {  echo base_url(); ?>images/profile_default_male.png<?php  } else {     echo $fdriver_image['value'];   } ?>" name='image' style="height:50px; width:60px;"/>
						<?php $atts = array('name' => 'image',
												  'id'   => 'image',
												'value' => 'change image',
												  'size' => '35',);?>
            <p>
            
            <?php echo form_upload($atts); ?>
            </p> </div></td>
									<tr style="border:none; background-color:#FFF;">
										
										<td><div class="row-fluid"><label id="first_name">First Name<span class="f_req">*</span></label>
                                          
                                             <?php echo form_input('first_name',$ffirst_name['value']); ?>
                                       </div></td>
										<td><div class="row-fluid"><label id="last_name">Last Name<span class="f_req">*</span></label>
						                  <?php echo form_input('last_name',$flast_name['value']); ?>
                                        </div></td>
                                        <td><div class="row-fluid"><label id="license_no">License No<span class="f_req">*</span></label>
                                             <?php echo form_input('license_no',$flicense_no['value']); ?>
                                        </div></td></tr>
                                        <tr>
                                        <td><div class="row-fluid"><label id="address1">Address 1<span class="f_req">*</span></label>
                                      
                                             <?php echo form_input('address1',$faddress1['value']); ?>
                                        </div></td>
										<td><div class="row-fluid"><label id="address2">Address 2<span class="f_req"></span></label>
                                            <?php echo form_input('address2',$faddress2['value']); ?>
                                         </div></td>
										<td>
                                        <div class="row-fluid"><label id="city">City<span class="f_req">*</span></label>
                                          <?php echo form_input('city',$fcity['value']); ?>
                                        </div></td></tr>
                                        <tr>
                                        <td><div class="row-fluid"><label id="pincode">Pincode <span class="f_req">*</span></label>
                                           <?php echo form_input('pincode',$fpincode['value']); ?>
                                        </div></td>
                                         <td><div class="row-fluid"><label id="state">State<span class="f_req">*</span></label>
                                          <?php echo form_input('state',$fstate['value']); ?>
                                        </div>
                                        </td>
                                        <td><div class="row-fluid"><label id="bloodgroup">Blood Group<span class="f_req"></span></label>
                                          <?php echo form_input('bloodgroup',$fbloodgroup['value']); ?>
                                        </div></td>
									</tr>
									<tr>
										
										<td><div class="row-fluid"><label>Joining Date<span class="f_req">*</span></label>
                                        <?php $atts = array(
													  'name' => 'joining_date',
													  'id'   => 'joining_date',
													  'size' => 50
													   
										   ); ?>
						                    <?php echo form_input($atts,$fjoining_date['value']); ?>
                                        </div></td>
										<td><div class="row-fluid"><label id="mobile">Mobile No<span class="f_req">*</span></label>
                                              <?php echo form_input('mobile',$fmobile['value']); ?>
                                        </div></td>
                                        <td><div class="row-fluid"><label id="mobile">Driver Type<span class="f_req">*</span></label>
Driver <input type="radio" name="driver_type" value="Driver" <?php if('Driver'==$fdriver_type['value']) { echo set_radio('driver_type', 'D',true);} ?> />
Helper  <input type="radio" name="driver_type" value="Helper" <?php if('Helper'==$fdriver_type['value']) { echo set_radio('driver_type', 'H',true); } ?> />

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
										
											<th>S.No</th>
											<th>Image</th>
										<th>Name</th>
                                        					<th>Address</th>
										<th>Blood Group</th>
										<th>Joining Date</th>
										<th>License No</th>
										<th>Mobile no</th>
										<th>Driver Type</th>
										<th>Edit</th>
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
										<td><?php echo $sno; ?> </td>
				<td><img src="<?php if($row['driverImage'] == NULL ) {  echo base_url(); ?>images/profile_default_male.png<?php  } else {     echo $row['driverImage'];   } ?>" name='image' style="height:50px; width:60px;"/></td>
								<td><?php echo $row['first_name']." ".$row['last_name']; ?></td>
<td><?php echo $row['address1'].",".$row['city'].",".$row['state'].",".$row['pincode']; ?></td>
					                                        <td><?php echo $row['bloodgroup']; ?></td>
									<?php $date5 = strtotime($row['joining_date']);
										$date5 = date('d-m-Y',$date5);?>
        					                                <td><?php echo $date5; ?></td>
        					                               
										<td><?php echo $row['license_no']; ?></td>
										<td><?php echo $row['mobile']; ?></td>
										<td><?php echo $row['driver_type']; ?></td>
									       
									       

<td><a href="<?php echo base_url(); ?>/index.php?driver/editdriver/<?php echo $row['id']; ?>" class="sepV_a" title="Edit"><i class="icon-pencil"></i></a>
				
									</tr>
								<?php }}
								?>	
								</tbody>
							</table>
                         <p><?php echo $links; ?></p>
                        </div>
                    </div>
                        
                </div>
                
            </div>
            
		<?php include("includes/sidebar.php"); ?>	
