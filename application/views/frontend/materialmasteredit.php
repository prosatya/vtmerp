<?php include("includes/header.php"); ?>
            <!-- main content -->
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

      cost:{required: true},

      reorderLevel:{required: true,number:true,},

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
	  		echo form_open('materialmaster/editMaterialmaster', $attributes);
			echo form_hidden('id',$fid['value']);
       ?>
                       <div class="displa_table">
                            <table class="table table-bordered table-striped" id="smpl_tbl" style="border:none">
								
								<tbody>
									<tr style="border:none; background-color:#FFF;">
										
										<td><div class="row-fluid"><label id="vehicle_no">Material Name<span class="f_req">*</span></label>
                                          
                                             <?php echo form_input('materialName',$fmaterialName['value']); ?>
                                       </div></td>
										<td><div class="row-fluid"><label id="vehicle_type">Material Type<span class="f_req"></span></label>
<select name="materialType"id="materialType">
<option>Select</option>
<option value="Vehicle Spare Part" <?php if('Vehicle Spare Part'==$fmaterialType['value']){ ?>selected<?php } ?>>Vehicle Spare Part</option>
<option value="Fuel" <?php if('Fuel'==$fmaterialType['value']){ ?>selected<?php } ?>>Fuel</option>
<option value="Engine Oil" <?php if('Engine Oil'==$fmaterialType['value']){ ?>selected<?php } ?>>Engine Oil</option>
<option value="Many" <?php if('Many'==$fmaterialType['value']){ ?>selected<?php } ?>>Many</option>
</select>
                                        </div></td>
                                        <td><div class="row-fluid"><label id="make_year">Base Unit<span class="f_req">*</span></label>
                                      
                                             <?php echo form_input('baseUnit',$fbaseUnit['value']); ?>
                                        </div></td>
									</tr>


									<tr>
										<td><div class="row-fluid"><label id="color">Order Unit<span class="f_req">*</span></label>
                                            <?php echo form_input('orderUnit',$forderUnit['value']); ?>
                                         </div></td>
										<td>
                                        <div class="row-fluid"><label id="chasis_no">Issue Unit<span class="f_req">*</span></label>
                                          <?php echo form_input('issueUnit',$fissueUnit['value']); ?>
                                        </div></td>
                                         <td><div class="row-fluid"><label>Cost<span class="f_req">*</span></label>
                                          <?php echo form_input('cost',$fcost['value']); ?>
                                        </div>
                                        </td>
									</tr>
									<tr>
										<td><div class="row-fluid"><label id="vendor_id">Reorder Level <span class="f_req">*</span></label>
                                           <?php echo form_input('reorderLevel',$freorderLevel['value']); ?>
                                        </div></td>
										
										<td><div class="row-fluid"><label id="description">Description<span class="f_req"></span></label>
                                                  
                                       <?php $atts = array(
													
													  'name' => 'description',
													  'id'   => 'description',
													  'rows' => 3,
													   'cols' => 3,
										   ); ?>
                                             <?php echo form_textarea($atts,$fdescription['value']); ?>

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
                                        <th>Material Name</th>
										<th>Material Type</th>
										<th>Base Unit</th>
                                        <th>Order Unit</th>
                                        <th>Issue Unit</th>
                                        <th>Cost</th>
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
                                        <td><?php echo $row['reorderLevel']; ?></td>
                                        
			                          
                                    

<td><a href="<?php echo base_url(); ?>/index.php?materialmaster/editMaterialmaster/<?php echo $row['id']; ?>" class="sepV_a" title="Edit"><i class="icon-pencil"></i></a>
				
									</tr>
								<?php }} ?>	
								</tbody>
							</table>
                      <p><?php // echo $links; ?></p>
                        </div>
                    </div>
                        
                </div>
                
            </div>
            
		<?php include("includes/sidebar.php"); ?>	

