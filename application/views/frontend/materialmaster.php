<?php include("includes/header.php"); ?>
 <script>
    $(document).ready(function(){
    $('#dob').Zebra_DatePicker({
     // remember that the way you write down dates
     // depends on the value of the "format" property!
      view: 'years'
    });

    //* validation

    $('#materialmaster').validate({
     onkeyup: false,
     errorClass: 'error',
     validClass: 'valid',
     rules: {
      materialName: { required: true},
	  materialType:{ required: true},
      baseUnit:{required: true},
      orderUnit:{required: true},
      issueUnit:{required: true},
      cost:{required: true, number:true},
	  quantity:{number:true},
      reorderLevel:{required: true,number:true,},
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
         <h3 style="color:#39c">Material Master</h3>
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
			$attributes = array('name' => 'materialmaster', 'id' => 'materialmaster');	   
	  		echo form_open('materialmaster/addMaterialmaster' , $attributes);
      ?>
      <div class="displa_table">
      <table class="table table-bordered table-striped" id="smpl_tbl" style="border:none">
    	<tbody>
		<tr style="border:none; background-color:#FFF;">
		<td><div class="row-fluid"><label>Material Name<span class="f_req">*</span></label>
         <?php $atts = array(
			  'name' => 'materialName',
			  'id'   => 'materialName',
			  'size' => 50
		   ); ?>
         <?php echo form_input($atts); ?>
         </div></td>
		<td><div class="row-fluid"><label>Material Type<span class="f_req"></span></label>
          <?php $atts = array(
				'select' => 'Select',	
				'Vehicle Spare Part' => 'Vehicle Spare Part',
				'Fuel'      => 'Fuel',
				'Engine Oil'=> 'Engine Oil',
				'Many'      => 'Many'
			   ); ?>
          <?php echo form_dropdown('materialType', $atts, 'select'); ?>
           </div></td>
           <td><div class="row-fluid"><label>Base Unit<span class="f_req">*</span></label>
           <?php $atts = array(
    			 'name' => 'baseUnit',
			     'id'   => 'baseUnit',
			     'size' => 35
			  ); ?>
       	   <?php echo form_input($atts); ?>
           </div></td>
		   </tr>
			<tr style="border:none; background-color:#FFF;">
			<td><div class="row-fluid"><label>Order Unit<span class="f_req">*</span></label>
            <?php $atts = array(
				'name' => 'orderUnit',
			    'id'   => 'orderUnit',
			    'size' => 50
			   ); ?>
            <?php echo form_input($atts); ?>
            </div></td>
		<td><div class="row-fluid"><label>Issue Unit<span class="f_req">*</span></label>
                                        <?php $atts = array(
													  'name' => 'issueUnit',
													  'id'   => 'issueUnit',
													  'size' => 50
													   
										   ); ?>
						                    <?php echo form_input($atts); ?>
                                        </div></td>
                                        <td><div class="row-fluid"><label>Cost<span class="f_req">*</span></label>
                                           <?php $atts = array(
													  'name' => 'cost',
													  'id'   => 'cost',
													  'size' => 50
													  
													  
										   ); ?>
                                             <?php echo form_input($atts); ?>
                                        </div></td>
									</tr>

						<tr style="border:none; background-color:#FFF;">
    <td><div class="row-fluid"><label>Quantity<span class="f_req"></span></label>
                 <?php $atts = array(
					 'name' => 'quantity',
					 'id'   => 'quantity',
					 'size' => 50				  
					  ); ?>
                     <?php echo form_input($atts); ?>
                      </div></td>
										
										<td><div class="row-fluid"><label>Reorder Level<span class="f_req">*</span></label>
                                                <?php $atts = array(
													  'name' => 'reorderLevel',
													  'id'   => 'reorderLevel',
													  'size' => 50
													   
										   ); ?>
						                    <?php echo form_input($atts); ?>
                                        </div></td>
										
                          <td><div class="row-fluid"><label>Description<span class="f_req"></span></label>
                                       <?php $atts = array(
													
													  'name' => 'description',
													  'id'   => 'description',
													  'rows' => 3,
													   'cols' => 3,
										   ); ?>
                                             <?php echo form_textarea($atts); ?>
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
                                        <th>Material Name</th>
										<th>Material Type</th>
										<th>Base Unit</th>
                                        <th>Order Unit</th>
                                        <th>Issue Unit</th>
                                        <th>Cost</th>
                                        <th>Quantity</th>
                                        <th>Reorder Level</th>
										<th>Edit</th>
									</tr>
								</thead>
								<tbody>
                                <?php
								$sno = 0;
								$a=count($records);
								if ($a>0){
								foreach($records as $row){
									$sno = $sno + 1;
								 ?>
									<tr>
										<td><?php echo $sno; ?> </td>
										<td><?php echo $row['materialName']; ?></td>
                                        <td><?php echo $row['materialType']; ?></td>
                                        <td><?php echo $row['baseUnit']; ?></td>
                                         <td><?php echo $row['orderUnit']; ?></td>
                                        <td><?php echo $row['issueUnit']; ?></td>
										<td><?php echo $row['cost']; ?></td>
                                        <td><?php echo $row['quantity'];?></td>
                                        <td><?php echo $row['reorderLevel']; ?></td>
                                   

<td><a href="<?php echo base_url(); ?>materialmaster/editMaterialmaster/<?php echo $row['id']; ?>" class="sepV_a" title="Edit"><i class="icon-pencil"></i></a>
									</tr>
								<?php }} ?>	
								</tbody>
							</table>
                         <p><?php echo $links; ?></p>
                        </div>
                    </div>
                        
                </div>
                
            </div>
            
		<?php include("includes/sidebar.php"); ?>	

