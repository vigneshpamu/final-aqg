<?php
//require_once '../includes/dbconnect.php';
require_once ("/includes/db.php");
spl_autoload_register('DOMPDF_autoload');
 
   
 
$fullnames= "kay";
$username= "kay";
$email= "email";
$mobile_no= "124";
$usertype= "admin";
 
?>
<?php
$paper= "letter";
$orientation= "portrait";
$html= '<!doctype html>
<html>
<body>
<center><u>Registered Users List</u></center>
<ul data-role="listview">
<li>Fullnames: <b>'.$fullnames.'</b></li>
<li>Username: <b>'.$username.'</b></li>
<li>Email: <b>'.$email.'</b></li>
<li>Mobile No: <b>'.$mobile_no.'</b></li>
<li>Usertype: <b>'.$usertype.'</b></li>
<hr>
</ul>
</body></html>';

?>   
<?php    
 
ob_start();
$dompdf = new DOMPDF();
$dompdf->set_paper($paper, $orientation);
$dompdf->load_html($html);
$dompdf->render();
$dompdf->stream("my_pdf.pdf", array("Attachment" => 0));
//$pdf = $dompdf->output();
//file_put_contents("saved_pdf.pdf", $pdf);
ob_end_flush();
exit(0);
//mysqli_close($link);
?>