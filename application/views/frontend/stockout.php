
<?php include("includes/header.php"); ?>
<script>
      $(document).ready(function(){
      
    //* validation
    $('#stockmaster').validate({
     onkeyup: false,
     errorClass: 'error',
     validClass: 'valid',
     rules: {
      materialId: { required: true, },
      issuedTo: { required: true, },
      quantity: { required: true,number: true },
      storageLoc:{ required: true},
	
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
   <script type="text/javascript">
            $(document).ready(function () {
	
	 $('#materialId').change(function () {
		 var materialId = $(this).attr('value');
                    console.log(materialId);
                    $.ajax({   
                        url: "<?php echo base_url(); ?>ajax/materialCost/"+materialId, //The url where the server req would we made.
                        async: false,
                        type: "GET", //The type which you want to use: GET/POST
                        dataType: "html", //Return data type (what we expect).
                        //This is the function which will be called if ajax call is successful.
                        success: function(data) {
			var d=data;
			var myArray = d.split(',');
		for(var i=0;i<myArray.length;i++){

		if(i==0){


			$('#cost').val(myArray[i]);
}
else{
		
		$('#balance').val(myArray[i]);
		
}

    }
			
			}
			    

                    })
                });
			$('#quantity').focus(function() {
			var v = $('#balance').attr('value');
			if(v == 0){
			$('#quantity').attr('readonly','readonly');	
			alert("Insufficient Stock");}
			else{$('#quantity').removeAttr('readonly');
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
                                    <h3 style="color:#39c">Stock Out</h3>
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
			$attributes = array('name' => 'stockmaster', 'id' => 'stockmaster');	   
	  		echo form_open('stockmaster/addStockout' , $attributes);
			
       ?>
                        
                        <div class="displa_table">
                            <table class="table table-bordered table-striped" id="smpl_tbl" style="border:none">
								
								<tbody>
									<tr style="border:none; background-color:#FFF;"> <td><div class="row-fluid"><label>Material Id<span class="f_req">*</span></label>

<select name="materialId"id="materialId">
<option value="">Select Material</option>
<?php
$a=count($materialname);
			if($a>0){
		foreach($materialname as $row){

?>
<option value="<?php echo $row->id; ?>"><?php echo $row->materialName; ?></option>
<?php
}
}
 ?>
</select></div></td>
				   		
										<td><div class="row-fluid"><label>Cost<span class="f_req">*</span></label>
                                                <?php $atts = array(
													  'name' => 'cost',
													  'id'   => 'cost',
													  'size' => 50,
													'readonly'=>'readonly',
													   
										   ); ?>
						                    <?php echo form_input($atts); ?>
                                        </div></td>
                                        <td><div class="row-fluid"><label>Issued To<span class="f_req">*</span></label>
                                        <?php $atts = array(
													  'name' => 'issuedTo',
													  'id'   => 'issuedTo',
													  'size' => 50,
													
													   
										   ); ?>
						                    <?php echo form_input($atts); ?>
                                        </div></td>

                          </tr>
								<tr style="border:none; background-color:#FFF;">
                                <td><div class="row-fluid"><label>Quantity<span class="f_req">*</span></label>
                                           <?php $atts = array(
													  'name' => 'quantity',
													  'id'   => 'quantity',
													  'size' => 50
													  
													  
										   ); ?>
                                             <?php echo form_input($atts); ?>
                                            
                                       </div></td>
										<td><div class="row-fluid"><label>Storage Loc<span class="f_req">*</span></label>
                                           <?php $atts = array(
													  'name' => 'storageLoc',
													  'id'   => 'storageLoc',
													  'size' => 50
													  
													  
										   ); ?>
                                             <?php echo form_input($atts); ?>
                                            
                                       </div></td>

			<td><div class="row-fluid"><label>Balance<span class="f_req"></span></label>
                                       <?php $atts = array(
													
													  'name' => 'balance',
													  'id'   => 'balance',
													'readonly' =>'true',	
													  'size' => 35
													
										   ); ?>
                                             <?php echo form_input($atts); ?>
                                        </div></td>
																			</tr>

                                    <tr>
											<td rowspan="3">
                                       
   <?php  

            $atts = array(

               'name' => 'vehicle_insurance',

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
										<th><center>Material Id</center></th>
										<th><center>Cost</center></th>
										<th><center>Issued To</center></th>
                                                                                <th><center>Quantity</center></th>
										<th><center>Storage Loc</center></th>
										<th><center>Edit</center></th>
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
										<td><center><?php echo $row['materialName']; ?></center></td>
										<td><center><?php echo $row['cost']; ?></center></td>
										<td><center><?php echo $row['issuedTo']; ?></center></td>
										<td><center><?php echo $row['quantity']; ?></center></td>
										<td><center><?php echo $row['storageLoc']; ?></center></td>
										
										
										

							<td><center><a href="<?php echo base_url(); ?>/index.php?stockmaster/editStockout/<?php echo $row['id']; ?>" class="sepV_a" title="Edit"><i class="icon-pencil"></i></center></a>
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
