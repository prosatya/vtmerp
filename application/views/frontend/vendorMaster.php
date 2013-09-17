<?php include("includes/header.php"); ?>

<script>
 	$(document).ready(function(){
    //* validation
    $('#vendor').validate({
     onkeyup: false,
     errorClass: 'error',
     validClass: 'valid',
     rules: {
      vname: { required: true, },
      address1: { required: true, },
      city:{ required: true,},
      state:{ required: true,},
      pincode:{ required: true,number:true,},
      mobile:{ required: true,number:true,},
      msupply:{ required: true,},
	notes:{ required:true,},
	phone:{number:true,},
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
                                    <h3 style="color:#39c">Vendor Master</h3>
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
        	
			$attributes = array('name' => 'vendor', 'id' => 'vendor');	   
	  		echo form_open('vendor/addVendor' , $attributes);
			

       ?>
                        
       <div class="displa_table">
       <table class="table table-bordered table-striped" id="smpl_tbl" style="border:none">
		<tbody>
		<tr style="border:none; background-color:#FFF;">
										
										<td><div class="row-fluid"><label>Vendor Name<span class="f_req">*</span></label>
                                           <?php $atts = array(
													  'name' => 'vname',
													  'id'   => 'vname',
													  'size' => 50
													  
													  
										   ); ?>
                                             <?php echo form_input($atts); ?>
                                            
                                       </div></td>
										<td><div class="row-fluid"><label>Address1<span class="f_req">*</span></label>
                                        <?php $atts = array(
													  'name' => 'address1',
													  'id'   => 'address1',
													  'size' => 50
													   
										   ); ?>
						                    <?php echo form_input($atts); ?>
                                        </div></td>
                                        <td><div class="row-fluid"><label>Address2<span class="f_req"></span></label>
                                       <?php $atts = array(
													
													  'name' => 'address2',
													  'id'   => 'address2',
													  'size' => 35
													
										   ); ?>
                                             <?php echo form_input($atts); ?>
                                        </div></td>
									</tr>

						<tr style="border:none; background-color:#FFF;">
										
										<td><div class="row-fluid"><label>City<span class="f_req">*</span></label>
                                           <?php $atts = array(
													  'name' => 'city',
													  'id'   => 'city',
													  'size' => 50
													  
													  
										   ); ?>
                                             <?php echo form_input($atts); ?>
                                            
                                       </div></td>
										<td><div class="row-fluid"><label>state<span class="f_req">*</span></label>
                                        <?php $atts = array(
													  'name' => 'state',
													  'id'   => 'state',
													  'size' => 50
													   
										   ); ?>
						                    <?php echo form_input($atts); ?>
                                        </div></td>
                                        <td><div class="row-fluid"><label>pincode<span class="f_req">*</span></label>
                                       <?php $atts = array(
													
													  'name' => 'pincode',
													  'id'   => 'pincode',
													  'size' => 35
													
										   ); ?>
                                             <?php echo form_input($atts); ?>
                                        </div></td>
									</tr>

									<tr style="border:none; background-color:#FFF;">
										
										<td><div class="row-fluid"><label>Phone<span class="f_req"></span></label>
                                           <?php $atts = array(
													  'name' => 'phone',
													  'id'   => 'phone',
													  'size' => 50
													  
													  
										   ); ?>
                                             <?php echo form_input($atts); ?>
                                            
                                       </div></td>
										<td><div class="row-fluid"><label>Mobile<span class="f_req">*</span></label>
                                        <?php $atts = array(
													  'name' => 'mobile',
													  'id'   => 'mobile',
													  'size' => 50
													   
										   ); ?>
						                    <?php echo form_input($atts); ?>
                                        </div></td>
<td><div class="row-fluid"><label>Material Supply<span class="f_req">*</span></label>
                                           <?php $atts = array(
													  'name' => 'msupply',
													  'id'   => 'msupply',
													  'size' => 50
													  
													  
										   ); ?>
                                             <?php echo form_input($atts); ?>
                                            
                                       </div></td>
                                        				</tr>


						<tr style="border:none; background-color:#FFF;">
<td><div class="row-fluid"><label>Details<span class="f_req"></span></label>
                                       <?php $atts = array(
													
													  'name' => 'notes',
													  'id'   => 'notes',
													  'rows' => 5,
													   'cols' => 5,
										   ); ?>
                                             <?php echo form_textarea($atts); ?>
                                        </div></td>
					
										
										</tr>
									
                                    <tr>
											<td rowspan="3">
                                          <?php  
										 $atts = array(
													  'name' => 'vendor',
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
                                <th>VendorName</th>
                                <th>Address1</th>
                                <th>city</th>
                          <th>State</th>																								
                                <th>PinCode</th>										
                                <th>Phone</th>										
                                <th>Mobile</th>
                                <th>MaterialSupply</th>										
                                <th>Edit</th>
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
										<td><?php echo $sno; ?> </td>
										<td><?php echo $row['vendor_name']; ?></td>
										<td><?php echo $row['address1']; ?></td>
                       								<td><?php echo $row['city']; ?></td>
										<td><?php echo $row['state']; ?></td>	
									<td><?php echo $row['pincode']; ?></td>									<td><?php echo $row['phone']; ?></td>
									    <td><?php echo $row['mobile']; ?></td>
   									    <td><?php echo $row['material_supply']; ?></td>

<td><a href="<?php echo base_url(); ?>/index.php?vendor/editVendor/<?php echo $row['id']; ?>" class="sepV_a" title="Edit"><i class="icon-pencil"></i></a>
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
