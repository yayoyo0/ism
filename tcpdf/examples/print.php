<?php
session_start();
// Include the main TCPDF library (search for installation path).
require_once('tcpdf_include.php');
$graph 	= $_POST["img"];
$AC 	= $_SESSION["AC"];
$AT 	= $_SESSION["AT"];
$AA 	= $_SESSION["AA"];
$SAA 	= $_SESSION["SAA"];
$CM 	= $_SESSION["CM"];
$CP 	= $_SESSION["CP"];
$IA 	= $_SESSION["IA"];
$IR 	= $_SESSION["IR"];
$MA 	= $_SESSION["MA"];
$MP 	= $_SESSION["MP"];
$PEP 	= $_SESSION["PEP"];
$PL 	= $_SESSION["PL"];
$PS 	= $_SESSION["PS"];
$RA 	= $_SESSION["RA"];
$SSA 	= $_SESSION["SSA"];
$SCP 	= $_SESSION["SCP"];
$SII 	= $_SESSION["SII"];

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('LER');
$pdf->SetTitle('Evaluación NIST 800 - 53');
$pdf->SetSubject('NIST 800 - 53');
$pdf->SetKeywords('ISM, NIST');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
$pdf->setFooterData(array(0,64,0), array(0,64,128));

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/spa.php')) {
	require_once(dirname(__FILE__).'/lang/spa.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set default font subsetting mode
$pdf->setFontSubsetting(true);

// Set font
// dejavusans is a UTF-8 Unicode font, if you only need to
// print standard ASCII chars, you can use core fonts like
// helvetica or times to reduce file size.
$pdf->SetFont('dejavusans', '', 14, '', true);

// Add a page
// This method has several options, check the source code documentation for more information.
$pdf->AddPage();

// set text shadow effect
$pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));



// Set some content to print
$intro = <<<EOD
<h4>Evaluación NIST 800 - 53</h4>
<p>El propósito de esta publicación es proporcionar directrices para la selección y especificación de los controles de seguridad para las 
organizaciones y los sistemas de información de apoyo a las agencias ejecutivas del gobierno federal para cumplir con los requisitos de FIPS 
Publicación 200, Requisitos Mínimos de Seguridad de Información Federal y Sistemas de Información.
Las directrices se aplican a todos los componentes de un sistema de información que procesan, almacenan o transmiten información federal.
Las directrices se han desarrollado para lograr sistemas de información más seguras
y la gestión eficaz de los riesgos dentro del gobierno federal.</p>
<br>
<br>
<table cellspacing="0" cellpadding="1" border="1">
	<tr>
		<td width="70%"><b>Access Control: </b></td>
		<td width="30%" align="center">{$AC}</td>
	</tr>
	<tr>	
		<td><b>Awareness and Training: </b></td>
		<td align="center">{$AT}</td>
	</tr>
	<tr>	
		<td><b>Audit and Accountability: </b></td>
		<td align="center">{$AA}</td>
	</tr>
	<tr>	
		<td><b>Security Assessment and Authorization: </b></td>
		<td align="center">{$SAA}</td>
	</tr>
	<tr>	
		<td><b>Configuration Management: </b></td>
		<td align="center">{$CM}</td>
	</tr>
	<tr>	
		<td><b>Contingency Planning: </b></td>
		<td align="center">{$CP}</td>
	</tr>
	<tr>	
		<td><b>Identification and Authentication: </b></td>
		<td align="center">{$IA}</td>
	</tr>
	<tr>	
		<td><b>Incident Response: </b></td>
		<td align="center">{$IR}</td>
	</tr>
	<tr>	
		<td><b>Maintenance: </b></td>
		<td align="center">{$MA}</td>
	</tr>
	<tr>	
		<td><b>Media Protection: </b></td>
		<td align="center">{$MP}</td>
	</tr>
	<tr>	
		<td><b>Physical and Environmental Protection: </b></td>
		<td align="center">{$PEP}</td>
	</tr>
	<tr>	
		<td><b>Planning: </b></td>
		<td align="center">{$PL}</td>
	</tr>
	<tr>	
		<td><b>Personnel Security: </b></td>
		<td align="center">{$PS}</td>
	</tr>
	<tr>	
		<td><b>Risk Assessment: </b></td>
		<td align="center">{$RA}</td>
	</tr>
	<tr>	
		<td><b>System and Services Acquisition: </b></td>
		<td align="center">{$SSA}</td>
	</tr>
	<tr>	
		<td><b>System and Communications Protections: </b></td>
		<td align="center">{$SCP}</td>
	</tr>
	<tr>	
		<td><b>System and Information Integrity: </b></td>
		<td align="center">{$SII}</td>
	</tr>					
</table>
EOD;

// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 1, '', '', $intro, 0, 1, 0, true, '', true);

$pdf->AddPage("L");
//loads and print the graph to the PDF
$temp = base64_decode($graph);
$pdf->Image('@'.$temp);

$legend = <<<EOD
<ul style = "font-size: 9px;">
	<li>AC: Access Control</li>
	<li>AT: Awareness and Training</li>
	<li>AA: Audit and Accountability</li>
	<li>SAA: Security Assessment and Authorization</li>
	<li>CM: Configuration Management</li>
	<li>CP: Contingency Planning</li>
	<li>IA: Identification and Authentication</li>
	<li>IR: Incident Response</li>
	<li>MA: Maintenance</li>
	<li>MP: Media Protection</li>
	<li>PEP: Physical and Environmental Protection</li>
	<li>PL: Planning</li>
	<li>PS: Personnel Security</li>
	<li>RA: Risk Assessment</li>
	<li>SSA: System and Services Acquisition</li>
	<li>SCP: System and Communications Protections</li>
	<li>SII: System and Information Integrity</li>
</ul>
EOD;
$pdf->writeHTMLCell(90, '', 0, 30, $legend, false, true, false, false, 'J', false);
//$pdf->writeHTML($legend, true, false, true, false, '');
// ---------------------------------------------------------

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('evaluation.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
?>