<?php
require '../vendor/autoload.php';
include "../config/connect.php";
include "./users.php";

$data = data();


use Dompdf\Dompdf;
// use Dompdf\Options;


if (isset($data)) {
   
    
    $html = '
        <h1 align="center">Liste Of Customers</h1>
        <table style="width:100%; border-collapse:collapse;">
            <tr>
                <th>ID</th>
                <th>F_NAME</th>
                <th>L_NAME</th>
                <th>JOB</th>
            </tr>
    ';

   

        foreach ($data as $d) {
            $html .= "
                <tr>
                    <td style='border:1px solid #ddd; padding:8px; text-align:center;'>{$d->idp}</td>
                    <td style='border:1px solid #ddd; padding:8px; text-align:center;'>{$d->nom}</td>
                    <td style='border:1px solid #ddd; padding:8px; text-align:center;'>{$d->prenom}</td>
                    <td style='border:1px solid #ddd; padding:8px; text-align:center;'>{$d->about}</td>
                </tr>
            ";
        }
    

    $html .= '</table>';

    $dompdf = new Dompdf();
    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'portrait');
    $dompdf->render();
    $dompdf->stream("costomers.pdf");
    header('Location: ../index.php');
}
?>