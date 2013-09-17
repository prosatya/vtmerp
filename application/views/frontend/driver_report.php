<?php include("includes/header.php"); ?>
<!-- main content -->
<script>
function open_pdf()
{
	window.open("<?php echo base_url(); ?>driver/driverPdfReports");
}
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
  	 <h3 style="color: #3399CC;">Driver Report</h3>
				        </li>
 				      </ul>
				     </div>
                    </nav>
<table width="100%" class="table">
  <tr>
    <th scope="col">S.No</th>
<th scope="col">Image</th>
    <th scope="col">Name</th>
    <th scope="col">Address</th>
    <th scope="col">Blood Group</th>
    <th scope="col">Joining Date</th>
    <th scope="col">License No</th>
    <th scope="col">Mobile No</th>
    <th scope="col">Driver Type</th>
  </tr>
  <?php 
 $sno = 1;
 if(count($records) > 0){
 foreach($records as $value) { ?>
  <tr>
 	<td><?php echo $sno; ?></td>
 	<td><img src="<?php if($value['driverImage'] == NULL ) {  echo base_url(); ?>images/profile_default_male.png<?php  } else {     echo $value['driverImage'];   } ?>" style="height:50px; width:60px;"/></td>
    <td><?php echo $value['first_name'].' '.$value['last_name']; ?></td>
    <td><?php echo $value['address1'].",".$value['city'].",".$value['state'].",".$value['pincode']; ?></td>
    <td><?php echo $value['bloodgroup']; ?></td>
    <td><?php echo $value['joining_date']; ?></td>
    <td><?php echo $value['license_no']; ?></td>
    <td><?php echo $value['mobile']; ?></td>
    <td><?php echo $value['driver_type']; ?></td>
  </tr>
<?php $sno++ ; } ?>  
</table>
<p><?php echo $links; ?></p>
<a href="" class="btn btn-inverse" onclick=open_pdf()>Export to PDF</a>
<?php } ?> 
</div>
</div>
<?php include("includes/sidebar.php"); ?>
