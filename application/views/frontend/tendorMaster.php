

<?php include("includes/header.php"); ?>

<script>
            $(document).ready(function(){
                 $('#idate').Zebra_DatePicker();
		 $('#ldotp').Zebra_DatePicker();
		 $('#ldots').Zebra_DatePicker();
		 $('#odtt').Zebra_DatePicker();
		 $('#odft').Zebra_DatePicker();
    //* validation
    $('#tendor').validate({
     onkeyup: false,
     errorClass: 'error',
     validClass: 'valid',
     rules: {
      tendorfor: { required: true, },
      lfts: { required: true, },
      //ws:{ required: true,},
      tt:{ required: true,},
      //tn:{ required: true,},
      now:{ required: true,},
	//rp:{ required: true,},
      wt:{ required: true,},
      //ts:{ required: true,},
      //idate:{ required: true,},
      //ldotp:{ required: true,},
	//ldots:{ required: true,},
	//odtt:{ required: true,},
	//odft:{ required: true,},
	dc:{ required: true,number: true,},
	tv:{ required: true,},
	remarks:{ required: true,},
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
                                    <h3 style="color:#39c">Tendor Master</h3>
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
        	
			$attributes = array('name' => 'tendor', 'id' => 'tendor');	   
	  		echo form_open('tendor/addTendor' , $attributes);
			

       ?>
                        
                        <div class="displa_table">
                            <table class="table table-bordered table-striped" id="smpl_tbl" style="border:none">
								
								<tbody>
									<tr style="border:none; background-color:#FFF;">
										
										<td><div class="row-fluid"><label>Tendor For<span class="f_req">*</span></label>
                                           <?php $atts = array(
													  'name' => 'tendorfor',
													  'id'   => 'tendorfor',
													  'size' => 50
													  
													  
										   ); ?>
                                             <?php echo form_input($atts); ?>
                                            
                                       </div></td>
										<td><div class="row-fluid"><label>Location for Tendor Submission<span class="f_req">*</span></label>
                                        <?php $atts = array(
													  'name' => 'lfts',
													  'id'   => 'lfts',
													  'size' => 50
													   
										   ); ?>
						                    <?php echo form_input($atts); ?>
                                        </div></td>
                                        <td><div class="row-fluid"><label>Work Station<span class="f_req"></span></label>
                                       <?php $atts = array(
													
													  'name' => 'ws',
													  'id'   => 'ws',
													  'size' => 35
													
										   ); ?>
                                             <?php echo form_input($atts); ?>
                                        </div></td>
									</tr>

						<tr style="border:none; background-color:#FFF;">
										
										<td><div class="row-fluid"><label>Tendor Type<span class="f_req">*</span></label>
                                           <?php $atts = array(
													  'name' => 'tt',
													  'id'   => 'tt',
													  'size' => 50
													  
													  
										   ); ?>
                                             <?php echo form_input($atts); ?>
                                            
                                       </div></td>
										<td><div class="row-fluid"><label>Tendor No<span class="f_req"></span></label>
                                        <?php $atts = array(
													  'name' => 'tn',
													  'id'   => 'tn',
													  'size' => 50
													   
										   ); ?>
						                    <?php echo form_input($atts); ?>
                                        </div></td>
                                        <td><div class="row-fluid"><label>Name of Work<span class="f_req">*</span></label>
                                       <?php $atts = array(
													
													  'name' => 'now',
													  'id'   => 'now',
													  'size' => 35
													
										   ); ?>
                                             <?php echo form_input($atts); ?>
                                        </div></td>
									</tr>

									<tr style="border:none; background-color:#FFF;">
										
										<td><div class="row-fluid"><label>Responsible Person<span class="f_req"></span></label>
                                           <?php $atts = array(
													  'name' => 'rp',
													  'id'   => 'rp',
													  'size' => 50
													  
													  
										   ); ?>
                                             <?php echo form_input($atts); ?>
                                            
                                       </div></td>
										<td><div class="row-fluid"><label>Work Type<span class="f_req">*</span></label>
                                        <?php $atts = array(
													  'name' => 'wt',
													  'id'   => 'wt',
													  'size' => 50
													   
										   ); ?>
						                    <?php echo form_input($atts); ?>
                                        </div></td>
<td><div class="row-fluid"><label>Tendor Source<span class="f_req"></span></label>
                                           <?php $atts = array(
													  'name' => 'ts',
													  'id'   => 'ts',
													  'size' => 50
													  
													  
										   ); ?>
                                             <?php echo form_input($atts); ?>
                                            
                                       </div></td>
                                        				</tr>


						<tr style="border:none; background-color:#FFF;">
<td><div class="row-fluid"><label>Intimation Date<span class="f_req"></span></label>
                                       <?php $atts = array(
													
													  'name' => 'idate',
													  'id'   => 'idate',
													  'size' => 50
										   ); ?>
                                             <?php echo form_input($atts); ?>
                                        </div></td>
					<td><div class="row-fluid"><label>Last Date of Tendor Purchase<span class="f_req"></span></label>
                                       <?php $atts = array(
													
													  'name' => 'ldotp',
													  'id'   => 'ldotp',
													  'size' => 50
										   ); ?>
                                             <?php echo form_input($atts); ?>
                                        </div></td>
					<td><div class="row-fluid"><label>Last Date of Tendor Submission <span class="f_req"></span></label>
                                       <?php $atts = array(
													
													  'name' => 'ldots',
													  'id'   => 'ldots',
													  'size' => 50
										   ); ?>
                                             <?php echo form_input($atts); ?>
                                        </div></td>					
										</tr>
					

						<tr style="border:none; background-color:#FFF;">
<td><div class="row-fluid"><label>Open Date Technicle Tender<span class="f_req"></span></label>
                                       <?php $atts = array(
													
													  'name' => 'odtt',
													  'id'   => 'odtt',
													  'size' => 50
										   ); ?>
                                             <?php echo form_input($atts); ?>
                                        </div></td>
					<td><div class="row-fluid"><label>Open Date Financial Tender<span class="f_req"></span></label>
                                       <?php $atts = array(
													
													  'name' => 'odft',
													  'id'   => 'odft',
													  'size' => 50
										   ); ?>
                                             <?php echo form_input($atts); ?>
                                        </div></td>
					<td><div class="row-fluid"><label>Document Cost<span class="f_req">*</span></label>
                                       <?php $atts = array(
													
													  'name' => 'dc',
													  'id'   => 'dc',
													  'size' => 50
										   ); ?>
                                             <?php echo form_input($atts); ?>
                                        </div></td>					
										</tr>
<tr>				
<td><div class="row-fluid"><label>Tender Value<span class="f_req">*</span></label>
                                       <?php $atts = array(
													
													  'name' => 'tv',
													  'id'   => 'tv',
													  'size' => 50
										   ); ?>
                                             <?php echo form_input($atts); ?>
                                        </div></td>
					<td><div class="row-fluid"><label>Remarks<span class="f_req">*</span></label>
                                       <?php $atts = array(
													
													  'name' => 'remarks',
													  'id'   => 'remarks',
													  'size' => 50,
													   'rows'=> 5,
													'cols'=>5,

										
										   ); ?>
                                             <?php echo form_textarea($atts); ?>
                                        </div></td>					
										</tr>				                                    

					<tr>
											<td rowspan="3">
                                         <?php  
										 $atts = array(
													  'name' => 'tender',
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
										<th><center>TendorFor</center></th>
										<th><center>Location For Tender</center></th>
                                        					
                                        					<th><center>Intimation Date</center></th>
						<th><center>Last Date Of Tender Purchase</center></th>																								<th><center>Last Date of Tender Submission</center></th>										
	<th><center>Open Date Technicle Tender</center></th>										
										<th><center>Open Date Financial Tender</center></th>
														
										
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
<td><center><?php echo $sno; ?> </center></td>
<td><center><?php echo $row['tender_for']; ?></center></td>
<td><center><?php echo $row['location_for_tender_submission']; ?></center></td>
<?php $date1 = strtotime($row['intimation_date']);
$date1 = date('d-m-Y',$date1);?>
<td><?php echo $date1; ?></td>
<?php $date = strtotime($row['last_date_of_tender_purchase']);
$date = date('d-m-Y',$date);?>
<td><center><?php echo $date; ?></center></td>	
<?php $date2 = strtotime($row['last_date_of_tender_submission']);
$date2 = date('d-m-Y',$date2);?>
<td><center><?php echo $date2; ?></center></td>
<?php $date3 = strtotime($row['open_date_technical_tender']);
$date3 = date('d-m-Y',$date3);?>								
<td><center><?php echo $date3; ?></center></td>
<?php $date4 = strtotime($row['open_date_financial_tender']);
$date4 = date('d-m-Y',$date4);?>
<td><center><?php echo $date4; ?></center></td>
									
<td><center><a href="<?php echo base_url(); ?>/index.php?tendor/editTendor/<?php echo $row['id']; ?>" class="sepV_a" title="Edit"><i class="icon-pencil"></i></a></center></td>
				
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

