<?php	
$htmlcontent = '<table width="100%" border="1" style="text-align:center">
  <tr>
    <th scope="col">S.No</th>
    <th scope="col">Vehicle NO</th>
    <th scope="col">Insurance Expiry</th>
    <th scope="col">Permit Expiry</th>
    <th scope="col">Fitness Expiry</th>
    <th scope="col">Roadtax Expiry</th>
    <th scope="col">PUC Expiry</th> 
  </tr>';
$i=1;
foreach($records as $value){
	$htmlcontent .= '<tr>';
	$htmlcontent .= '<td>'.$i.'</td>';
	$htmlcontent .= '<td>'.$value['vehicle_no'].'</td>';
$date1 = strtotime($value['Insurance_expiry_date']);
$date1 = date('d-m-Y',$date1);

	$htmlcontent .= '<td>'.$date1.'</td>';
$date2 = strtotime($value['permit_expiry_date']);
$date2 = date('d-m-Y',$date2);
	$htmlcontent .= '<td>'.$date2.'</td>';
$date3 = strtotime($value['fitness_expiry_date']);
$date3 = date('d-m-Y',$date3);
	$htmlcontent .= '<td>'.$date3.'</td>';
$date4 = strtotime($value['roadtax_expiry_date']);
$date4 = date('d-m-Y',$date4);
	$htmlcontent .= '<td>'.$date4.'</td>';
$date5 = strtotime($value['puc_expiry_date']);
$date5 = date('d-m-Y',$date5);
	$htmlcontent .= '<td>'.$date5.'</td>';
	$htmlcontent .= '</tr>';
$i++;
}
$htmlcontent .= '</table>';
tcpdf();
    $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    $obj_pdf->SetCreator(PDF_CREATOR);
    $title = "VEHICLE INSURANCE PDF Report";
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
