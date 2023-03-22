<?php
require_once('tcpdf/tcpdf.php');

// create new PDF document
$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);

// set document information
$pdf->SetCreator('Gym Admin Panel');
$pdf->SetAuthor('Your Name');
$pdf->SetTitle('Exercise List');

// add a page
$pdf->AddPage();

// set font
$pdf->SetFont('helvetica', '', 12);

// get data from database
$conn = new mysqli('localhost:3307', 'root', '', 'gymshala');
$query = "SELECT * FROM exercises";
$result = $conn->query($query);

// create table
$html = '<table border="1">';
$html .= '<tr><th>ID</th><th>Exercise Name</th><th>Sets</th><th>Reps</th></tr>';
while($row = $result->fetch_assoc()) {
    $html .= '<tr><td>'.$row['exercise_id'].'</td><td>'.$row['exercise_name'].'</td><td>'.$row['sets'].'</td><td>'.$row['reps'].'</td></tr>';
}
$html .= '</table>';

// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');

// output the PDF document to the browser
$pdf->Output('exercise_list.pdf', 'D');
?>
