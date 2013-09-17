
<?php include("includes/header.php"); ?>

 <script>

            $(document).ready(function(){
				 $('#joining_date').Zebra_DatePicker();
				  
 $('#dob').Zebra_DatePicker({

     // remember that the way you write down dates

     // depends on the value of the "format" property!

      view: 'years'

    });

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
  
      mobile:{required: true, digits:true},
	  
	  bloodgroup:{required:true},

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
                                  <h3 style="color:#39C" > Driver</h3>
                                </li>
                                <!--<li>
                                    <a href="#">About Us</a>
                                </li>
                                <li>
                                    <a href="#">Services</a>
                                </li>
                                <li>
                                    <a href="#">Project</a>
                                </li>
                                <li>
                                   <a href="#"> Contact Us</a>
                                </li>-->
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
	  		echo form_open('driver/addDriver' , $attributes);
			

       ?>
                        
                        <div class="displa_table">
                            <table class="table table-bordered table-striped" id="smpl_tbl" style="border:none">
								
								<tbody>
									<tr style="border:none; background-color:#FFF;">
										
										<td><div class="row-fluid"><label>First Name<span class="f_req">*</span></label>
                                           <?php $atts = array(
													  'name' => 'first_name',
													  'id'   => 'first_name',
													  'size' => 50
													  
													  
										   ); ?>
                                             <?php echo form_input($atts); ?>
                                            
                                       </div></td>
										<td><div class="row-fluid"><label>Last Name<span class="f_req">*</span></label>
                                        <?php $atts = array(
													  'name' => 'last_name',
													  'id'   => 'last_name',
													  'size' => 50
													  
													  
										   ); ?>
                                             <?php echo form_input($atts); ?>
                                        </div></td>
                                         <td><div class="row-fluid"><label>License No<span class="f_req">*</span></label>
                                           <?php $atts = array(
													  'name' => 'license_no',
													  'id'   => 'license_no',
													  'size' => 50
													  
													  
										   ); ?>
                                             <?php echo form_input($atts); ?>
                                            
                                       </div></td></tr>
                                       <tr style="border:none; background-color:#FFF;">
										
                                        <td><div class="row-fluid"><label>Address 1<span class="f_req">*</span></label>
                                       <?php $atts = array(
													
													  'name' => 'address1',
													  'id'   => 'address1',
													  'size' => 35
													
										   ); ?>
                                             <?php echo form_input($atts); ?>
                                        </div></td>
							
										<td><div class="row-fluid"><label>Address 2<span class="f_req"></span></label>
                                           <?php $atts = array(
													  'name' => 'address2',
													  'id'   => 'address2',
													  'size' => 50
													  
													  
										   ); ?>
                                             <?php echo form_input($atts); ?>
                                            
                                       </div></td>
										<td><div class="row-fluid"><label>City<span class="f_req">*</span></label>
                                        <?php $atts = array(
													  'name' => 'city',
													  'id'   => 'city',
													  'size' => 50
													   
										   ); ?>
						                    <?php echo form_input($atts); ?>
                                        </div></td>
                                        
									</tr>

									<tr style="border:none; background-color:#FFF;">
										
										<td><div class="row-fluid"><label>Pincode<span class="f_req">*</span></label>
                                            <?php $atts = array(
													  'name' => 'pincode',
													  'id'   => 'pincode',
													  'size' => 50
													   
										   ); ?>
						                    <?php echo form_input($atts); ?>
                                        </div></td>
                                        <td><div class="row-fluid"><label>State<span class="f_req">*</span></label>
                                          <?php $atts = array(
													  'name' => 'state',
													  'id'   => 'state',
													  'size' => 50
													   
										   ); ?>
						                    <?php echo form_input($atts); ?>
                                        </div></td>
                                        <td><div class="row-fluid"><label>Blood Group<span class="f_req">*</span></label>
                                          <?php $atts = array(
													  'name' => 'bloodgroup',
													  'id'   => 'bloodgroup',
													  'size' => 50
													   
										   ); ?>
						                    <?php echo form_input($atts); ?>
                                        </div></td>
                                        </tr>
                                        <tr style="border:none; background-color:#FFF;">
										
										<td><div class="row-fluid"><label>Joining Date<span class="f_req">*</span></label>
                                        <?php $atts = array(
													  'name' => 'joining_date',
													  'id'   => 'joining_date',
													  'size' => 50
													   
										   ); ?>
						                    <?php echo form_input($atts); ?>
                                        </div></td>
                                       <td><div class="row-fluid"><label>Mobile No<span class="f_req">*</span></label>
                                           <?php $atts = array(
													  'name' => 'mobile',
													  'id'   => 'mobile',
													  'size' => 50
													  
													  
										   ); ?>
                                             <?php echo form_input($atts); ?>
                                            
                                       </div></td>
                                       <td><div class="row-fluid"><label>Driver Type<span class="f_req">*</span></label>
                                      <!--     <select name="driver_type" id="driver_type">
<option >Select</option>
<option value="H">Helper</option>
<option value="D">Driver</option>
</select>-->

Driver <input type="radio" name="driver_type" value="Driver" checked='true' />
			  Helper  <input type="radio" name="driver_type" value="Helper" />
                                       </div></td>
                                      
                                            
                                      </tr>
                                       
									<tr>
                                   
											<td rowspan="3">
                                          <?php  

            $atts = array(

               'name' => 'submit',

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
										
										<th>S.No</th>
										<th>image</th>
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
										<td><img src="<?php if($row['driverImage'] == NULL ) {  echo base_url(); ?>images/profile_default_male.png<?php  } else {     echo $row['driverImage'];   } ?>" style="height:50px; width:60px;"/></td>
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

