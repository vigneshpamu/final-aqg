<?php
// require_once($_SERVER[' DOCUMENT_ROOT'].'/admin/header/admin_header.php');
/* include autoloader */
require_once 'dompdf/autoload.inc.php';


/* reference the Dompdf namespace */
use Dompdf\Dompdf;


/* instantiate and use the dompdf class */
$dompdf = new Dompdf();
 	
$dompdf->loadHtml("sajh");


/* Render the HTML as PDF */
$dompdf->render();


/* Output the generated PDF to Browser */
$dompdf->stream();
?>