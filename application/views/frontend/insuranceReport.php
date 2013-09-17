<?php include("includes/header.php"); ?>


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
                                    <h3 style="color:#39c">Vehicle Insurance Report</h3>
                                </li>
                             </ul>
                        </div>
                    </nav>
<form method="post" action="<?php echo base_url(); ?>vehicleInsurance/searchVehicle">
<table><tr><th style="text-align:left">Select Vehicle No</th></tr>
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
<td><input class="btn btn-inverse" type="submit" name="search" value="search"/></td></tr>
</table>
 
<table width="100%" class="table" style="margin-top:25px">
  <tr>
    <th scope="col">S.No</th>
    <th scope="col">Vehicle NO</th>
    <th scope="col">Insurance Expiry</th>
    <th scope="col">Permit Expiry</th>
    <th scope="col">Fitness Expiry</th>
    <th scope="col">Roadtax Expiry</th>
    <th scope="col">PUC Expiry</th>
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
<?php $date1 = strtotime($value['Insurance_expiry_date']);
$d1=date('Y',$date1);
$m1=date('m',$date1);
$date1 = date('d-m-Y',$date1);?>
<?php if($d1 == $d && $t == $m1){?>
<td style="background-color:red"><?php echo $date1; ?></td><?php }else{ ?>
    <td><?php echo $date1; ?></td>
<?php } ?>
<?php $date5 = strtotime($value['permit_expiry_date']);
$d5=date('Y',$date5);
$m5=date('m',$date5);
$date5 = date('d-m-Y',$date5);?>
<?php if($d5 == $d && $t == $m5){?>
    <td style="background-color:red"><?php echo $date5; ?></td><?php }else { ?>
<td><?php echo $date5; ?></td>
<?php } ?>
<?php $date2 = strtotime($value['fitness_expiry_date']);
$d2=date('Y',$date2);
$m2=date('m',$date2);

$date2 = date('d-m-Y',$date2);?>
  <?php if($d2 == $d && $t == $m2){?> 
 <td style="background-color:red"><?php echo $date2; ?></td><?php }else { ?>
	<td><?php echo $date2; ?></td>
<?php } ?>
<?php $date3 = strtotime($value['roadtax_expiry_date']);
$d3=date('Y',$date3);
$m3=date('m',$date3);

$date3 = date('d-m-Y',$date3);?>
<?php if($d3 == $d && $t == $m3){?> 
    <td style="background-color:red"><?php echo $date3; ?></td><?php }else { ?>
	
		<td><?php echo $date3; ?></td>
<?php } ?>
<?php $date4 = strtotime($value['puc_expiry_date']);
$d4=date('Y',$date4);
$m4=date('m',$date4);
$date4 = date('d-m-Y',$date4);?>
<?php if($d4 == $d && $t == $m4){?>
    <td style="background-color:red"><?php echo $date4; ?></td><?php }else { ?>
	<td><?php echo $date4; ?></td>
<?php } ?>
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

