<?php
	
	
$htmlcontent = '<table width="100%" border="1" style="text-align:center">
  <tr>
    <th scope="col">S.No</th>
    <th scope="col">Vehicle No</th>
    <th scope="col">Vehicle Type</th>
    <th scope="col">Opening KM</th>
    <th scope="col">Closing KM</th>
    <th scope="col">Start Reading</th>
    <th scope="col">Close Reading</th>
	<th scope="col">Quantity</th>
    <th scope="col">Date</th>
    
  </tr>';
$a=count($records);
if($a>0){
$i=1;
foreach($records as $value)
{


	$htmlcontent .= '<tr>';
	$htmlcontent .= '<td>'.$i.'</td>';
	$htmlcontent .= '<td>'.$value['vehicle_no'].'</td>';
	$htmlcontent .= '<td>'.$value['vehicle_type'].'</td>';
	$htmlcontent .= '<td>'.$value['opening_km'].'</td>';
	$htmlcontent .= '<td>'.$value['closing_km'].'</td>';
	$htmlcontent .= '<td>'.$value['start_reading'].'</td>';
	$htmlcontent .= '<td>'.$value['close_reading'].'</td>';
	$htmlcontent .= '<td>'.$value['quantity'].'</td>';
$date1 = strtotime($value['create_date']);
$date1 = date('d-m-Y',$date1);
	$htmlcontent .= '<td>'.$date1.'</td>';
	$htmlcontent .= '</tr>';
 $i++;
} 
}
$htmlcontent .= '</table>';
tcpdf();
    $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    $obj_pdf->SetCreator(PDF_CREATOR);
    $title = "PDF Report";
    $obj_pdf->SetTitle($title);
    $obj_pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, $title, PDF_HEADER_STRING);
    $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
    $obj_pdf->SetDefaultMonospacedFont('helvetica');
    $obj_pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
    $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
    $obj_pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
    $obj_pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
    $obj_pdf->SetFont('helvetica', '', 9);
    $obj_pdf->setFontSubsetting(false);
    $obj_pdf->AddPage();
	ob_start();
        // we can have any view part here like HTML, PHP etc
    $content = $htmlcontent;
	/*foreach($rep as $value){
		echo $value;
	}*/
    ob_end_clean();
    $obj_pdf->writeHTML($content, true, false, true, false, '');
    $obj_pdf->Output('output.pdf', 'I');

?>
