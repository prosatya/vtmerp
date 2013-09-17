<?php include("includes/header.php"); ?>
    <!-- main content -->

	<script>
      $(document).ready(function(){
      
    //* validation
    $('#productionMaterial').validate({
     onkeyup: false,
     errorClass: 'error',
     validClass: 'valid',
     rules: {
      material: { required: true, },
      size: { required: true, },
      quantity: { required: true, },
      cost:{ required: true},
    
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
    <div id="contentwrapper">
       <div class="main_content">
         <nav>
         <div id="jCrumbs" class="breadCrumb module">
         <ul>
         <li>
         <a href="#"><i class="icon-home"></i></a>
         </li>
         <li>
         <h3 style="color:#39c">Production Material</h3>
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
			$attributes = array('name' => 'productionMaterial', 'id' => 'productionMaterial');	   
	  		echo form_open('production/addProductionMaterial' , $attributes);
      ?>
      <div class="displa_table">
      <table class="table table-bordered table-striped" id="smpl_tbl" style="border:none">
    	<tbody>
		<tr style="border:none; background-color:#FFF;">
		<td><div class="row-fluid"><label>Material Name<span class="f_req">*</span></label>
         <?php $atts = array(
					
				'name'      => 'material',
				'id'=> 'material',
				'size'      => 35
			   ); ?>
          <?php echo form_input($atts); ?>
         </div></td>
         <td><div class="row-fluid"><label>Size<span class="f_req">*</span></label>
           <?php $atts = array(
    			 'name' => 'size',
			     'id'   => 'size',
			     'size' => 35
			  ); ?>
       	   <?php echo form_input($atts); ?>
           </div></td>
		<td><div class="row-fluid"><label>Quantity<span class="f_req">*</span></label>
          <?php $atts = array(
				'name' => 'quantity',	
				'id'      => 'quantity',
				'size'      => 35
			   ); ?>
          <?php echo form_input($atts); ?>
           </div></td>
           
		   </tr>
			<tr style="border:none; background-color:#FFF;">
           
			<td><div class="row-fluid"><label>Cost<span class="f_req">*</span></label>
            <?php $atts = array(
				'name' => 'cost',
			    'id'   => 'cost',
			    'size' => 50
			   ); ?>
            <?php echo form_input($atts); ?>
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
										<th>Size</th>
										<th>Quantity</th>
                                        					<th>Cost</th>
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
										<td><?php echo $row['material'] ; ?></td>
										
                                        <td><?php echo $row['size']; ?></td>
                                        <td><?php echo $row['quantity']; ?></td>
                                        
                                        <td><?php echo $row['cost']; ?></td>

<td><a href="<?php echo base_url(); ?>/index.php?production/materialEdit/<?php echo $row['id']; ?>" class="sepV_a" title="Edit"><i class="icon-pencil"></i></a>
				
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

