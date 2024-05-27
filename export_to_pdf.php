<?php
require_once('library/tcpdf.php');
include "config.php";


$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);

$pdf->SetCreator(PDF_CREATOR);
$pdf->SetTitle('Database Records');
$pdf->SetHeaderData('', 0, 'Database Records', '');

$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

$pdf->AddPage();

$query = "SELECT id, fullname, phoneno, emailadd ,imagedata ,messagearea , hobbies , gender ,content , country FROM formvalidation";
$result = mysqli_query($conn, $query);

$html = '<table border="1">
            <tr>
                <th>Id</th>
                <th>FullName</th>
                <th>Emailadd</th>
                <th>Phoneno</th>
                <th>Images</th>
                <th>Messagearea</th>
                <th>Hobbies</th>
                <th>Gender</th>
                <th>Content</th>
                <th>Country</th>
            </tr>';

while($row = mysqli_fetch_assoc($result)) {
    $html .= '<tr>';
    $html .= '<td>'.$row['id'].'</td>';
    $html .= '<td>'.$row['fullname'].'</td>';
    $html .= '<td>'.$row['emailadd'].'</td>';
    $html .= '<td>'.$row['phoneno'].'</td>';
    $html .= '<td><img src="'.$row['imagedata'].'" style="width: 70px; height: 60px;" /></td>';
    $html .= '<td>'.$row['messagearea'].'</td>';
    $html .= '<td>'.$row['hobbies'].'</td>';
    $html .= '<td>'.$row['gender'].'</td>';
    $html .= '<td>'.$row['content'].'</td>';
    $html .= '<td>'.$row['country'].'</td>';
    $html .= '</tr>';
}

$html .= '</table>';

$pdf->writeHTML($html, true, false, true, false, '');

mysqli_close($conn);

$pdf->Output('form_data.pdf', 'D');
?>