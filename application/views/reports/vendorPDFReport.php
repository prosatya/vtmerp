<?php
	
$htmlcontent = '<table width="100%" border="1" style="text-align:center">
  <tr>
	<th scope="col">S.No</th>
	<th scope="col">Vendor Name</th>
	<th scope="col">Material Supply</th>
	<th scope="col">Address</th>
	<th scope="col">City</th>
	<th scope="col">State</th>
	<th scope="col">Pincode</th>
	<th scope="col">Mobile</th>
  </tr>';
$i=1;
foreach($records as $value)
{


	$htmlcontent .= '<tr>';
	$htmlcontent .= '<td>'.$i.'</td>';
	$htmlcontent .= '<td>'.$value['vendor_name'].'</td>';
	$htmlcontent .= '<td>'.$value['material_supply'].'</td>';
	$htmlcontent .= '<td>'.$value['address1'].'</td>';
	$htmlcontent .= '<td>'.$value['city'].'</td>';
	$htmlcontent .= '<td>'.$value['state'].'</td>';
	$htmlcontent .= '<td>'.$value['pincode'].'</td>';
	$htmlcontent .= '<td>'.$value['mobile'].'</td>';
	$htmlcontent .= '</tr>';
 $i++;
} 
$htmlcontent .= '</table>';
tcpdf();
    $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    $obj_pdf->SetCreator(PDF_CREATOR);
    $title = "Vendor Report";
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
