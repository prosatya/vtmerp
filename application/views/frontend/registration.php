<?php include("includes/header.php"); ?>
 <script>
            $(document).ready(function(){
				$('#dob').Zebra_DatePicker({
					// remember that the way you write down dates
					// depends on the value of the "format" property!
					 view: 'years'
				});
				//* validation
				$('#registration').validate({
					onkeyup: false,
					errorClass: 'error',
					validClass: 'valid',
					rules: {
						user_name: { required: true, minlength: 3 },
						password: { required: true, minlength: 3, },
						cpassword:{ required: true, minlength: 3, equalTo:"#password", },
						email:{required: true, email: true},
						first_name:{required: true,minlength: 2},
						last_name:{required: true,minlength: 2},
						mobile:{required: true, digits: true},
						phone:{digits: true},
						address:{required: true},
						city:{required: true},
						state:{required: true},
						pincode:{required: true, digits: true},
						gender:{required: true},
						martial_status:{required: true},
						dob:{required: true},
						
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
                                 <h4 style="color:#39c">User Registration</h4>
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
                    <div class="clear"></div>
                   
			
                   
     <?php
        	
			$attributes = array('name' => 'registration', 'id' => 'registration');	   
	  		echo form_open('user/registrationvalidation' , $attributes);
			//echo form_hidden('id',$id['value']);

       ?>
                        
                        <div class="displa_table">
                            <table class="table table-bordered table-striped" id="smpl_tbl" style="border:none">
								
								<tbody>
									<tr style="border:none; background-color:#FFF;">
										
										<td><div class="row-fluid"><label>User Name.<span class="f_req">*</span></label>
                                           <?php $atts = array(
													  'name' => 'user_name',
													  'id'   => 'user_name',
													  'size' => 35
										   ); ?>
                                             <?php echo form_input($atts); ?>
                                            
                                       </div></td>
										<td><div class="row-fluid"><label>Password<span class="f_req">*</span></label>
                                        <?php $atts = array(
													  'name' => 'password',
													  'id'   => 'password',
													  'size' => 35
										   ); ?>
						                    <?php echo form_password($atts); ?>
                                        </div></td>
                                        <td><div class="row-fluid"><label>Confirm Password<span class="f_req">*</span></label>
                                       <?php $atts = array(
													  'name' => 'cpassword',
													  'id'   => 'cpassword',
													  'size' => 35
										   ); ?>
                                             <?php echo form_password($atts); ?>
                                        </div></td>
									</tr>
									<tr>
										<td><div class="row-fluid"><label>Email<span class="f_req">*</span></label>
                                        <?php $atts = array(
													  'name' => 'email',
													  'id'   => 'email',
													  'size' => 35
										   ); ?>
                                            <?php echo form_input($atts); ?>
                                         </div></td>
										<td>
                                        <div class="row-fluid"><label>First Name<span class="f_req">*</span></label>
                                        <?php $atts = array(
													  'name' => 'first_name',
													  'id'   => 'first_name',
													  'size' => 35
										   ); ?>
                                          <?php echo form_input($atts); ?>
                                        </div></td>
                                        <td><div class="row-fluid"><label>Last Name<span class="f_req">*</span></label>
                                        <?php $atts = array(
													  'name' => 'last_name',
													  'id'   => 'last_name',
													  'size' => 35
										   ); ?>
                                             <?php echo form_input($atts); ?>
                                        </div>
                                        </td>
									</tr>
									<tr>
										
										<td><div class="row-fluid"><label>Mobile <span class="f_req">*</span></label>
                                       <?php $atts = array(
													  'name' => 'mobile',
													  'id'   => 'mobile',
													  'size' => 35
										   ); ?>
                                             <?php echo form_input($atts); ?>
                                      
                                      
                                        </div></td>
										<td><div class="row-fluid"><label>Phone<span class="f_req"></span></label>
                                         <?php $atts = array(
													  'name' => 'phone',
													  'id'   => 'phone',
													  'size' => 35
										   ); ?>

                                             <?php echo form_input($atts); ?>
                                        </div></td>
                                        <td><div class="row-fluid"><label>Address<span class="f_req">*</span></label>
                                          <?php $atts = array(
													  'name' => 'address',
													  'id'   => 'address',
													  'size' => 35
										   ); ?>
                                             <?php echo form_input($atts); ?>
                                        </div></td>
										
									</tr>
									<tr>
										<td><div class="row-fluid"><label>City<span class="f_req">*</span></label>
                                         <?php $atts = array(
													  'name' => 'city',
													  'id'   => 'city',
													  'size' => 35
										   ); ?>
                                             <?php echo form_input($atts); ?>
                                        </div></td>
										<td><div class="row-fluid"><label>State<span class="f_req">*</span></label>
                                         <?php $atts = array(
													  'name' => 'state',
													  'id'   => 'state',
													  'size' => 35
										   ); ?>
                                             <?php echo form_input($atts); ?>
                                        </div></td>
                                        <td><div class="row-fluid"><label>Pincode<span class="f_req">*</span></label>
                                        <?php $atts = array(
													  'name' => 'pincode',
													  'id'   => 'pincode',
													  'size' => 35
										   ); ?>
                                             <?php echo form_input($atts); ?>
                                        </div></td>
									
									</tr>
									<tr>
										<td><div class="row-fluid"><label>Gender<span class="f_req">*</span></label>
                                       Male <input type="radio" name="myradio" value="Male" <?php echo set_radio('myradio', 'male', TRUE); ?> />
									  Female	<input type="radio" name="myradio" value="Female" <?php echo set_radio('myradio', 'female'); ?> />
                                        </div></td>
										<td><div class="row-fluid"><label>Marital Status<span class="f_req">*</span></label>
                                         <?php $atts = array(
										 			  'select' => 'Select',	
													  'single' => 'Single',
													  'married'   => 'Married'
											   ); ?>
                                             <?php echo form_dropdown('martial_status', $atts, 'select'); ?>
                                        </div></td>
                                        <td><div class="row-fluid"><label>Date of Birth<span class="f_req">*</span></label>
                                        <?php /* $atts = array(
													  'name' => 'dob',
													  'id'   => 'dob',
													  'size' => 35
										   ); ?>
                                             <?php echo form_input($atts); */ 
											 ?>
                                             <input type="text" name="dob" id="dob">
                                             
                                        </div></td>
									
									</tr>
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
										<th>User Name</th>
										<th>Name</th>
                                        <th>Email</th>
                                        <th>Mobile</th>
										<th>Phone</th>
										<th>Edit</th>
									</tr>
								</thead>
								<tbody>
                                <?php
								$sno = 0;
								foreach($records as $row){
									$sno = $sno + 1;
								 ?>
									<tr>
										<td><?php echo $sno; ?> </td>
										<td><?php echo $row['user_name']; ?></td>
										<td><?php echo $row['first_name']." ".$row['last_name']; ?></td>
										<td><?php echo $row['email']; ?></td>
                                        <td><?php echo $row['mobile']; ?></td>
										<td><?php echo $row['phone']; ?></td>
										<td><a href="<?php echo base_url(); ?>/user/edit_user/<?php echo $row['id']; ?>" class="sepV_a" title="Edit"><i class="icon-pencil"></i></a>
											<!--<a href="#" title="Delete"><i class="icon-trash"></i></a>--></td>
									</tr>
								<?php } ?>	
								</tbody>
							</table>
                        <p><?php echo $links; ?></p>

                        </div>
                    </div>
                        
                </div>
                
            </div>
            
		<?php include("includes/sidebar.php"); ?>	
