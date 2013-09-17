<?php include("includes/header.php"); ?>
<script>
function open_pdf()
{
	window.open("<?php echo base_url(); ?>tendor/tendorPDFReport");
}
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
                <a href="#">Tender Report</a>
            </li>
         </ul>
        </div>
    </nav>
<table width="100%" class="table">
  <tr>
    <th scope="col"><center>S.No</center></th>
    <th scope="col"><center>Tender for</center></th>
    <th scope="col"><center>Location for Tender submission</center></th>
    <th scope="col"><center>Name of Work</center></th>
    <th scope="col"><center>Last Date Tender Purchase</center></th>
    <th scope="col"><center>Last Date Tender submission</center></th>
    <th scope="col"><center>Open Date Technical Tender</center></th>
    <th scope="col"><center>Open Date Financial Tender</center></th>
  </tr>
<?php
$i=1;
if(count($records) > 0){
foreach($records as $value)
{

?>
  <tr>
    <td><center><?php echo $i; ?></center></td>
    <td><center><?php echo $value['tender_for']; ?></center></td>
    <td><center><?php echo $value['location_for_tender_submission']; ?></center></td>
    <td><center><?php echo $value['name_of_work']; ?></center></td>
<?php $date1 = strtotime($value['last_date_of_tender_purchase']);

$date1 = date('d-m-Y',$date1);
?>
    <td><center><?php echo $date1; ?></center></td>
<?php $date2 = strtotime($value['last_date_of_tender_submission']);

$date2 = date('d-m-Y',$date2);
?>
  
  <td><center><?php echo $date2; ?></center></td>
<?php $date3 = strtotime($value['open_date_technical_tender']);

$date3 = date('d-m-Y',$date3);
?>
  
  <td><center><?php echo $date3; ?></center></td>
<?php $date4 = strtotime($value['open_date_financial_tender']);

$date4 = date('d-m-Y',$date4);
?>
    <td><center><?php echo $date4; ?></center></td>
  </tr>
<?php $i++;} ?>
</table>
<p><?php echo $links; ?></p>
<a href="#" onclick="open_pdf()" class="btn btn-inverse">Export to PDF</a>
<?php } ?>                      
</div>
</div>
<?php include("includes/sidebar.php"); ?>	
