<?php


require_once __DIR__ . '/vendor/autoload.php';



//Grab Variables
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$number = $_POST['number'];
$message = $_POST['message'];



//Create new PDF instance
//$mpdf = new mPDF();
$mpdf = new mPDF('c', 'A5-L');

//Create PDF

$data = '';

$data .= '<h1> BRGY. IBAYO HEALTH CENTER </h1>';

//Add data
$data .= '<strong> First Name </strong>' . $fname . '<br />';
$data .= '<strong> Last Name </strong>' . $lname . '<br />';
$data .= '<strong> Email </strong>' . $email . '<br />';
$data .= '<strong> Contact Number </strong>' . $number . '<br />';

if($message)
{
	$data .= '<br /> <strong> Message</strong><br />' . $message;
}

//Write PDf
$mpdf->WriteHTML($data);

//Download PDF
$mpdf->Output('Prescription.pdf', 'D');

