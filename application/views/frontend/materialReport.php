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
                                    <a href="#">Stock Report</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
<table width="100%" class="table">
  <tr>
    <th scope="col">S.No</th>
    <th scope="col">Material</th>
    <th scope="col">Material Type</th>
    <th scope="col">Quantity</th>
    <th scope="col">Cost</th>
  </tr>
 <?php 
 $sno = 1;
 foreach($records as $value) { ?>
  <tr>
 	<td><?php echo $sno; ?></td>
    <td><?php echo $value['materialName']; ?></td>
    <td><?php echo $value['materialType']; ?></td>
    <td><?php echo $value['quantity']; ?></td>
    <td><?php echo $value['cost']; ?></td>
    
  </tr>
<?php $sno++ ; } ?>  
 
</table>
 <p><?php echo $links; ?></p>
<a href="<?php echo base_url(); ?>/materialmaster/materialPDFReports" class="btn btn-inverse">Export to PDF</a>
</div>
</div>
<?php include("includes/sidebar.php"); ?>