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

      cost:{required: true,number:true,},

      reorderLevel:{required: true},

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
<script type="text/javascript">
            $(document).ready(function () {
		
		var materialId = $('#materialId').val();
		
                    console.log(materialId);
                    $.ajax({   
                        url: "<?php echo base_url(); ?>ajax/materialCost/"+materialId, //The url where the server req would we made.
                        async: false,
                        type: "GET", //The type which you want to use: GET/POST
                        dataType: "html", //Return data type (what we expect).
                        //This is the function which will be called if ajax call is successful.
                        success: function(data) {
			var d=data;
			$('#cost').val(d);
			
			
		    }
			   
                    })
                
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
                                 <h3 style="color:#39c">Stock IN</h3>
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
			$attributes = array('name' => 'stockinmaster', 'id' => 'stockinmaster');	   
	  		echo form_open('stockinmaster/editStockinmaster', $attributes);
			echo form_hidden('id',$fid['value']);
			echo form_hidden('materialName',$fmaterialId['value']);
			echo form_hidden('vendorid',$fvendorId['value']);
       ?>
                       <div class="displa_table">
                            <table class="table table-bordered table-striped" id="smpl_tbl" style="border:none">
								
								<tbody>
									<tr style="border:none; background-color:#FFF;">
										
										<td><div class="row-fluid"><label id="vehicle_no">Material Id<span class="f_req">*</span></label>
                                         <select name="materialId"id="materialId">
<option value="">Select material</option>
<?php
$a=count($materialName);
			if($a>0){
		foreach($materialName as $row){

?>
<option value="<?php echo $row->id; ?>"<?php if($row->id == $fmaterialId['value']){ ?> selected <?php }?>><?php echo $row->materialName ; ?></option>
<?php
}
}
 ?>
</select>
                                       </div></td>
										<td><div class="row-fluid"><label id="vehicle_type">Vendor Id<span class="f_req">*</span></label>
			
<select name="vendorId"id="vendorId">
<option value="">Select Vendor</option>
<?php
$a=count($vendorName);
			if($a>0){
		foreach($vendorName as $row){

?>
<option value="<?php echo $row->id; ?>"<?php if($row->id == $fvendorId['value']){ ?> selected <?php }?>><?php echo $row->vendor_name; ?></option>
<?php
}
}
 ?>
</select>
                                        </div></td>
                                        <td><div class="row-fluid"><label id="make_year">Quantity<span class="f_req">*</span></label>
                                      
                                             <?php echo form_input('quantity',$fquantity['value']); ?>
                                        </div></td>
									</tr>
									<tr>
										<td><div class="row-fluid"><label id="color">Cost<span class="f_req">*</span></label>
                                            <?php echo form_input('cost',$fcost['value']); ?>
                                         </div></td>
										<td>
                                        <div class="row-fluid"><label id="chasis_no">Stroage Loc<span class="f_req">*</span></label>
                                          <?php echo form_input('storageLoc',$fstorageLoc['value']); ?>
                                        </div></td>
                                         
									</tr>
                                    <tr>
										<td rowspan="3">
                                        <?php echo form_submit('update', 'update');	 ?>
                                        <?php   echo form_reset('cancel', 'cancel'); ?>
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
                                      						<th>Material Id</th>
										<th>Vendor Id</th>
										<th>Quantity</th>
                                       						<th>Cost</th>
                                        					<th>Stroage Loc</th>
                                        
                                        																							
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
										<td><?php echo $row['materialId']; ?></td>
										
                                        <td><?php echo $row['vendorId']; ?></td>
                                        <td><?php echo $row['quantity']; ?></td>
                                        
                                        <td><?php echo $row['cost']; ?></td>
                                        <td><?php echo $row['storageLoc']; ?></td>
                                        
											
                                    

<td><a href="<?php echo base_url(); ?>/index.php?stockinmaster/editStockinmaster/<?php echo $row['id']; ?>" class="sepV_a" title="Edit"><i class="icon-pencil"></i></a>
				
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

