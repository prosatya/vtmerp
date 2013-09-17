<?php include("includes/header.php"); ?>
	<script>
      $(document).ready(function(){
      
    //* validation
    $('#materialmaster').validate({
     onkeyup: false,
     errorClass: 'error',
     validClass: 'valid',
     rules: {
      orderUnit:{ required: true},
      plant:{ check_item_dropdown: true },
      material: { check_item_dropdown: true },
      
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

$.validator.addMethod("check_item_dropdown", function(value, element) {  
	    return this.optional(element) || value != "none"  ;   
	    }, "");

            });

        </script>
	 <script type="text/javascript">
            $(document).ready(function () {
	
	 $('#material').change(function () {
		
		 var materialId = $(this).attr('value');
			
                    console.log(materialId);
                    $.ajax({   
                        url: "<?php echo base_url(); ?>ajax/productionMaterial/"+materialId, //The url where the server req would we made.
                        async: false,
                        type: "GET", //The type which you want to use: GET/POST
                        dataType: "html", //Return data type (what we expect).
                        //This is the function which will be called if ajax call is successful.
                        success: function(data) {
			
			var d=data;
			var myArray = d.split(',');
		for(var i=0;i<myArray.length;i++){

		if(i==0){


			$('#size').val(myArray[i]);
}
else{
		
		$('#issueUnit').val(myArray[i]);
		
}

    }
			
			}
			    

                    })
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
         <h3 style="color:#39c">Production</h3>
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
	  		echo form_open('production/addProductionIn' , $attributes);
      ?>
      <div class="displa_table">
      <table class="table table-bordered table-striped" id="smpl_tbl" style="border:none">
    	<tbody>
		<tr style="border:none; background-color:#FFF;">
		<td><div class="row-fluid"><label>Plant Name<span class="f_req">*</span></label>
		<select name="plant" id="plant"><option value="none">select plant</option>		
		<?php $a=count($plants);
								if ($a>0){
								foreach($plants as $p){ ?>
         <option value="<?php echo $p['id']; ?>"><?php echo $p['plantName']; ?></option>
         <?php }} ?></select></div></td>
         <td><div class="row-fluid"><label>Material<span class="f_req">*</span></label>
           <select id='material' name='material' ><option value="none">select Material</option>		
		<?php $a=count($materials);
								if ($a>0){
								foreach($materials as $m){ ?>
         <option value="<?php echo $m['id']; ?>" ><?php echo $m['material']; ?></option>
         <?php }} ?></select></div></td>
		<td><div class="row-fluid"><label>Size<span class="f_req">*</span></label>
          <?php $atts = array(
				'name' => 'size',	
				'id'      => 'size',
				'size' =>35,
				'readonly' => 'readonly'
			   ); ?>
          <?php echo form_input($atts); ?>
           </div></td>
           
		   </tr>
			<tr style="border:none; background-color:#FFF;">
           
			<td><div class="row-fluid"><label>Quantity Produced<span class="f_req">*</span></label>
            <?php $atts = array(
				'name' => 'orderUnit',
			    'id'   => 'orderUnit',
			    'size' => 50
			   ); ?>
            <?php echo form_input($atts); ?>
            </div></td>
		<td><div class="row-fluid"><label>Cost<span class="f_req">*</span></label>
                                        <?php $atts = array(
													  'name' => 'issueUnit',
													  'id'   => 'issueUnit',
													  'size' => 50,
						'readonly'	=>'readonly'                                   
										   ); ?>
						                    <?php echo form_input($atts); ?>
                                        </div></td>
                                        <td></td>
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
                                        					<th>Plant Name</th>
										<th>Material Name</th>
										<th>Size</th>
										<th>Quantity</th>
										<th>CreatedDate</th>
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
										<td><?php echo $row['plantName'] ; ?></td>
										
                                        <td><?php echo $row['material']; ?></td>
					 <td><?php echo $row['size']; ?></td>
                                        <td><?php echo $row['quantityProduce']; ?></td>
                                  <td><?php $t=date("d/m/Y", strtotime($row['createdDate']));					
					echo $t; ?></td>                                        
<td><a href="<?php echo base_url(); ?>/index.php?production/productionInEdit/<?php echo $row['productionIn_id']; ?>" class="sepV_a" title="Edit"><i class="icon-pencil"></i></a>
				
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

