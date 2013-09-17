<?php include("includes/header.php"); ?>

<script>
 $(document).ready(function(){
                $('#date').Zebra_DatePicker();
		$('#edate').Zebra_DatePicker();
});
</script>
<script>
function open_pdf()
{
	window.open("<?php echo base_url(); ?>vehicleInsurance/insurancePDFReport");
}
document.getElementById('vehicle_id').value = "<?php echo $_GET['vehicle_id'];?>";
</script>

<div id="contentwrapper">
<!-- main content -->

  <div class="main_content">
<nav>
	<div id="jCrumbs" class="breadCrumb module">
                            <ul>
                                <li>
                                    <a href="#"><i class="icon-home"></i></a>
                                </li>
                                <li>
                                    <h3 style="color:#39c">Vehicle Insurance Expenses Report</h3>
                                </li>
                             </ul>
                        </div>
                    </nav>
<form method="post" action="<?php echo base_url(); ?>vehicleInsurance/searchVehicleEx">
<table><tr><th style="text-align:left">Select Vehicle No</th><th style="text-align:left">Select Vehicle Type</th><th style="text-align:left">Start date</th><th style="text-align:left">End date</th></tr>
<tr><td>
<select name="vehicle_id" id="vehicle_id">
<option>ALL</option>
	<?php

	$a=count($vehicleno);
	if($a>0)
	{
		foreach($vehicleno as $val)
		{ $a=$val['vehicle_no'];
		?>
		<option value="<?php echo $val['id']; ?>"> <?php echo $val['vehicle_no']; ?></option>
	<?php 
		}
	} 
	?>
</select></td>
<td>
<select name="vehicle_type" id="vehicle_type">
<option>ALL</option>
	<?php

	$a=count($vehicleno);
	if($a>0)
	{
		foreach($vehicleno as $val)
		{ $a=$val['vehicle_no'];
		?>
		<option value="<?php echo $val['vehicle_type']; ?>"> <?php echo $val['vehicle_type']; ?></option>
	<?php 
		}
	} 
	?>
</select></td>
<td><?php $atts=array(
			'id' => 'date',
			'name' => 'date',
			'size' => 35
); 

 echo  form_input($atts); ?></td>
<td><?php $atts=array(
			'id' => 'edate',
			'name' => 'edate',
			'size' => 35
); 

 echo  form_input($atts); ?></td>
</tr>
<tr><td><input class="btn btn-inverse" type="submit" name="search" value="search"/></td></tr>
</table>
 
<table width="100%" class="table" style="margin-top:25px">
  <tr>
    <th scope="col">S.No</th>
    <th scope="col">Vehicle NO</th>
    <th scope="col">Vehicle Type</th>
    <th scope="col">Insurance Cost</th>
    <th scope="col">Permit Cost</th>
    <th scope="col">Fitness Cost</th>
    <th scope="col">Roadtax Cost</th>
    <th scope="col">PUC Cost</th>
  </tr>
<?php
$dt = date('Y-m-d');
			$tm = strtotime($dt);
			$d=date('Y', $tm);
			$t=date('m', $tm);	

$i=1;
$a=count($records);
if($a>0){
foreach($records as $value)
{
?>
  <tr>
    <td><?php echo $i; ?></td>
    <td><?php echo $value['vehicle_no']; ?></td>
<td><?php echo $value['vehicle_type']; ?></td>
 <td><?php echo $value['Insurance_cost']; ?></td>
<td><?php echo $value['permit_cost']; ?></td>
<td><?php echo $value['fitness_cost']; ?></td>
<td><?php echo $value['roadtax_cost']; ?></td>
<td><?php echo $value['puc_cost']; ?></td>

  </tr>
<?php
$i++;
}
}
?>
</table>
<table style="margin-top:15px"><tr><td><input class="btn btn-inverse" type="submit" name="export" value="Export To PDF"/></td></tr></table>
<!--<input class="btn btn-inverse" type="submit" name="export" value="Export to PDF" onclick="open_pdf()"/>-->
                </div>
 </form>           </div>
<?php include("includes/sidebar.php"); ?>	

