<?php include("includes/header.php"); ?>
<script>
 $(document).ready(function(){

                 $('#from_date').Zebra_DatePicker();
                 $('#to_date').Zebra_DatePicker();
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
                                    <h4 style="color:#39c">Fuel Report</h4>
                                </li>
                               
                            </ul>
                        </div>
                    </nav>
<?php   	
		$attributes = array('name' => 'vehicleFuel', 'id' => 'vehicleFuel');	   
 		echo form_open('vehicleFuel/searchFuel',$attributes);
?>
   
<table><tr>
<td><div class="row-fluid"><label>Vehicle No</label>
<select name="vehicle_id"id="vehicle_id" value="">
<option value="0">Select Vehicle</option>
<?php
		$a=count($vehicleno);
		if($a>0){
		foreach($vehicleno as $row){
?>
<option value="<?php echo $row->id; ?>"><?php echo $row->vehicle_no; ?></option>
<?php
}
}
 ?>
</select>
 </div></td>
<td><div class="row-fluid"><label>From Date</label>
<?php 
$atts=array(
'name'=>'from_date',
'id'=>'from_date',
);
echo form_input($atts);
?>
</div></td>
<td><div class="row-fluid"><label>To Date</label>
<?php 
$atts=array(
'name'=>'to_date',
'id'=>'to_date',

);
echo form_input($atts);
?>
</div></td>
<td><div class="row-fluid"><label></label>
<?php  
			 $atts = array('name' => 'Search',
				       'value'   => 'Search',
				       'class' => "btn btn-inverse",
				   );
				  echo form_submit($atts);
										  ?>
                                       
</div></td>
<td><div class="row-fluid"><label></label>
<div></td>
</tr></table>
   
<table  width="100%" class="table">
  <tr>
    <th scope="col"><center>S.No</th>
    <th scope="col"><center>Vehicle No</center></th>
    <th scope="col"><center>Vehicle Type</center></th>
    <th scope="col"><center>Opening KM</center></th>
    <th scope="col"><center>Closing KM</center></th>
    <th scope="col"><center>Start Reading</center></th>
    <th scope="col"><center>Start Reading</center></th>
		<th scope="col"><center>Quantity</center></th>
<th scope="col"><center>Date</center></th>
    
  </tr>
<?php
$s=count($records);
if($s>0){
$i=1;
foreach($records as $a)
{


?>
  <tr>
	    <td><center><?php echo $i ?></td>
	    <td><center><?php echo $a['vehicle_no'] ; ?></center></td>
		<td><center><?php echo $a['vehicle_type'] ; ?></center></td>
	    <td><center><?php echo $a['opening_km'] ; ?></center></td>
	    <td><center><?php echo $a['closing_km']; ?></center></td>
	    <td><center><?php echo $a['start_reading'] ;?></center></td>
	    <td><center><?php echo $a['close_reading']; ?></center></td>
		<td><center><?php echo $a['quantity']; ?></center></td>
<?php $time = strtotime($a['create_date']);

$newformat = date('d-m-Y',$time);
?>
	    <td><center><?php echo $newformat; ?></center></td> 
  </tr>

<?php $i = $i + 1;}
} ?>
</table>
			<p><p><?php echo $links; ?></p></p>
 <?php  
				 $atts = array('name' => 'export',
					       'value'   => 'Export',
					       'class' => "btn btn-inverse",
					   );
										  echo form_submit($atts);
										  ?>


                        
                </div>
                
            </div>
            
		<?php include("includes/sidebar.php"); ?>	

