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
            <a href="#">Vendor Report</a>
        </li>
    </ul>
    </div>
   </nav>
<table width="100%" class="table">
  <tr>
    <th scope="col">S.No</th>
    <th scope="col">Vendor Name</th>
    <th scope="col">Material Supply</th>
    <th scope="col">Address</th>
    <th scope="col">City</th>
    <th scope="col">State</th>
    <th scope="col">Pincode</th>
    <th scope="col">Mobile</th>
  </tr>
 <?php 
 $sno = 1;
 foreach($records as $value) { ?>
  <tr>
 	<td><?php echo $sno; ?></td>
    <td><?php echo $value['vendor_name']; ?></td>
    <td><?php echo $value['material_supply']; ?></td>
    <td><?php echo $value['address1']; ?></td>
    <td><?php echo $value['city']; ?></td>
    <td><?php echo $value['state']; ?></td>
    <td><?php echo $value['pincode']; ?></td>
    <td><?php echo $value['mobile']; ?></td>
    
  </tr>
<?php $sno++ ; } ?>  
 
</table>
                         <p><?php echo $links; ?></p>
<a href="<?php echo base_url(); ?>/vendor/vendorPDFReports" class="btn btn-inverse">Export to PDF</a>
</div>
</div>
<?php include("includes/sidebar.php"); ?>
