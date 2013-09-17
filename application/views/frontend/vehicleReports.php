<?php include("includes/header.php"); ?>
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
  			             <a href="#">Vehicle Master</a>
				        </li>
 				      </ul>
				     </div>
                    </nav>
<table width="100%" class="table">
  <tr>
    <th scope="col">S.No</th>
    <th scope="col">Vehicle No</th>
    <th scope="col">Vehicle Type</th>
    <th scope="col">Ownership</th>
    <th scope="col">Make</th>
    <th scope="col">Model</th>
    <th scope="col">Chasis #</th>
    <th scope="col">Engine #</th>
  </tr>
  <?php 
 $sno = 1;
 if(count($records) > 0){
 foreach($records as $value) { ?>
  <tr>
 	<td><?php echo $sno; ?></td>
    <td><?php echo $value['vehicle_no']; ?></td>
    <td><?php echo $value['vehicle_type']; ?></td>
    <td><?php echo $value['vehicle_ownership']; ?></td>
    <td><?php echo $value['make']; ?></td>
    <td><?php echo $value['model_no']; ?></td>
    <td><?php echo $value['chasis_no']; ?></td>
    <td><?php echo $value['engine_no']; ?></td>
  </tr>
<?php $sno++ ; } ?>  
</table>
<p><?php echo $links; ?></p>
<a href="<?php echo base_url(); ?>/vehicle/vehiclePDFReports" class="btn btn-inverse">Export to PDF</a>
<?php } ?> 
</div>
</div>
<?php include("includes/sidebar.php"); ?>
