<?php include("includes/header.php"); ?>
<script src="<?php echo base_url(); ?>/css/tabs/tabs_old.js" type="text/javascript"></script>
<link href="<?php echo base_url(); ?>/css/tabs/style.css" rel="stylesheet" type="text/css" />
<script>
$(document).ready(function(){
  $('#Wheel_Basing_serviceDate').Zebra_DatePicker({format: 'd/m/Y'});
  $('#bl_serviceDate').Zebra_DatePicker({format: 'd/m/Y'});
  $('#Gear_serviceDate').Zebra_DatePicker({format: 'd/m/Y'});
  $('#Bearing_serviceDate').Zebra_DatePicker({format: 'd/m/Y'});
  $('#Ring_serviceDate').Zebra_DatePicker({format: 'd/m/Y'});
  $('#Liner_serviceDate').Zebra_DatePicker({format: 'd/m/Y'});
  $('#Piston_serviceDate').Zebra_DatePicker({format: 'd/m/Y'});
  $('#wiring_serviceDate').Zebra_DatePicker({format: 'd/m/Y'});
  $('#Engine_oil_serviceDate').Zebra_DatePicker({format: 'd/m/Y'});
  $('#Hydrolic_Oil_serviceDate').Zebra_DatePicker({format: 'd/m/Y'});
  $('#Steering_Oil_serviceDate').Zebra_DatePicker({format: 'd/m/Y'});
  $('#Breaks_Oil_serviceDate').Zebra_DatePicker({format: 'd/m/Y'});
    //* validation
    $('#maintainance').validate({
     onkeyup: false,
     errorClass: 'error',
     validClass: 'valid',
     rules: {
     vehicle_id: { required: true, },
     },
     highlight: function(element) {
      $(element).closest('div').addClass("f_error");
      setTimeout(function() {
      // boxHeight()
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
            $('#vehicle_id').change(function () {
              var vehicleid = $(this).attr('value');
              console.log(vehicleid);
              $.ajax({   
              url: "<?php echo base_url(); ?>ajax/vehicleShow/"+vehicleid, //The url where the server req would we made.
                        async: false,
                        type: "GET", //The type which you want to use: GET/POST
                        dataType: "html", //Return data type (what we expect).
                         
                        //This is the function which will be called if ajax call is successful.
                        success: function(data) {
						var d=data;

		var myArray = d.split(',');
		for(var i=0;i<myArray.length;i++){

		if(i==0){
			$('#vehicle_type').val(myArray[i]);
		}
		else{
				$('#make').val(myArray[i]);
			}
    	}
	    }
        })
        });
        });
        </script>
<script>
$(document).ready(function () {
//engine oil
$('#Engine_oil_cost').keyup(function (){

	var sum1 = ($('input[name=Engine_oil_cost]').val());
	var sum2 = ($('input[name=Hydrolic_Oil_cost]').val());
	var sum3 = ($('input[name=Steering_Oil_cost]').val());
	var sum4 = ($('input[name=Breaks_Oil_cost]').val());
	$('#total_sum').val(Number(sum1) + Number(sum2) + Number(sum3) + Number(sum4));
});	

//hydrolic	
$('#Hydrolic_Oil_cost').keyup(function (){
	var sum1 = ($('input[name=Engine_oil_cost]').val());
	var sum2 = ($('input[name=Hydrolic_Oil_cost]').val());
	var sum3 = ($('input[name=Steering_Oil_cost]').val());
	var sum4 = ($('input[name=Breaks_Oil_cost]').val());
	$('#total_sum').val(Number(sum1) + Number(sum2) + Number(sum3) + Number(sum4));
});	
//steering
$('#Steering_Oil_cost').keyup(function (){
	var sum1 = ($('input[name=Engine_oil_cost]').val());
	var sum2 = ($('input[name=Hydrolic_Oil_cost]').val());
	var sum3 = ($('input[name=Steering_Oil_cost]').val());
	var sum4 = ($('input[name=Breaks_Oil_cost]').val());
	$('#total_sum').val(Number(sum1) + Number(sum2) + Number(sum3) + Number(sum4));
});	
//breaks
$('#Breaks_Oil_cost').keyup(function (){
	var sum1 = ($('input[name=Engine_oil_cost]').val());
	var sum2 = ($('input[name=Hydrolic_Oil_cost]').val());
	var sum3 = ($('input[name=Steering_Oil_cost]').val());
	var sum4 = ($('input[name=Breaks_Oil_cost]').val());
	$('#total_sum').val(Number(sum1) + Number(sum2) + Number(sum3) + Number(sum4));
});	
});
</script>
    <script>
  $(document).ready(function () {
	
	$('#Wheel_Basing_cost').keyup(function (){
	var sum1 = ($('input[name=Wheel_Basing_cost]').val());
	var sum2 = ($('input[name=bl_cost]').val());
	var sum3 = ($('input[name=Gear_cost]').val());
	var sum4 = ($('input[name=Bearing_cost]').val());
	var sum5 = ($('input[name=Ring_cost]').val());
	var sum6 = ($('input[name=Liner_cost]').val());
	var sum7 = ($('input[name=Piston_cost]').val());
	var sum8 = ($('input[name=wiring_cost]').val());
$('#total_sum1').val(Number(sum1) + Number(sum2) + Number(sum3) + Number(sum4) + Number(sum5) + Number(sum6) + Number(sum7) + Number(sum8));
});	
    
	$('#bl_cost').keyup(function (){
	var sum1 = ($('input[name=Wheel_Basing_cost]').val());
	var sum2 = ($('input[name=bl_cost]').val());
	var sum3 = ($('input[name=Gear_cost]').val());
	var sum4 = ($('input[name=Bearing_cost]').val());
	var sum5 = ($('input[name=Ring_cost]').val());
	var sum6 = ($('input[name=Liner_cost]').val());
	var sum7 = ($('input[name=Piston_cost]').val());
	var sum8 = ($('input[name=wiring_cost]').val());
$('#total_sum1').val(Number(sum1) + Number(sum2) + Number(sum3) + Number(sum4) + Number(sum5) + Number(sum6) + Number(sum7) + Number(sum8));
});	
//gear
	$('#bl_cost').keyup(function (){
	var sum1 = ($('input[name=Wheel_Basing_cost]').val());
	var sum2 = ($('input[name=bl_cost]').val());
	var sum3 = ($('input[name=Gear_cost]').val());
	var sum4 = ($('input[name=Bearing_cost]').val());
	var sum5 = ($('input[name=Ring_cost]').val());
	var sum6 = ($('input[name=Liner_cost]').val());
	var sum7 = ($('input[name=Piston_cost]').val());
	var sum8 = ($('input[name=wiring_cost]').val());
$('#total_sum1').val(Number(sum1) + Number(sum2) + Number(sum3) + Number(sum4) + Number(sum5) + Number(sum6) + Number(sum7) + Number(sum8));
});	
//bearing
	$('#Bearing_cost').keyup(function (){
	var sum1 = ($('input[name=Wheel_Basing_cost]').val());
	var sum2 = ($('input[name=bl_cost]').val());
	var sum3 = ($('input[name=Gear_cost]').val());
	var sum4 = ($('input[name=Bearing_cost]').val());
	var sum5 = ($('input[name=Ring_cost]').val());
	var sum6 = ($('input[name=Liner_cost]').val());
	var sum7 = ($('input[name=Piston_cost]').val());
	var sum8 = ($('input[name=wiring_cost]').val());
$('#total_sum1').val(Number(sum1) + Number(sum2) + Number(sum3) + Number(sum4) + Number(sum5) + Number(sum6) + Number(sum7) + Number(sum8));
});	
//ring
	$('#Ring_cost').keyup(function (){
	var sum1 = ($('input[name=Wheel_Basing_cost]').val());
	var sum2 = ($('input[name=bl_cost]').val());
	var sum3 = ($('input[name=Gear_cost]').val());
	var sum4 = ($('input[name=Bearing_cost]').val());
	var sum5 = ($('input[name=Ring_cost]').val());
	var sum6 = ($('input[name=Liner_cost]').val());
	var sum7 = ($('input[name=Piston_cost]').val());
	var sum8 = ($('input[name=wiring_cost]').val());
$('#total_sum1').val(Number(sum1) + Number(sum2) + Number(sum3) + Number(sum4) + Number(sum5) + Number(sum6) + Number(sum7) + Number(sum8));
});	
//liner
	$('#Liner_cost').keyup(function (){
	var sum1 = ($('input[name=Wheel_Basing_cost]').val());
	var sum2 = ($('input[name=bl_cost]').val());
	var sum3 = ($('input[name=Gear_cost]').val());
	var sum4 = ($('input[name=Bearing_cost]').val());
	var sum5 = ($('input[name=Ring_cost]').val());
	var sum6 = ($('input[name=Liner_cost]').val());
	var sum7 = ($('input[name=Piston_cost]').val());
	var sum8 = ($('input[name=wiring_cost]').val());
$('#total_sum1').val(Number(sum1) + Number(sum2) + Number(sum3) + Number(sum4) + Number(sum5) + Number(sum6) + Number(sum7) + Number(sum8));
});	
//piston
	$('#Piston_cost').keyup(function (){
	var sum1 = ($('input[name=Wheel_Basing_cost]').val());
	var sum2 = ($('input[name=bl_cost]').val());
	var sum3 = ($('input[name=Gear_cost]').val());
	var sum4 = ($('input[name=Bearing_cost]').val());
	var sum5 = ($('input[name=Ring_cost]').val());
	var sum6 = ($('input[name=Liner_cost]').val());
	var sum7 = ($('input[name=Piston_cost]').val());
	var sum8 = ($('input[name=wiring_cost]').val());
$('#total_sum1').val(Number(sum1) + Number(sum2) + Number(sum3) + Number(sum4) + Number(sum5) + Number(sum6) + Number(sum7) + Number(sum8));
});	
//wiring
	$('#wiring_cost').keyup(function (){
	var sum1 = ($('input[name=Wheel_Basing_cost]').val());
	var sum2 = ($('input[name=bl_cost]').val());
	var sum3 = ($('input[name=Gear_cost]').val());
	var sum4 = ($('input[name=Bearing_cost]').val());
	var sum5 = ($('input[name=Ring_cost]').val());
	var sum6 = ($('input[name=Liner_cost]').val());
	var sum7 = ($('input[name=Piston_cost]').val());
	var sum8 = ($('input[name=wiring_cost]').val());
$('#total_sum1').val(Number(sum1) + Number(sum2) + Number(sum3) + Number(sum4) + Number(sum5) + Number(sum6) + Number(sum7) + Number(sum8));
});	
});
</script>
   <!-- main content -->
   <?php   	
			$attributes = array('name' => 'maintainance', 'id' => 'maintainance');	   
	  		echo form_open('maintainance/addMaintainance' , $attributes);
   ?>
  <div id="contentwrapper">
  <div class="main_content">
  <div class="displa_table">
  <table class="table table-bordered table-striped" id="smpl_tbl" style="border:none">
	<tbody>
	<tr style="border:none; background-color:#FFF;"> <td><div class="row-fluid"><label>Vehicle_ID<span class="f_req">*</span></label>
<select name="vehicle_id"id="vehicle_id">
<option value="">Select Vehicle</option>
<?php
		if(count($vehicleno)>0){
		foreach($vehicleno as $row){
?>
<option value="<?php echo $row->id; ?>"><?php echo $row->vehicle_no; ?></option>
<?php
}
}
 ?>
</select>
</div></td>				
<td><div class="row-fluid" id="vehicleType"><label>Vehicle Type<span class="f_req">*</span></label>
                                           <?php $atts = array(
													  'name' => 'vehicle_type',
													  'id'   => 'vehicle_type',
													  'size' => 50,
									                  'readonly'=>'readonly',
										   ); ?>
                                             <?php echo form_input($atts); ?>
                                            
                                       </div></td>

										<td><div class="row-fluid"><label>Make<span class="f_req">*</span></label>
                                        <?php $atts = array(
													  'name' => 'make',
													  'id'   => 'make',
													  'size' => 50,
													  'readonly'=>'readonly',
										   ); ?>
						                    <?php echo form_input($atts); ?>
                                        </div></td>

                          </tr>
                          </table> 
    <div id="tabContainer">
    <div id="tabs">
      <ul>
        <li id="tabHeader_1">Oil Change</li>
        <li id="tabHeader_2">Captive Maintainance</li>
      </ul>
    </div>
    <div id="tabscontent">
      <div class="tabpage" id="tabpage_1">
        <h2>Oil Change</h2>
        <p><table cellspacing="10" cellpadding="5"  style="text-align:center; margin: 8px 0px 12px;">
   <tr>
    <th width="141">Service </th>
    <th width="44">Mileage</label></th>
    <th width="70">Service Date</th>
    <th width="70">Cost</th>
    <th width="75">Invoice #</th>
<th width="75">Notes</th>
    </tr>
 
 
    <tr>
    <td> 
<label>Engine Oil</label>
  </td>
    <td>
 <?php $atts = array( 'name'  => 'Engine_oil_mileage',
                            'style' => 'width:50px',
                             ); ?>
    <?php echo form_input($atts); ?>
   
    </td>
    <td>
    <?php 
 $dte = date('d-m-Y');
 $atts = array( 'name'  => 'Engine_oil_serviceDate',
                         'style' => 'width:100px',
       'id' => 'Engine_oil_serviceDate',
       'value' => $dte,
                             ); ?>
    <?php echo form_input($atts); ?>
    </td>
    
    <td>
    <?php $atts = array('name'  => 'Engine_oil_cost',
                        'style' => 'width:100px',
			'id'=>'Engine_oil_cost',
                        ); ?>
    <?php echo form_input($atts); ?>
    </td>
    <td>
    <?php $atts = array('name'  => 'Engine_oil_invoice',
                        'style' => 'width:100px',
                             ); ?>
    <?php echo form_input($atts); ?>
    </td>
   <td>
  <?php $atts = array('name'  => 'Engine_oil_notes',

   'rows'=>'1',
   'col'=>'20',
                             ); ?>
    <?php echo form_textarea($atts); ?>
 </td>
    </tr>
<tr>
    <td><label>Hydrolic Oil</label>
  </td>
    <td>
 <?php $atts = array( 'name'  => 'Hydrolic_Oil_mileage',
                            'style' => 'width:50px',
                             ); ?>
    <?php echo form_input($atts); ?>
   
    </td>
    <td>
    <?php 
 $dte = date('d-m-Y');
 $atts = array( 'name'  => 'Hydrolic_Oil_serviceDate',
                         'style' => 'width:100px',
       'id' => 'Hydrolic_Oil_serviceDate',
       'value' => $dte,
                             ); ?>
    <?php echo form_input($atts); ?>
    </td>
    
    <td>
    <?php $atts = array('name'  => 'Hydrolic_Oil_cost',
                        'style' => 'width:100px',
   'id'=>'Hydrolic_Oil_cost',
                        ); ?>
    <?php echo form_input($atts); ?>
    </td>
    <td>
    <?php $atts = array('name'  => 'Hydrolic_Oil_invoice',
                        'style' => 'width:100px',
                             ); ?>
    <?php echo form_input($atts); ?>
    </td>
  <td>
  <?php $atts = array('name'  => 'Hydrolic_oil_notes',
                        
   'rows'=>'1',
   'col'=>'20',
                             ); ?>
    <?php echo form_textarea($atts); ?>
 </td>
    </tr>
<tr>
    <td><label>Steering Oil</label>
  </td>
    <td>
 <?php $atts = array( 'name'  => 'Steering_Oil_mileage',
                            'style' => 'width:50px',
                             ); ?>
    <?php echo form_input($atts); ?>
   
    </td>
    <td>
    <?php 
 $dte = date('d-m-Y');
 $atts = array( 'name'  => 'Steering_Oil_serviceDate',
                         'style' => 'width:100px',
       'id' => 'Steering_Oil_serviceDate',
       'value' => $dte,
                             ); ?>
    <?php echo form_input($atts); ?>
    </td>
    
    <td>
    <?php $atts = array('name'  => 'Steering_Oil_cost',
                        'style' => 'width:100px',
   'id'=>'Steering_Oil_cost',
                        ); ?>
    <?php echo form_input($atts); ?>
    </td>
    <td>
    <?php $atts = array('name'  => 'Steering_Oil_invoice',
                        'style' => 'width:100px',
                             ); ?>
    <?php echo form_input($atts); ?>
    </td>
  <td>
  <?php $atts = array('name'  => 'Steering_oil_notes',
                        
   'rows'=>'1',
   'col'=>'20',
                             ); ?>
    <?php echo form_textarea($atts); ?>
 </td>
    </tr>
<tr>
    <td><label>Breaks Oil</label>
  </td>
    <td>
 <?php $atts = array( 'name'  => 'Breaks_Oil_mileage',
                            'style' => 'width:50px',
                             ); ?>
    <?php echo form_input($atts); ?>
   
    </td>
    <td>
    <?php 
 $dte = date('d-m-Y');
 $atts = array( 'name'  => 'Breaks_Oil_serviceDate',
                         'style' => 'width:100px',
       'id' => 'Breaks_Oil_serviceDate',
       'value' => $dte,
                             ); ?>
    <?php echo form_input($atts); ?>
    </td>
    
    <td>
    <?php $atts = array('name'  => 'Breaks_Oil_cost',
                        'style' => 'width:100px',
   'id'=>'Breaks_Oil_cost',
                        ); ?>
    <?php echo form_input($atts); ?>
    </td>
    <td>
    <?php $atts = array('name'  => 'Breaks_Oil_invoice',
                        'style' => 'width:100px',
                             ); ?>
    <?php echo form_input($atts); ?>
    </td>
   <td>
  <?php $atts = array('name'  => 'Breaks_oil_notes',
   'rows'=>'1',
   'col'=>'20',
                             ); ?>
    <?php echo form_textarea($atts); ?>
 </td>
    </tr>
<tr>
<td><label>Total</label><td></td><td></td>
<td> <?php $atts = array('name'  => 'total_sum',
                        'style' => 'width:100px;border:none',
    'id'=>'total_sum',
   'readonly'=>'readonly',
   
                             ); ?>
    <?php echo form_input($atts); ?></td>
</td>
</tr>
    </TABLE></p>
      </div>
      <div class="tabpage" id="tabpage_2">
        <h2>Captive Maintainance</h2>
        <p><table width="635" cellspacing="10" cellpadding="5" style="text-align:center; margin: 8px 0px 12px;">
   <tr>
    <th width="141">Service</th>
    <th width="44">Mileage</th>
    <th width="70">Service Date</th>
    <th width="70">Cost</th>
    <th width="75">Invoice #</th>
    <th width="75">Notes</th>
    </tr>
 
   <tr>
    <td><label>Wheel_Basing</label>
    </td>
    <td>
 <?php $atts = array( 'name'  => 'Wheel_Basing_mileage',
                            'style' => 'width:50px',
                             ); ?>
    <?php echo form_input($atts); ?>
   
    </td>
    <td>
    <?php 
 $dte = date('d-m-Y');
 $atts = array( 'name'  => 'Wheel_Basing_serviceDate',
                         'style' => 'width:100px',
       'id' => 'Wheel_Basing_serviceDate',
       'value' => $dte,
                             ); ?>
    <?php echo form_input($atts); ?>
    </td>
    
    <td>
    <?php $atts = array('name'  => 'Wheel_Basing_cost',
                        'style' => 'width:100px',
  			 'id'=>'Wheel_Basing_cost',
                        ); ?>
    <?php echo form_input($atts); ?>
    </td>
    <td>
    <?php $atts = array('name'  => 'Wheel_Basing_invoice',
                        'style' => 'width:100px',
                             ); ?>
    <?php echo form_input($atts); ?>
    </td>
  <td>
  <?php $atts = array('name'  => 'Wheel_Basing_notes',

   'rows'=>'1',
   'col'=>'20',
                             ); ?>
    <?php echo form_textarea($atts); ?>
 </td>
   
    </tr>
<tr>
    <td><label>Break Liner</label>   </td>
    <td>
 <?php $atts = array( 'name'  => 'bl_mileage',
                            'style' => 'width:50px',
                             ); ?>
    <?php echo form_input($atts); ?>
   
    </td>
    <td>
    <?php 
 $dte = date('d-m-Y');
 $atts = array( 'name'  => 'bl_serviceDate',
                         'style' => 'width:100px',
       'id' => 'bl_serviceDate',
       'value' => $dte,
                             ); ?>
    <?php echo form_input($atts); ?>
    </td>
    
    <td>
    <?php $atts = array('name'  => 'bl_cost',
                        'style' => 'width:100px',
   'id'=>'bl_cost',
                        ); ?>
    <?php echo form_input($atts); ?>
    </td>
    <td>
    <?php $atts = array('name'  => 'bl_invoice',
                        'style' => 'width:100px',
                             ); ?>
    <?php echo form_input($atts); ?>
    </td>
  <td>
  <?php $atts = array('name'  => 'bl_notes',

   'rows'=>'1',
   'col'=>'20',
                             ); ?>
    <?php echo form_textarea($atts); ?>
 </td>
   
    </tr>
<tr>
    <td><label>Gear</label>
  
    </td>
    <td>
 <?php $atts = array( 'name'  => 'Gear_mileage',
                            'style' => 'width:50px',
                             ); ?>
    <?php echo form_input($atts); ?>
   
    </td>
    <td>
    <?php 
 $dte = date('d-m-Y');
 $atts = array( 'name'  => 'Gear_serviceDate',
                         'style' => 'width:100px',
       'id' => 'Gear_serviceDate',
       'value' => $dte,
                             ); ?>
    <?php echo form_input($atts); ?>
    </td>
    
    <td>
    <?php $atts = array('name'  => 'Gear_cost',
                        'style' => 'width:100px',
   'id'=>'Gear_cost',
                        ); ?>
    <?php echo form_input($atts); ?>
    </td>
    <td>
    <?php $atts = array('name'  => 'Gear_invoice',
                        'style' => 'width:100px',
                             ); ?>
    <?php echo form_input($atts); ?>
    </td>
  <td>
  <?php $atts = array('name'  => 'Gear_oil_notes',

   'rows'=>'1',
   'col'=>'20',
                             ); ?>
    <?php echo form_textarea($atts); ?>
 </td>
   
    </tr>
<tr>
<td><label>Bearing</label>
    </td>
    <td>
 <?php $atts = array( 'name'  => 'Bearing_mileage',
                            'style' => 'width:50px',
                             ); ?>
    <?php echo form_input($atts); ?>
   
    </td>
    <td>
    <?php 
 $dte = date('d-m-Y');
 $atts = array( 'name'  => 'Bearing_serviceDate',
                         'style' => 'width:100px',
       'id' => 'Bearing_serviceDate',
       'value' => $dte,
                             ); ?>
    <?php echo form_input($atts); ?>
    </td>
    
    <td>
    <?php $atts = array('name'  => 'Bearing_cost',
                        'style' => 'width:100px',
   'id'=>'Bearing_cost',
                        ); ?>
    <?php echo form_input($atts); ?>
    </td>
    <td>
    <?php $atts = array('name'  => 'Bearing_invoice',
                        'style' => 'width:100px',
                             ); ?>
    <?php echo form_input($atts); ?>
    </td>
  <td>
  <?php $atts = array('name'  => 'Bearing_notes',

   'rows'=>'1',
   'col'=>'20',
                             ); ?>
    <?php echo form_textarea($atts); ?>
 </td>
   
    </tr>
<tr>
    <td><label>Ring</label>
    </td>
    <td>
 <?php $atts = array( 'name'  => 'Ring_mileage',
                            'style' => 'width:50px',
                             ); ?>
    <?php echo form_input($atts); ?>
   
    </td>
    <td>
    <?php 
 $dte = date('d-m-Y');
 $atts = array( 'name'  => 'Ring_serviceDate',
                         'style' => 'width:100px',
       'id' => 'Ring_serviceDate',
       'value' => $dte,
                             ); ?>
    <?php echo form_input($atts); ?>
    </td>
    
    <td>
    <?php $atts = array('name'  => 'Ring_cost',
                        'style' => 'width:100px',
'id'=>'Ring_cost',
                        ); ?>
    <?php echo form_input($atts); ?>
    </td>
    <td>
    <?php $atts = array('name'  => 'Ring_invoice',
                        'style' => 'width:100px',
                             ); ?>
    <?php echo form_input($atts); ?>
    </td>
  <td>
  <?php $atts = array('name'  => 'Ring_notes',

   'rows'=>'1',
   'col'=>'20',
                             ); ?>
    <?php echo form_textarea($atts); ?>
 </td>
   
    </tr>
<tr>
    <td><label>Liner</label>
    </td>
    <td>
 <?php $atts = array( 'name'  => 'Liner_mileage',
                            'style' => 'width:50px',
                             ); ?>
    <?php echo form_input($atts); ?>
   
    </td>
    <td>
    <?php 
 $dte = date('d-m-Y');
 $atts = array( 'name'  => 'Liner_serviceDate',
                         'style' => 'width:100px',
       'id' => 'Liner_serviceDate',
       'value' => $dte,
                             ); ?>
    <?php echo form_input($atts); ?>
    </td>
    
    <td>
    <?php $atts = array('name'  => 'Liner_cost',
                        'style' => 'width:100px',
'id'=>'Liner_cost',
                        ); ?>
    <?php echo form_input($atts); ?>
    </td>
    <td>
    <?php $atts = array('name'  => 'Liner_invoice',
                        'style' => 'width:100px',
                             ); ?>
    <?php echo form_input($atts); ?>
    </td>
  <td>
  <?php $atts = array('name'  => 'Liner_notes',

   'rows'=>'1',
   'col'=>'20',
                             ); ?>
    <?php echo form_textarea($atts); ?>
 </td>
   
    </tr>
<tr>
    <td><label>Piston</label>
    </td>
    <td>
 <?php $atts = array( 'name'  => 'Piston_mileage',
                            'style' => 'width:50px',
                             ); ?>
    <?php echo form_input($atts); ?>
   
    </td>
    <td>
    <?php 
 $dte = date('d-m-Y');
 $atts = array( 'name'  => 'Piston_serviceDate',
                         'style' => 'width:100px',
       'id' => 'Piston_serviceDate',
       'value' => $dte,
                             ); ?>
    <?php echo form_input($atts); ?>
    </td>
    
    <td>
    <?php $atts = array('name'  => 'Piston_cost',
'id'=>'Piston_cost',
                        'style' => 'width:100px',
                        ); ?>
    <?php echo form_input($atts); ?>
    </td>
    <td>
    <?php $atts = array('name'  => 'Piston_invoice',
                        'style' => 'width:100px',
                             ); ?>
    <?php echo form_input($atts); ?>
    </td>
  <td>
  <?php $atts = array('name'  => 'Piston_notes',

   'rows'=>'1',
   'col'=>'20',
                             ); ?>
    <?php echo form_textarea($atts); ?>
 </td>
   
    </tr>
<tr>
    <td><label>Wiring</label>
    </td>
    <td>
 <?php $atts = array( 'name'  => 'wiring_mileage',
                            'style' => 'width:50px',
                             ); ?>
    <?php echo form_input($atts); ?>
   
    </td>
    <td>
    <?php 
 $dte = date('d-m-Y');
 $atts = array( 'name'  => 'wiring_serviceDate',
                         'style' => 'width:100px',
       'id' => 'wiring_serviceDate',
       'value' => $dte,
                             ); ?>
    <?php echo form_input($atts); ?>
    </td>
    
    <td>
    <?php $atts = array('name'  => 'wiring_cost',
'id'=>'wiring_cost',
                        'style' => 'width:100px',
                        ); ?>
    <?php echo form_input($atts); ?>
    </td>
    <td>
    <?php $atts = array('name'  => 'wiring_invoice',
                        'style' => 'width:100px',
                             ); ?>
    <?php echo form_input($atts); ?>
    </td>
  <td>
  <?php $atts = array('name'  => 'wiring_notes',
   'rows'=>'1',
   'col'=>'20',
               ); ?>
    <?php echo form_textarea($atts); ?>
 </td>
   
    </tr>
<tr>
<td><label>Total</label><td></td><td></td>
<td> <?php $atts = array('name'  => 'total_sum1',
   'style' => 'width:100px;border:none',
    'id'=>'total_sum1',
   'readonly'=>'readonly',

                             ); ?>
    <?php echo form_input($atts); ?></td>
</td>
</tr>
    </TABLE>

</p>
</div>
  </div>
  </div>
  </div>
  <INPUT type="submit" class="btn btn-inverse" name="submit" value="submit"/>
</div>
  </div>
  </div>
		<?php include("includes/sidebar.php"); ?>	
